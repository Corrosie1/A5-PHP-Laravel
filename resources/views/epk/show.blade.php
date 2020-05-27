@extends('layouts.app')

@section('content')
<head>
  <script src="{{asset('js/functions.js')}}"></script>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded">
                <div class="card-header" id="card-header">
                  <small>
                    <strong>
                      EPK :
                    </strong>
                    {{$epkRecord[0]->titel}}
                    <span class="float-right">
                      <strong>
                        Category :
                      </strong>
                      {{$epkRecord[0]->category}}
                    </span>
                  </small></p>
                </div>
                <div class="card-body background-mda" id="show-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <small>
                        inspirational image by ~ <strong>{{$epkRecord[0]->titel}}</strong>
                      </small>
                      <br><br>
                      <img class="mb-4 rounded" src="{{asset($epkRecord[0]->image)}}" alt="| Image could not be found |" width="220px" height="150px;">
                    </div>
                    <div class="mt-4 mb-4 w-75 p-4" >
                      <h5>Biography</h5>
                      <p width="">{{$epkRecord[0]->biografie}}</p>
                    </div>
                      <div class="text-center">
                        <small>
                          <strong>
                            What do we do? Here are a couple
                            of video's that we like, <br> play in or is inspirational to us.
                            Dream on, dream big #endGame #neverGiveUpDreaming
                          </strong>
                        </small>
                      </div>
                      <div class="row d-flex justify-content-center">
                        @foreach($youtubeIds as $id)
                          @if($id != Null && strlen($id) == 11)
                          <div class="d-inline mr-1">
                            <iframe class="rounded" width="220" height="150" src="https://www.youtube.com/embed/{{$id}}" alt="Video cannot be loaded">
                          </div>
                          @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt-3">
              <div class="d-inline">
                <h5>background images</h5>
                <small>Here you can adjust the background image. Set it to a gif, or anything else you like</small><br>
                <button class="btn btn-primary mt-2 mr-2" type="button" name="button" onclick="setBackground(1)">Background 1</button>
                <button class="btn btn-secondary mt-2 mr-2" type="button" name="button" onclick="setBackground(2)">Background 2</button>
                <button class="btn btn-success mt-2 mr-2" type="button" name="button" onclick="setBackground(3)">Background 3</button>
                <button class="btn btn-info mt-2 mr-2" type="button" name="button" onclick="setBackground(4)">Background 4</button>
                <button class="btn btn-dark mt-2" type="button" name="button" onclick="setBackground(5)">Background 5</button>
              </div>
              <br><br>
              <h5>text Colors</h5>
              <small>Here you can adjust the text colors, set it to black, white, green, orange or red</small><br>
              <div class="d-inline">
                <button class="btn btn-primary mt-2 mr-2" type="button" name="button" onclick="setTextColor(1)">black</button>
                <button class="btn btn-secondary mt-2 mr-2" type="button" name="button" onclick="setTextColor(2)">white</button>
                <button class="btn btn-success mt-2 mr-2" type="button" name="button" onclick="setTextColor(3)">green</button>
                <button class="btn btn-warning mt-2 mr-2" type="button" name="button" onclick="setTextColor(4)">orange</button>
                <button class="btn btn-danger mt-2" type="button" name="button" onclick="setTextColor(5)">red</button>
              </div>
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
</div>
@endsection
