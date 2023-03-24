<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin','description' => 'controlles Every thing']);
        Role::create(['name' => 'techExpert','description' => 'controlles Everything except the admin']);
        Role::create(['name' => 'agent','description' => 'handles service requestes']);
        Role::create(['name' => 'client','description' => 'create a service request with task need to be handeled and take Surveys']);
    }
}
