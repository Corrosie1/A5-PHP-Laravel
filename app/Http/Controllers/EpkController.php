<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Epk;
use Auth;
use Gate;

function multiexplode ($delimiters, $string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

class EpkController extends Controller {

    public function multiexplode ($delimiters, $string) {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

    public function index(){
        $this->user = Auth::user();
        //
        $popEpks = Epk::where('epk_id', '=', 1)->get();
        $rapEpks = Epk::where('epk_id', '=', 2)->get();
        $hardstyleEpks = Epk::where('epk_id', '=', 3)->get();

        return view('epk.index')->with([
          'user' => $this->user,
          'popEpks' => $popEpks,
          'rapEpks' => $rapEpks,
          'hardstyleEpks' => $hardstyleEpks
        ]);
    }

    public function create(){
        $user = Auth::user();
        return view('epk.create')->with('user', $user);
    }

    public function store(Request $request){
        $request->validate([
          'titel' => 'required',
          'biografie' => 'required',
          'category' => 'required',
          'epk_id' => 'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        // naam van de image wordt veranderd
        $request->image->move(public_path('images/uploads/' . $request->category . '/' . $request->titel . "/"), $imageName);
        // image wordt verplaatst naar een andere map
        $data = $request->all();
        $data['image'] = '/images/uploads/' . $request->category . '/' . $request->titel . "/" . $imageName;
        // om de request aan te passen (zodat we het path naar de image kunnen opslaan in de database) slaan we dit op in de variabele $data
        // daarna wordt de ['image'] attribuut aangepast, hier komt het path te staan naar de image

        Epk::create($data);
        // records worden aangemaakt in de database
        return redirect(route('epk.index'))->with('success','Het EPK Record is succesvol aangemaakt');
        // redirect naar epk.index wordt gemaakt. Daar zal ook een success message naar voren toe komen dat de boel goed is geupload
    }

    public function show($id){

      $epkRecord = Epk::where('id', '=', $id )->get();
      $user = Auth::user();
      $youtubeIds = strlen($epkRecord[0]->youtubeId) < 40 ? $this->multiexplode(array(",", " "), $epkRecord[0]->youtubeId) : array('NvjcwY_CraA', 'NvjcwY_CraA', 'NvjcwY_CraA');

      return view('epk.show')->with([
        'user' => $user,
        'epkRecord' => $epkRecord,
        'youtubeIds' => $youtubeIds
      ]);
    }

    public function edit($id){
        $epkRecord = Epk::where('id', '=', $id )->get();
        $user = Auth::user();

        return view('epk.edit')->with([
          'epkRecord' => $epkRecord,
          'user' => $user
        ]);
    }

    public function update(Request $request, epk $epk){

      $request->validate([
        'titel' => 'required',
        'biografie' => 'required',
        'category' => 'required',
        'epk_id' => 'required',
      ]);

      $epk->titel = $request->titel;
      $epk->biografie = $request->biografie;
      $epk->category = $request->category;
      $epk->epk_id = $request->epk_id;
      $epk->youtubeId = $request->youtubeId;
      $epk->save();

      return redirect(route('epk.index'));
    }

    public function destroy(Epk $epk){
        $epk->delete();
        return redirect(route('epk.index'));
    }
}
