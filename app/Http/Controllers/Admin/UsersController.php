<?php
// met behulp van deze controller wordt er een admin panel gerealiseerd dit klinkt wellicht logisch,
// maar alleen de gebruiker met de rol : Admin mag hierbij komen.
// het voornaamste doel is om een user management system hiermee te realiseren, waarbij de administrator de user database kan/mag aanpassen

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller{

    public function index(){
        $users = User::all();
        // ^ Haalt alle users uit de tabel 'users'
        if (Gate::denies('manage-users')){
            return redirect(route('home'));
        }
        // ^ Wanneer de rol (in dit geval alleen admin) geen recht heeft op de gate 'manage-users' wordt deze geredirect naar de home route
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
    //
    // }

    public function edit(User $user){
      $roles = Role::all();
      $auth = Auth::user();

      if (Gate::denies('edit-users')){
        if (Gate::denies('edit-own-user')){
            return redirect(route('home'));
        }
      }
      /* ^
      Als de user een rol heeft van 'admin' (zie App/Providers/AuthserviceProvider) voor de gemaakte gate
      wordt de route 'admin.users.edit' gereturned (bewerken van de user wordt mogelijk gemaakt - zie view van de index page - edit button)

      Wanneer de gebruiker de rol 'admin' niet heeft gebeurt er niks en blijft de user op dezelfde pagina (index pagina)
      */

        return view('admin.users.edit')->with([
          'user' => $user,
          'roles' => $roles,
          'auth' => $auth,
        ]);
        /* ^
          de $user variabele wordt meegegeven aan de edit page, de gegevens die hierin staan zijn als volgt:
          - id
          - name (naam van de user)
          - email
          - email verified at (is tot nu toe nog NULL)
          - password (hashed)
          - remember token (leeg)
          - created at
          - updated at

          en daarnaast wordt de $roles variabele meegegeven, deze bevat alle informatie over de rollen.
          - id
          - name (naam van de rol)
          - created at
          - updated at
        */
    }

    public function update(Request $request, User $user){
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        /* ^
        1) $request komt binnen met de gegevens

        2) de user naam wordt geupdated
        2) de user email wordt geupdated
        3) de methode save() wordt gebruikt om het model te updaten (gegevens op te slaan)
         */
        return redirect()->route('admin.users.index');
        /* ^
        $user->roles() = relatie die gemaakt is.
        sync zorgt ervoor dat de array user id aan de juiste roles wordt gekoppeld

        daarna wordt er een redirect gedaan naar 'admin.users.index'
        */
    }

    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')){
          return redirect(route('admin.users.index'));
        };
        /* ^
        Als de user een rol heeft van 'admin' (zie App/Providers/AuthserviceProvider) voor de gemaakte gate
        wordt de route 'admin.users.edit' gereturned (bewerken van de user wordt mogelijk gemaakt - zie view van de index (resources/views/admin/users/index.blade.php) page - Delete button)

        Wanneer de gebruiker de rol 'admin' niet heeft gebeurt er niks en blijft de user op dezelfde pagina (index pagina)
        */
        $user->roles()->detach();
        // met de detach method wordt de role van de user gescheiden.
        $user->delete();
        // daarna wordt de user verwijderd

        return redirect()->route('admin.users.index');
        // tot slot wordt er een redirect gedaan naar admin.users.index
    }
}
