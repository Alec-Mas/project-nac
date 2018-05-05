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
        $seededAdminEmail = 'alec@project-nac.com';
        $password = 'password';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null)
        {
            $user = User::create([
                'name'                           => 'Alec',
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
        $seededAdminEmail = 'agency@project-nac.com';
        $password = 'password';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null)
        {
            $user = User::create([
                'name'                           => 'Agency',
                'email'                          => $seededAdminEmail,
                'password'                       => $password,
            ]);
            //$user->profile()->save($profile);
            //$user->attachRole($adminRole);
            $user->save();
            $role = Role::where('name', '=', 'Agency')->first();
            $user->roles()->sync($role);  //If one or more role is selected associate user to roles
        }
    }
}
