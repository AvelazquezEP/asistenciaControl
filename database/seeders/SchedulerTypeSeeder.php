<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\schedulers;

class SchedulerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = [
            'b1',
            'b2',
            'lnc',
        ];

        foreach ($types as $type) {
            schedulers::create([
                'title' => $type,
                'description' => $type,
                'created_at' => '2023-08-25 00:00:00.000',
                'updated_at' => '2023-08-25 00:00:00.000',
            ]);
        }

        // $role = Role::create(['name' => 'Admin']);


    }
}
