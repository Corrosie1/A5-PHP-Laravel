@extends('layouts.app')

@section('content')

<head>
  <script src="{{asset('js/functions.js')}}"></script>
</head>
<div class="container">
  <div class="row">
   <div class="col-md-8">
      <h1 class="display-4">EPK Aanpassen van </h1>
    <div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form action="{{ route('epk.update', $epkRecord[0]->id) }}" method="POST">
          @csrf
          <!-- bescherming tegen csrf -->
          {{ method_field('PUT') }}
          <!-- PUT manier, hierbij wordt de POST manier overschreden  -->
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" class="form-control" name="titel" value="{{$epkRecord[0]->titel}}"/>
            </div>
            <div class="form-group">
                <label for="youtubeId">Youtube ID(s):</label>
                <input type="text" class="form-control @error('youtubeId') is-invalid @enderror" name="youtubeId" value="{{$epkRecord[0]->youtubeId}}"></input>
                <button class="btn btn-secondary mt-1" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapseExample">
                  help?
                </button>
                </p>
                <div class="collapse" id="collapse">
                  <div class="card card-body">
                    <h5><strong>How it works:</strong></h5>
                     <p>For example, the youtube URL =  https://www.youtube.com/watch?v=HJ7qn0Q7n6c</p>
                     <ol>
                       <li>The id of the youtube URL = <strong>HJ7qn0Q7n6c</strong></li>
                       <li>Cut the id and comma seperate that.</li>
                       <li>Do this a maximum of 3 times</li>
                     </ol>
                     <h5><strong>For example:</strong></h5>
                     HJ7qn0Q7n6c, ZelaJ5ukwGo, 3HTc9xJHbU0
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label for="category">category</label>
              <select class="form-control" id="category" name="category" value="{{$epkRecord[0]->category}}">
                @can('manage-epk-pop')<option> pop </option>@endcan
                @can('manage-epk-rap')<option> rap </option>@endcan
                @can('manage-epk-hardstyle')<option> hardstyle </option>@endcan
              </select>
            </div>
            <div class="form-group">
                <label for="biografie">Biografie:</label>
                <textarea type="textarea" class="form-control" name="biografie" rows="6">{{$epkRecord[0]->biografie}}</textarea>
            </div>
            <div class="form-group">
              <input type="hidden" name="image" value="{{ $epkRecord[0]->image }}">
            </div>
            <div class="form-group">
              <input type="hidden" name="epk_id" id="epk_id">
            </div>
            <button onclick="getId()" type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <div>
        <h3>Pop music</h3>
        <img class="rounded" width="150px" src="{{ asset('images/pop.jpg') }}">
        <p>
          <small>
            <strong>Micheal Jackson</strong><br>
            #King of pop, #legend, #BillieJean, <br>
            #thriller, #blackOrWhite, #smoothCriminal
          </small>
        </p>
      </div>
      <div class="mt-3">
        <h3>Rap music</h3>
        <img class="rounded" width="200" src="{{ asset('images/rap.jpg') }}">
        <p>
          <small>
            <strong>Eminem</strong><br>
            #Rap God, #whiteRap,<br>
            #LoveTheWayYouLie, #MTV, #slimShady
          </small>
        </p>
      </div>
      <div class="mt-3">
        <h3>Hardstyle music</h3>
        <img class="rounded" src="{{ asset('images/hardstyle.jpg') }}">
        <p>
          <small>
            <Strong>Yellow Claw<Strong><br>
              #beastMode, #catchMe, #tillItHurts,<br>
              #shotgun, #goodDay, #thunder, #amsterDamned
          </small>
        </p>
    </div>
  </div>
</div>
{{$epkRecord[0]->id}}
@endsection
