@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Welkom!</h2>
                    <h5><strong>Aanpassen profiel</strong></h5>
                    <p>met behulp van de onderstaande link wordt je doorverwezen naar je eigen persoonlijke edit page.<br>
                    Het is hiermee mogelijk om je persoonlijk profiel aan te passen en bijvoorbeeld de volgende punten aan te passen</p>
                    <p><h6><strong>Graag het volgende testen bij dit onderdeel</strong></h6><small>
                      <ul>
                        <li>Aanpassen van andere gebruikers wanneer je ingelogd bent (id in GET aanpassen), <br>dit met de admin en zonder de admin rol</li>
                        <li>Aanpassen van je eigen rol wanneer je ingelogd bent</li>
                        <li>Aanpassen van andere gebruikers wanneer je ingelogd bent als administrator</li>
                      </ul>
                    </small></p>
                    <a href="{{ route('admin.users.edit', $user->id ) }}">
                      <button class="btn btn-primary ml-1" type="button" name="button">Pas mijn profiel aan</button>
                    </a>
                    <br>
                    <br>
                    <h5><strong>EPK</strong></h5>
                    <p>
                      Daarnaast is er de mogelijkheid om de EPK (Electronic Press kits) in te zien van de rol waar je aan verbonden bent.
                      klik op de onderstaande link(s) om de eerste doorverwijzing te krijgen richting de EPK's die jij beheert.
                    </p>
                    <p><h6><strong>Graag het volgende testen bij dit onderdeel</strong></h6><small>
                      <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                      </ul>
                    </small></p>
                    <div>
                      <a href="{{route('epk.index')}}">
                        <button class="btn btn-dark ml-1" type="button" name="button">EPK Overzicht</button>
                      </a>
                      <a href="{{route('epk.create')}}">
                        <button class="btn btn-primary ml-1" type="button" name="button">EPK aanmaken</button>
                      </a>
                    </div>
                    <div class="mt-4 ml-1">
                      <h5><strong>Bad Karma - Bass Nation</strong></h5>
                      <p>Klik <a href="https://www.youtube.com/watch?v=SpQmDckpIjc">hier</a> voor de youtube URL</p>
                      <iframe class="rounded " width="670" height="345" src="https://www.youtube.com/embed/SpQmDckpIjc">
                      </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div>
            <h3>Pop music</h3>
            <img class="rounded" width="150" src="{{ asset('images/pop.jpg') }}">
            <p>
              <small>
                Micheal Jackson
              </small>
            </p>
          </div>
          <div class="mt-3">
            <h3>Rap music</h3>
            <img class="rounded" width="200" src="{{ asset('images/rap.jpg') }}">
            <p>
              <small>
                Eminem
              </small>
            </p>
          </div>
          <div class="mt-3">
            <h3>Hardstyle music</h3>
            <img class="rounded" src="{{ asset('images/hardstyle.jpg') }}">
            <p>
              <small>
                Yellow Claw
              </small>
            </p>
          </div>
        </div>
    </div>
</div>
@endsection
