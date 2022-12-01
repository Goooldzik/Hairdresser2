<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $adminRole = Role::findOrCreate(UserRole::Admin);
        $adminRole->permissions()->sync([]);

        $hairdresserRole = Role::findOrCreate(UserRole::Hairdresser);
        $hairdresserRole->permissions()->sync([]);

        $employeeRole = Role::findOrCreate(UserRole::Employee);
        $employeeRole->permissions()->sync([]);

        $clientRole = Role::findOrCreate(UserRole::Client);
        $clientRole->permissions()->sync([]);

        foreach (UserPermission::getValues() as $permission) {
            Permission::findOrCreate($permission);
        }

        $adminPermissions = [
            UserPermission::Dashboard,
            UserPermission::Users,
            UserPermission::UsersManagement,
            UserPermission::Visits,
            UserPermission::VisitsManagement,
            UserPermission::Settings,
        ];

        $hairdresserPermissions = [
            UserPermission::Dashboard,
            UserPermission::Users,
            UserPermission::Visits,
            UserPermission::VisitsManagement,
        ];

        $employeePermissions = [
            UserPermission::Dashboard,
            UserPermission::Users,
            UserPermission::Visits,
        ];

        $clientPermissions = [
            UserPermission::Dashboard,
            UserPermission::Profile,
        ];

        foreach ($adminPermissions as $permission) {
            if (!$adminRole->hasPermissionTo($permission)) {
                $adminRole->givePermissionTo(Permission::findOrCreate($permission));
            }
        }

        foreach ($hairdresserPermissions as $permission) {
            if (!$adminRole->hasPermissionTo($permission)) {
                $adminRole->givePermissionTo(Permission::findOrCreate($permission));
            }
        }

        foreach ($employeePermissions as $permission) {
            if (!$adminRole->hasPermissionTo($permission)) {
                $adminRole->givePermissionTo(Permission::findOrCreate($permission));
            }
        }

        foreach ($clientPermissions as $permission) {
            if (!$adminRole->hasPermissionTo($permission)) {
                $adminRole->givePermissionTo(Permission::findOrCreate($permission));
            }
        }
    }
}
