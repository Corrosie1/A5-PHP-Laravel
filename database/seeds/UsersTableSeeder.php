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
    public function run(){
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $popRole = Role::where('name', 'pop')->first();
        $rapRole = Role::where('name', 'rap')->first();
        $hardstyleRole = Role::where('name', 'hardstyle')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
          'name' => 'Admin User',
          'email' => 'admin@admin.com',
          'password' => Hash::make('password')
        ]);
        $pop = User::create([
          'name' => 'pop User',
          'email' => 'pop@pop.com',
          'password' => Hash::make('password')
        ]);
        $rap = User::create([
          'name' => 'rap User',
          'email' => 'rap@rap.com',
          'password' => Hash::make('password')
        ]);
        $hardstyle = User::create([
          'name' => 'hardstyle User',
          'email' => 'hardstyle@hardstyle.com',
          'password' => Hash::make('password')
        ]);
        $user = User::create([
          'name' => 'normal User',
          'email' => 'user@user.com',
          'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $pop->roles()->attach($popRole);
        $rap->roles()->attach($rapRole);
        $hardstyle->roles()->attach($hardstyleRole);
        $user->roles()->attach($userRole);
    }
}
