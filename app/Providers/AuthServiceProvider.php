<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
          return $user->hasAnyRoles(['admin', 'pop']);
        });
        /* ^
        Hier wordt de gate 'manage-users' aangemaakt.
        Ter voorbeeld gebruiken we nu de functie hasAnyRoles() (zie app\User.php voor de functie)

        wanneer de gebruiker de rol(len) admin en/of pop heeft, dan wordt er toegang gegeven tot de gate manage-users en daarmee een nieuwe pagina of deel van de pagina
        Wanneer de gebruiker geen rol heeft die gelijk staat aan 'admin' of 'pop' wordt false gereturned en daarmee geen toegang (code 403) of geen toegang tot een deel
        van de pagina

        Wanneer er sprake is van geen toegang tot een bepaald gedeelte van de pagina
        - controleer de desbetreffende views

        Wanneer er sprake is van een 403 error (forbidden)
        - controleer Routes\web.php
        */
        Gate::define('edit-users', function($user){
          return $user->hasRole('admin');
        });
        /* ^
        Voor de huidige ingelogde gebruiker is er een Gate gemaakt (dit geeft toegang tot een bepaalde sectie van een website)
        om de gate 'edit-users' binnen te mogen komen, moet een gebruiker de rol 'admin' hebben
        */
        Gate::define('delete-users', function($user){
          return $user->hasRole('admin');
        });
        /* ^
        Voor de huidige ingelogde gebruiker is er een Gate gemaakt (dit geeft toegang tot een bepaalde sectie van een website)
        om de gate 'delete-users' binnen te mogen komen, moet een gebruiker de rol 'admin' hebben
        */
    }
}
