@extends('layouts.app')
@section('content')
<div>
  <div class="row">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">EPK overzicht</div>
                      <form method="get" class="navbar-form navbar-left" action="{{route('guest')}}">
                        @csrf
                        <div class="input-group custom-search-form">
                          <input type="text" class="form-control" name="keyword" placeholder="Zoek...">
                          <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                              <i class="fa fa-search"><span>Search</span></i>
                            </button>
                          </span>
                      </form>
                    </div>
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titel</th>
                        <th scope="col">Biografie</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">actie</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($epkRecords as $epk)
                      <tr>
                        <th>{{ $epk->id }}</th>
                        <td width="80px">{{ $epk->titel }}</td>
                        <td width="350px"><small>{{ $epk->biografie }}</small></td>
                        <td>{{ $epk->category }}</td>
                        <td><a href="{{ route('guest.show', $epk->id)}}"><button class="btn btn-info">show</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
