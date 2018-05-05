<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed test admin
        $seededAdminEmail = 'admin@project-nac.com';
        $password = 'password';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null)
        {
            $user = User::create([
                'name'                           => 'Admin',
                'email'                          => $seededAdminEmail,
                'password'                       => $password,
            ]);
            //$user->profile()->save($profile);
            //$user->attachRole($adminRole);
            $user->save();
            $role = Role::where('name', '=', 'Admin')->first();
            $user->roles()->sync($role);  //If one or more role is selected associate user to roles
        }

        // Seed test editor
        $seededAdminEmail = 'editor@project-nac.com';
        $password = 'password';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null)
        {
            $user = User::create([
                'name'                           => 'Admin',
                'email'                          => $seededAdminEmail,
                'password'                       => $password,
            ]);
            //$user->profile()->save($profile);
            //$user->attachRole($adminRole);
            $user->save();
            $role = Role::where('name', '=', 'Editor')->first();
            $user->roles()->sync($role);  //If one or more role is selected associate user to roles
        }
    }
}
