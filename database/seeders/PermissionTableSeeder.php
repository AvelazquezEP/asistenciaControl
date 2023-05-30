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
            'resource-list',
            'resource-create',
            'resource-edit',
            'resource-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'exams-list',
            'exams-create',
            'exams-edit',
            'exams-delete',
            'assistance-list',
            'assistance-create',
            'assistance-edit',
            'assistance-delete',
            'request-list',
            'request-create',
            'request-edit',
            'request-delete',
            'scheduler-list',
            'scheduler-create',
            'scheduler-edit',
            'scheduler-delete',
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
            'exams',
            'assistance',
            'request',
            'scheduler',
        ];

        foreach ($permissions as $permission) {
            foreach ($modules as $module) {
                if (str_contains($permission, $module)) { //<---- si contiene alguna de las palabras se le asigna un este al campo module en cada registro
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
