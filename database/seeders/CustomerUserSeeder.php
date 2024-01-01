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
        $permissions = Permission::create(['name' => 'customer.dashboard.index']);
        $role = Role::create(['name' => 'customer'])
            ->givePermissionTo('customer.dashboard.index');
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
