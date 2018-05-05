<?php
use Illuminate\Http\Request;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Role
        $name = 'Admin';

        $role = new Role();
        $role->name = $name;
        $role->save();

        $permission = 'Administer roles & permissions';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);
        $permission = 'Create Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);
        $permission = 'Edit Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);
        $permission = 'Delete Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        // Editor Role
        $name = 'Editor';

        $role = new Role();
        $role->name = $name;
        $role->save();

        $permission = 'Create Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        $permission = 'Edit Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        // Agency Role
        $name = 'Agency';

        $role = new Role();
        $role->name = $name;
        $role->save();

        $permission = 'Create Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        $permission = 'Edit Job';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        $permission = 'Create Company';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);

        $permission = 'Edit Company';
        $p = Permission::where('name', '=', $permission)->firstOrFail();
        //Fetch the newly created role and assign permission
        $role = Role::where('name', '=', $name)->first();
        $role->givePermissionTo($p);
    }
}
