<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);
        // $permissions = Permission::create(['name' => 'admin.dashboard.index']);
        // $role = Role::create(['name' => 'admin'])
        //     ->givePermissionTo('admin.dashboard.index');
        Permission::create(['name' => 'admin.dashboard.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'admin.loan.destroy', 'guard_name' => 'web']);
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo('admin.dashboard.index', 
                'admin.loan.index',
                'admin.loan.create',
                'admin.loan.store',
                'admin.loan.show',
                'admin.loan.edit',
                'admin.loan.update',
                'admin.loan.destroy');
        // $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
