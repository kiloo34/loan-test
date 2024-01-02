<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CustomerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'customer',
            'username' => 'customer',
            'email' => 'customer@customer.com',
            'password' => bcrypt('123456')
        ]);
        Permission::create(['name' => 'customer.dashboard.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer.loan.destroy', 'guard_name' => 'web']);  
        $role = Role::create(['name' => 'customer'])
            ->givePermissionTo('customer.dashboard.index',
                'customer.loan.index',
                'customer.loan.create',
                'customer.loan.store',
                'customer.loan.show',
                'customer.loan.edit',
                'customer.loan.update',
                'customer.loan.destroy');
        // $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
