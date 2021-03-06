<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole =  Role::Where('name', 'admin')->first();
        $userRole =  Role::Where('name', 'user')->first();
        
      

        $admin = User::create([
            'name' => 'Admin User',
            'email' => '10001',
            'password' => Hash::make('password'),
            'santri_id' => 1
        ]);

        $admin->roles()->attach($adminRole);
    }
}
