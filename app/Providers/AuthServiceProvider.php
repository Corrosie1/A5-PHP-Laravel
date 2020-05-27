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
          return $user->hasRole('admin');
        });
        /* ^
        Voor de huidige ingelogde gebruiker is er een Gate gemaakt (dit geeft toegang tot een bepaalde sectie van een website)
        om de gate 'manage-users' binnen te mogen komen, moet een gebruiker de rol 'admin' hebben
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
        Gate::define('edit-own-user', function($user){
          return $user->hasAnyRoles(['pop', 'rap', 'hardstyle', 'user']);
        });
        /* ^
        bovenstaande rollen hebben het recht om hun eigen rollen aan te passen (admin kan alles aanpassen) - zie de gate edit-users
        */
        Gate::define('manage-epk-pop', function($user){
          return $user->hasAnyRoles(['pop', 'admin']);
        });
        /* ^
        Juiste EPK pop content worden weergegeven aan de users met de rollen: 'pop' of admin
        */
        Gate::define('manage-epk-rap', function($user){
          return $user->hasAnyRoles(['rap', 'admin']);
        });
        /* ^
        Juiste EPK RAP content worden weergegeven aan de users met de rollen: 'rap' of admin
        */
        Gate::define('manage-epk-hardstyle', function($user){
          return $user->hasAnyRoles(['hardstyle', 'admin']);
        });
        /* ^
        Juiste EPK hardstyle content worden weergegeven aan de users met de rollen: 'hardstyle' of admin
        */
    }
}
