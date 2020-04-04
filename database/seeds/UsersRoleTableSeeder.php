<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1) Create Admin Role
        $role = ['name' => 'developer', 'display_name' => 'Developer', 'description' => 'Admin assign Permission'];
        $role = Role::create($role);

        //2) Create Service User
        $serviceUser = ['name' => 'Default Service User', 'status' => 1];
        $serviceUser = \DB::table('service_client')->insert($serviceUser);

        //3) Create User
        $user = ['service_client_id' => 1,'name' => 'Developer', 'email' => 'developer@test.com', 'password' => Hash::make('12345678'),'api_token' => Str::random(80)];
        $user = DB::table('users')->insert($user);
    }
}
