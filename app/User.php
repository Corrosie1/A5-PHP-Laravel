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
}
