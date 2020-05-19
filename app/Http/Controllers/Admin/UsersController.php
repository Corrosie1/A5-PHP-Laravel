<?php
// met behulp van de controller wordt er een admin panel gerealiseerd dit klinkt wellicht logisch,
// maar alleen de gebruiker met de rol : Admin mag hierbij komen.
// het voornaamste doel is om een user management system hiermee te realiseren, waarbij de administrator de user database kan/mag aanpassen

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }
    /* ^
      Wanneer 1 van ONDERSTAANDE functies wordt aangeroepen (doormiddel van een route) zorgt bovenstaande functie/constructor ervoor
      dat er eerst word gekeken of de gebruiker ingelogd is.
      Wanneer dit niet zo is wordt deze geredirect naar de login pagina.
    */

    public function index(){
        $users = User::all();
        // ^ Haalt alle users uit de database
        return view('admin.users.index')->with('users', $users);
        /* ^
        view bestand bevindt zich in /resources/views/admin/users/index.blade.php
        in de $users variabele staan alle users, er wordt hier gezegd:
        we geven 'users' mee, de waardes kun je terugvinden in de $users variabele (dus all gebruikers zitten hierin)
        */
    }

    // public function create(){
    //  Note:
    //  De admin maakt geen gebruikers aan, dit gebeurt met "Register"
    //  Dit is ook de reden waarom deze functie disabled is.
    // }

    // public function store(Request $request){
    // Note:
    // Omdat deze functie een relatie betreft tot de create method, is deze functie ook niet nodig.
    // }

    // public function show(User $user){
    // Note:
    // Deze functie is niet nodig omdat alle gebruikers in de index getoond worden.
    // }

    public function edit(User $user){
        //
    }

    public function update(Request $request, User $user){
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
