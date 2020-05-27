@extends('layouts.app')

@section('content')
@can('manage-epk-pop')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">POP EPK overzicht</div>
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
                    @foreach($popEpks as $pop)
                    <tr>
                      <th>{{ $pop->id }}</th>
                      <td width="80px">{{ $pop->titel }}</td>
                      <td width="350px"><small>{{ $pop->biografie }}</small></td>
                      <td>{{ $pop->category }}</td>
                      <td>
                        <a href="{{ route('epk.show', $pop->id)}}">
                          <button type="button" class="btn btn-info float-left mr-2 d-inline">show</button>
                        </a>
                        <a href="{{ route('epk.edit', $pop->id)}}">
                          <button type="button" class="btn btn-warning float-left mr-2  d-inline">Aanpassen</button>
                        </a>
                        <form class="float-left d-inline" action="{{ route('epk.destroy', $pop->id) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endcan
@can('manage-epk-rap')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rap EPK overzicht</div>
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
                    @foreach($rapEpks as $rap)
                    <tr>
                      <th>{{ $rap->id }}</th>
                      <td width="80px">{{ $rap->titel }}</td>
                      <td width="350px"><small>{{ $rap->biografie }}</small></td>
                      <td>{{ $rap->category }}</td>
                      <td>
                        <a href="{{ route('epk.show', $rap->id)}}">
                          <button type="button" class="btn btn-info float-left mr-2">show</button>
                        </a>
                        <a href="{{ route('epk.edit', $rap->id)}}">
                          <button type="button" class="btn btn-warning float-left mr-2">Aanpassen</button>
                        </a>
                        <form class="float-left" action="{{ route('epk.destroy', $rap->id) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endcan
@can('manage-epk-hardstyle')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hardstyle EPK overzicht</div>
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
                    @foreach($hardstyleEpks as $hardstyle)
                    <tr>
                      <th>{{ $hardstyle->id }}</th>
                      <td width="80px">{{ $hardstyle->titel }}</td>
                      <td width="350px"><small>{{ $hardstyle->biografie }}</small></td>
                      <td>{{ $hardstyle->category }}</td>
                      <td>
                        <a href="{{ route('epk.show', $hardstyle->id)}}">
                          <button type="button" class="btn btn-info float-left mr-2">show</button>
                        </a>
                        <a href="{{ route('epk.edit', $hardstyle->id)}}">
                          <button type="button" class="btn btn-warning float-left mr-2">Aanpassen</button>
                        </a>
                        <form class="float-left" action="{{ route('epk.destroy', $hardstyle->id) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
