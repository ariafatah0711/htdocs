<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsAndRolesSeeder extends Seeder
{
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // CREATE PERMISSIONS
        Permission::create(['name' => 'view-any Permission']);
        Permission::create(['name' => 'view Permission']);
        Permission::create(['name' => 'create Permission']);
        Permission::create(['name' => 'update Permission']);
        Permission::create(['name' => 'delete Permission']);
        Permission::create(['name' => 'force-delete Permission']);
        Permission::create(['name' => 'restore Permission']);

        Permission::create(['name' => 'view-any Role']);
        Permission::create(['name' => 'view Role']);
        Permission::create(['name' => 'create Role']);
        Permission::create(['name' => 'update Role']);
        Permission::create(['name' => 'delete Role']);
        Permission::create(['name' => 'force-delete Role']);
        Permission::create(['name' => 'restore Role']);

        // CREATE ROLES
        $adminRole = Role::create(['name' => 'Admin']);
        $managerRole = Role::create(['name' => 'Manager']);
        $staffRole = Role::create(['name' => 'Staff']);

        $adminRole->givePermissionTo(Permission::all());

        // CREATE USERS
        User::create([
            'name' => 'Admin',
            'is_admin' => true,
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'Budi',
            'is_admin' => false,
            'email' => 'budi@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($managerRole);

        User::create([
            'name' => 'Dedi',
            'is_admin' => false,
            'email' => 'dedi@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole($staffRole);
    }
}
