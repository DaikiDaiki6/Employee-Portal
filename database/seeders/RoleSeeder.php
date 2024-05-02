<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'name' => 'Admin',
            'permissions' => '[{"1":"Everything"}]',
        ]);
        Roles::create([
                'name' => 'Non-Teaching',
                'permissions' => '[{"1": "Edit"}, {"2": "Create"}, {"3": "Delete"}, {"4": "View"}]',
        ]);
        Roles::create([
                'name' => 'Dean',
                'permissions' => '[{"1": "Edit"}, {"2": "Create"}, {"3": "Delete"}, {"4": "View"}, {"5":"Approve"}]',
        ]);
        Roles::create([
            'name' => 'Department Head',
            'permissions' => '[{"1": "Edit"}, {"2": "Create"}, {"3": "Delete"}, {"4": "View"}, {"5":"Approve"}]',
        ]);
    }
}
