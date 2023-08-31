<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class StaffList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /**
     * Declare a public property $searchByFirstName
     * @var string
     */
    public string $searchByFirstName;

    /**
     * Declare a public property $searchByLastName
     * @var string
     */
    public string $searchByLastName;

    /**
     * Declare a public property $searchByEmail
     * @var string
     */
    public string $searchByEmail;

    /**
     * Declare a public property $searchByRole
     * @var string
     */
    public string $searchByRole;

    /**
     * Declare a public property $searchByStatus
     * @var string
     */
    public string $searchByStatus;

    /**
     * Declare a public property $roles
     */
    public $roles;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchByFirstName = '';
        $this->searchByLastName = '';
        $this->searchByEmail = '';
        $this->searchByStatus = '';
        $this->roles = Role::whereNotIn('name', [RolesEnum::CUSTOMER->value])->get();
        $this->searchByRole = '';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereNotIn('name', [RolesEnum::CUSTOMER->value]);
        })
            ->when($this->searchByFirstName != '', function ($query) {
                $query->where('first_name', 'like', '%' . $this->searchByFirstName . '%');
            })
            ->when($this->searchByLastName != '', function ($query) {
                $query->where('last_name', 'like', '%' . $this->searchByLastName . '%');
            })
            ->when($this->searchByEmail != '', function ($query) {
                $query->where('email', 'like', '%' . $this->searchByEmail . '%');
            })
            ->when($this->searchByRole != '', function ($query) {
                $query->whereHas('roles', function ($roleQuery) {
                    $roleQuery->where('name', $this->searchByRole);
                });
            })
            ->when($this->searchByStatus != '', function ($query) {
                $query->whereHas('userProfile', function ($subQuery) {
                    $subQuery->where('status', $this->searchByStatus);
                });
            })

            ->paginate(10);

        return view('livewire.admin.staff.staff-list')->with('users', $users);
    }
}
