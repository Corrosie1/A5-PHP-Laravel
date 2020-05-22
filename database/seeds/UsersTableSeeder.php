<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
// nodig om het wachtwoord HASHED in de database op te slaan
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    public function run(){
        User::truncate();
        DB::table('role_user')->truncate();
        /* ^
        De tabel users wordt leeggemaakt
        De tabel 'role_user' wordt leeggemaakt.

        Het grote verschil hierin zit het hem dat je in het geval van de "users" tabel de klasse kan aanroepen om de tabel leeg te maken
        bij de tabel role_user is er geen import, en dus wordt dit via "DB::table('role_user')->truncate();" leeggemaakt.
        dit zou bij de users tabel op de volgende manier ook kunnen

        DB::table('users')->truncate();

        PS.
        de tabel "role_user" linked de role naar de user
        */

        $adminRole = Role::where('name', 'admin')->first();
        $popRole = Role::where('name', 'pop')->first();
        $rapRole = Role::where('name', 'rap')->first();
        $hardstyleRole = Role::where('name', 'hardstyle')->first();
        $userRole = Role::where('name', 'user')->first();
        /* ^
        De resultaten van bovenstaande queries wordt opgeslagen in een variabele
        */

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
        /* ^
        De users worden aangemaakt, hiervan worden het volgende ingevuld:
        - Naam
        - Email
        - Een wachtwoord, dit wachtwoord wordt vervolgens gehashed.
        */

        $admin->roles()->attach($adminRole);
        $pop->roles()->attach($popRole);
        $rap->roles()->attach($rapRole);
        $hardstyle->roles()->attach($hardstyleRole);
        $user->roles()->attach($userRole);

        /* ^
        Wat we al hebben gedaan is dat we een relatie hebben gemaakt tussen role user en user en role.
        wat er met bovenstaande code gebeurt is als volgt:

        De user wordt gekoppeld aan een role.
        --
        $admin = de gebruiker
        ->roles = de relatie die we hebben gemaakt (zie het bestand App\User --> methode roles() )
        ->attach = de attach method koppelt iets aan de user
        $adminRole = De Rol :admin: wordt gekoppeld aan de user $admin
        --
        */
    }
}
