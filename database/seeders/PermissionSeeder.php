<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = $this->categoriesSectionPermissions();
        $permissions = array_merge($this->usersSectionPermissions(), $permissions);
        $permissions = array_merge($this->communitiesSectionPermissions(), $permissions);
        $permissions = array_merge($this->supportSectionPermissions(), $permissions);
        $permissions = array_merge($this->knowledgeBaseSectionPermissions(), $permissions);
        Permission::upsert($permissions, ['name', 'guard_name', 'guard_name']);

        $superAdminRole = Role::whereName(RolesEnum::SUPERADMIN->name)->first();
        $superAdminRole->givePermissionTo(Permission::all());
    }

    private function categoriesSectionPermissions(): array
    {
        $groupName = 'Categories';
        return [
            [
                'name' => 'View Categories',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Create Category',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Edit Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Category Status',
                'group_name' => $groupName
            ],

        ];
    }

    private function usersSectionPermissions(): array
    {
        $groupName = 'Users';
        return [
            [
                'name' => 'View Customers List',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Create Customer',
                'group_name' => $groupName,
            ],
            [
                'name' => 'View Customer Details',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Customer',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Customer Status',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Profile',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Customer Profile',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Addresses',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Communities',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Listing',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Customer Listing',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Activity',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Product Viewed',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Verification',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer Update Password',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Customer Password',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Customer User Reported',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Staff List',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Create Staff',
                'group_name' => $groupName,
            ],
            [
                'name' => 'View Staff Detail',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Staff',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Staff Status',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Role',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Reported Users',
                'group_name' => $groupName
            ],

        ];
    }

    private function communitiesSectionPermissions(): array
    {
        $groupName = 'Community';
        return [
            [
                'name' => 'View Communities',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Edit Community',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Delete Community',
                'group_name' => $groupName
            ],
            [
                'name' => 'Leave Community',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Affiliated Users',
                'group_name' => $groupName
            ],

        ];
    }

    private function supportSectionPermissions(): array
    {
        $groupName = 'Support';
        return [
            [
                'name' => 'View Ticket Categories',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Create Ticket Category',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Edit Ticket Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Ticket Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'Update Ticket Category Status',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Tickets',
                'group_name' => $groupName,
            ],
            [
                'name' => 'View Ticket Detail',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Update Ticket Status',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Change Assignee',
                'group_name' => $groupName,
            ],

        ];
    }

    private function knowledgeBaseSectionPermissions(): array
    {
        $groupName = 'Knowledge Base';
        return [
            [
                'name' => 'View Article Categories',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Create Article Category',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Edit Article Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Article Category',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Articles',
                'group_name' => $groupName
            ],
            [
                'name' => 'Create Article',
                'group_name' => $groupName,
            ],
            [
                'name' => 'Edit Article',
                'group_name' => $groupName
            ],
            [
                'name' => 'Delete Article',
                'group_name' => $groupName
            ],
            [
                'name' => 'View Article Detail',
                'group_name' => $groupName
            ],
            [
                'name' => 'Change Article Status',
                'group_name' => $groupName
            ],

        ];
    }
}
