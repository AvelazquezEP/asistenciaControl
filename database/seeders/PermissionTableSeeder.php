<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard-list',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'resource-list',
            'resource-create',
            'resource-edit',
            'resource-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            // '',
        ];

        $modules = [
            'dashboard',
            'post',
            'user',
            'role',
            'product',
            'resource',
            'category',
        ];

        foreach ($permissions as $permission) {
            foreach ($modules as $module) {
                if (str_contains($permission, $module)) {
                    Permission::create([
                        'name' => $permission,
                        'module' => $module,
                        'status' =>  true,
                    ]);
                }
            }
        }
    }
}
