<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'List All Roles'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update Role',
                'description' => 'Update Role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'blog-create',
                'display_name' => 'Create Blog',
                'description' => 'Create New Blog'
            ],
            [
                'name' => 'blog-list',
                'display_name' => 'Display Blog Listing',
                'description' => 'List All Blog'
            ],
            [
                'name' => 'blog-update',
                'display_name' => 'Update Blog',
                'description' => 'Update Blog Information'
            ],
            [
                'name' => 'blog-delete',
                'display_name' => 'Delete Blog',
                'description' => 'Delete Blog Information'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
