<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Role::truncate();
        /* ^
        De optie truncate in laravel zorgt ervoor dat de desbetreffende tabel,
        in dit geval de tabel "create_roles_table" volledig leeggemaakt wordt.

        Wanneer dit niet zou gebeuren wordt wanneer het commando "php artisan db:seed" uitgevoerd word
        dezelfde data opnieuw toegevoegd.
        */
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'pop']);
        Role::create(['name'=>'rap']);
        Role::create(['name'=>'hardstyle']);
        Role::create(['name'=>'user']);
        /* ^
        met bovenstaande code worden alle rollen gemaakt in de tabel "create_roles_table"
        */
    }
}
