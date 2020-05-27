<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Epk;

class WelcomeController extends Controller{

    public function index(){
      $epk = Epk::all();
      return view('welcome')->with('epk', $epk);
    }
}
