<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role1 = Role::create(['name' => 'orga']);
        $role2 = Role::create(['name' => 'user']);

        $permissionCreate = Permission::create(['name' => 'create']);
        $permissionEdit = Permission::create(['name' => 'edit']);
        $permissionDelete = Permission::create(['name' => 'delete']);
        
        $role->syncPermissions([ $permissionCreate, $permissionEdit, $permissionDelete ]);
        $role1->syncPermissions([ $permissionCreate, $permissionEdit, $permissionDelete ]);

    }
}

