@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gebruikers overzicht</div>
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Naam</th>
                      <th scope="col">email</th>
                      <th scope="col">Rol(len)</th>
                      <th scope="col">actie</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <th>{{ $user->id }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <!-- de implode methode met inhoud zorgt ervoor dat er bij een user meerdere rollen getoond kunnen worden
                      hierbij wordt dit doormiddel van een komma en spatie per rol getoond  -->
                      <td>
                        <!-- om te zien welke rollen toegang hebben tot de gate 'edit-users', zie App\Providers\AuthServiceProviders.php -->
                        @can('edit-users')
                        <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-warning float-left">Aanpassen</button></a>
                        @endcan
                        <!-- om te zien welke rollen toegang hebben tot de gate 'delete-users', zie App\Providers\AuthServiceProviders.php -->
                        @can('delete-users')
                        <form class="float-left" action="{{ route('admin.users.destroy', $user) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="SUBMIT" class="btn btn-danger">Verwijderen</button>
                        </form>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
