<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roleClient = Role::create(['name' => 'client','description' => 'create a service request with task need to be handeled and take Surveys']);

        User::create([
            'name' => 'client user',
            'email' => 'client@tahses.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tahses@22'),
        ])->assignRole('client');
        
        $permissions = [
            'user management access',
            'permission edit',
            'permission show',
            'permission delete',
            'permission access',
            'role create',
            'role edit',
            'role show',
            'role delete',
            'role access',
            'user create',
            'user edit',
            'user show',
            'user delete',
            'user access',
            'service category create',
            'service category edit',
            'service category show',
            'service category delete',
            'service category access',
            'service type create',
            'service type edit',
            'service type show',
            'service type delete',
            'service type access',
            'service request create',
            'service request edit',
            'service request status',
            'service request show',
            'service request delete',
            'service request access',
            'service level agreement create',
            'service level agreement edit',
            'service level agreement sign',
            'service level agreement show',
            'service level agreement delete',
            'service level agreement access',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        
        $roleClientPermissions = [
            'service request create',
            'service request edit',
            'service request show',
            'service request delete',
            'service request access',
            // 'service level agreement create',
            'service level agreement sign',
            'service level agreement show',
            'service level agreement access',
        ];

        foreach ($roleClientPermissions as $permission)   {
            $roleClient->givePermissionTo($permission);
        }
        $roleClient->givePermissionTo('service level agreement create');
    }
}
