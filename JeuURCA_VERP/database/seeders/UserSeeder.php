<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assurez-vous de mettre le bon chemin vers votre modèle
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissionCreate = Permission::create(['name' => 'create']);
        $permissionEdit = Permission::create(['name' => 'edit']);
        $permissionDelete = Permission::create(['name' => 'delete']);

        $user0 = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => Hash::make('admin'),
        ]);
        
        $role0 = Role::create(['name' => 'admin']);
        $role0->syncPermissions([ $permissionCreate, $permissionEdit, $permissionDelete ]);
        $user0->assignRole($role0);

        $user1 = User::create([
            'name' => 'orga',
            'email' => 'orga@orga.fr',
            'password' => Hash::make('orga'),
        ]);
        
        $role1 = Role::create(['name' => 'orga']);
        $role1->syncPermissions([ $permissionCreate, $permissionEdit, $permissionDelete ]);
        $user1->assignRole($role1);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@user.fr',
            'password' => Hash::make('user'),
        ]);
        
        $role2 = Role::create(['name' => 'user']);
        $user2->assignRole($role2);
    }
}
