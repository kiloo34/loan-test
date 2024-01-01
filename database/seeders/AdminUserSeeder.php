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
        $permissions = Permission::create(['name' => 'admin.dashboard.index']);
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo('admin.dashboard.index');
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
