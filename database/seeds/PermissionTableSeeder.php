<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name = 'Administer roles & permissions';
        $permission = new Permission();
        $permission->name = $name;
        $permission->save();

        $name = 'Create Job';
        $permission = new Permission();
        $permission->name = $name;
        $permission->save();

        $name = 'Edit Job';
        $permission = new Permission();
        $permission->name = $name;
        $permission->save();

        $name = 'Delete Job';
        $permission = new Permission();
        $permission->name = $name;
        $permission->save();

    }
}
