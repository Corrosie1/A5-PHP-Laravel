<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
      return $this->belongsToMany('App\User');
    }
    /* ^
      Zorgt voor de juiste relatie naar de user model
      de functie "belongsToMany" wordt gebruikt omdat dit een
      many to many relatie is (ook vice versa), dat wil zeggen dat een gebruiker
      meerdere rollen kan hebben, en meerdere gebruikers een rol kunnen hebben
    */
    // reverse van App\User.php
}
