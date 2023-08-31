<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Enums\RolesEnum;
use App\Enums\SignUpTypesEnum;
use App\Enums\UserStatusEnum;
use App\Models\Community;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class CustomerList extends Component
{
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
     * Declare a public property $searchByStatus
     * @var string
     */
    public string $searchByStatus;

    /**
     * Declare a public property $searchBySignup
     * @var string
     */
    public string $searchBySignup;

    /**
     * Declare a public property $signupTypes
     */
    public $signupTypes;

    /**
     * Declare a public property $allStates
     */
    public $allStates;

    /**
     * Declare a public property $searchByList
     */
    public $searchByList;

    /**
     * Declare a public property $searchByState
     */
    public $searchByState;

    /**
     * Declare a public property $searchByVerification
     */
    public $searchByVerification;

    /**
     * Declare a public property $searchByCommunity
     */
    public $searchByCommunity;



    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchByFirstName = '';
        $this->searchByLastName = '';
        $this->searchByEmail = '';
        $this->searchBySignup = '';
        $this->searchByList = '';
        $this->searchByState = '';
        $this->searchByVerification = '';
        $this->searchByCommunity = '';
        $this->searchByStatus = '';
        $this->signupTypes = $this->signUpTypesWithCount();
        $this->allStates = Community::groupBy('state')->pluck('state')->toArray();
    }


    public function signUpTypesWithCount()
    {
        foreach (SignUpTypesEnum::toArray() as $signupType) {
            $types[] = [
                'type' => $signupType->value,
                'counts' => User::where('signup_type', $signupType->value)->count()
            ];
        }

        return $types;
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {

        $users = User::role(RolesEnum::CUSTOMER->value)->with(['userProfile', 'listings', 'userAddresses'])
            ->withCount(['listings', 'communities'])
            ->when($this->searchByStatus != '', function ($query) {
                $query->whereHas('userProfile', function ($subQuery) {
                    $subQuery->where('status', $this->searchByStatus);
                });
            })
            ->when($this->searchByState != '', function ($query) {
                $query->whereHas('userAddresses', function ($subQuery) {
                    $subQuery->where('state', $this->searchByState);
                });
            })
            ->when($this->searchByVerification != '', function ($query) {
                $query->whereHas('userProfile', function ($subQuery) {
                    $subQuery->where('is_verification_badge_allowed', $this->searchByVerification);
                });
            })
            ->when($this->searchBySignup != '', function ($query) {
                $query->where('signup_type', $this->searchBySignup);
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
            ->where(function ($query) {
                if (empty($this->searchStatus)) {
                    $query->whereHas('userProfile', function ($subQuery) {
                        $subQuery->whereIn('status', UserStatusEnum::toArray());
                    });
                } else {
                    $query->where('status', $this->searchByStatus);
                }
            })
            ->when($this->searchByList != '', function ($query) {
                if ($this->searchByList  === 'highest') {
                    $query->latest('listings_count');
                } elseif ($this->searchByList === 'lowest') {
                    $query->oldest('listings_count');
                }
            })
            ->when($this->searchByCommunity != '', function ($query) {
                list($minCount, $maxCount) = explode('-', $this->searchByCommunity);
                $query->whereHas('communities', function ($subQuery) use ($minCount, $maxCount) {
                    $subQuery->select('user_id')
                        ->groupBy('user_id')
                        ->havingRaw('COUNT(*) BETWEEN ? AND ?', [$minCount, $maxCount]);
                });
            })
            ->paginate(10);

        return view('livewire.admin.customers.customer-list')->with('users', $users);
    }
}
