@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> aanpassen van rol voor de gebruiker {{ $user->name }}</div>
                <div class="card-body">
                  <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- ^
                        Input box om de mail van de desbetreffende gebruiker te editen
                        -->
                      </div>
                      <div class="form-group row">
                          <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <!-- ^
                          Input box om de naam van de desbetreffende gebruiker te editen
                          -->
                        </div>
                    @csrf
                    <!-- bescherming tegen csrf -->
                    {{ method_field('PUT') }}
                    <!-- PUT manier, hierbij wordt de POST manier overschreden  -->
                    <div class="form-group row">
                      <label for="Roles" class="col-md-2 col-form-label text-md-right">Rollen</label>

                      <div class="col-md-6">
                        @foreach($roles as $role)
                        <div class="form-check">
                          <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                          @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                          <!-- ^
                          bovenstaande lijn (  @if($user->roles->pluck('id')->contains($role->id)) checked @endif)
                          controleert of de gebruiker over rollen beschikt die overeen komen met de rollen in de database
                          Wanneer dit het geval is worden de checkboxes die overeenkomen met de rollen aangevinkt-->
                          <label> {{ $role->name }} </label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <!-- div met verschillende soorten rollen (die beschikbaar zijn uit de database) -->
                    <button type="submit" name="button" class="btn btn-primary">
                      verzenden
                    </button>
                    <!-- button verzend dit naar de volgende methode (update) -->
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
