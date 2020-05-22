<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
      return $this->belongsToMany('App\Role');
      /* ^
        Zorgt voor de juiste relatie naar de Role model
        de functie "belongsToMany" wordt gebruikt omdat dit een
        many to many relatie is (ook vice versa), dat wil zeggen dat een rol
        meerdere gebruikers kan hebben, en meerdere gebruikers een rol kunnen hebben
      */
      // reverse van App\Role.php
    }
    public function hasAnyRoles($roles){
      if($this->roles()->whereIn('name', $roles)->first()){
        return true;
      }
      return false;
      /* ^
      Als de momenteel ingelogde gebruiker een rol heeft die in de database voorkomt, pak dan de direct de 1e rol die matched en return true
      wanneer dit niet zo is, of de user heeft geen rol, return false.

      in dit geval is $roles een array, de methode whereIn checkt daarbij op de tabelnaam en de waardes van de array die uit de database komen.
      */
    }
    public function hasRole($role){
      if($this->roles()->where('name', $role)->first()){
        return true;
      }
      return false;
    }
    /* ^
    Als de momenteel ingelogde gebruiker een rol heeft die overeenkomt met een rol die in de "name" kolom in de database staat,
    return true

    anders, return false.

    - Hierbij is $role een string variabele met de benaming ban de rol
    - de methode where gaat zoeken in alle kolommen van de name column uit de database en vergelijkt deze met de huidige rol van de gebruiker.
    - de eerste en de beste match is dan goed en wordt gereturned.
    
    */
}
