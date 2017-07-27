<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TvShow as TvShow;

class TvShowsController extends Controller
{
  public function addTvShow() {
    $tvshows = TvShow::all();
    $return = array();
    foreach ($tvshows as $tvshow) {
      array_push($return, $tvshow->name);
    }
    return view('addTvShow', ['tvshows' => $return]);
  }
  public function insertTvShow(Request $request) {
    $tvshow = new TvShow;
    $tvshow->name = $request->name;
    $tvshow->creator = $request->creator;
    $tvshow->genre = $request->genre;
    $tvshow->season = $request->season;
    $tvshow->year = $request->year;
    $tvshow->price = $request->price;
    $tvshow->save();
    return redirect('/add/tvshow');
  }
}
