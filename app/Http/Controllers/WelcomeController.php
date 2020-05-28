<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Epk;


class WelcomeController extends Controller {

    public function multiexplode ($delimiters, $string) {
      $ready = str_replace($delimiters, $delimiters[0], $string);
      $launch = explode($delimiters[0], $ready);
      return  $launch;
    }

    public function index(Request $request){
      $keyword = $request->keyword;

        if (isset($keyword)){
          $epkRecords = Epk::where('id', 'LIKE', '%'.$keyword.'%')->orWhere('titel', 'LIKE', '%'.$keyword.'%')->orWhere('category', 'LIKE', '%'.$keyword.'%')->get();
        } else {
          $epkRecords = Epk::all();
        }

      return view('guest')->with('epkRecords', $epkRecords);
    }

    public function show($id){

      $epkRecord = Epk::where('id', '=', $id )->get();
      $youtubeIds = strlen($epkRecord[0]->youtubeId) < 40 ? $this->multiexplode(array(",", " "), $epkRecord[0]->youtubeId) : array('NvjcwY_CraA', 'NvjcwY_CraA', 'NvjcwY_CraA');

      return view('epk.show')->with([
        'epkRecord' => $epkRecord,
        'youtubeIds' => $youtubeIds
      ]);
    }
  }
