<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TvShow as TvShow;
use App\Genre as Genre;

class TvShowsController extends Controller
{
  public function index() {
    $tvshows = TvShow::all();
    $value = array();
    $i = 0;
    foreach ($tvshows as $tvshow) {
      array_push($value, [
        "name" => $tvshow->name,
        "genre" => array(),
        "id" => $tvshow->id,
        "creator" => $tvshow->creator,
        "season" => $tvshow->season,
        "year" => $tvshow->year,
        "price" => $tvshow->price,
        ]
      );
      foreach ($tvshow->genres as $genre) {
        array_push($value[$i]["genre"], $genre->name);
      };
      $i ++;
    };
    return view('tvshows', ["tvshows" => $value]);
  }
  public function addTvShow() {
    $genres = Genre::all();
    $genresList = array();
    foreach ($genres as $genre) {
      $genresList[$genre->id] = $genre->name;
    }
    return view('addTvShow', ['genres' => $genresList]);
  }
  public function insertTvShow(Request $request) {
    $tvshow = new TvShow;
    $tvshow->name = $request->name;
    $tvshow->save();
    $tvshow->genres()->attach($request->genre);
    return redirect('/tvshows');
  }
  public function deleteTvShow(Request $request) {
    $tvshow = TvShow::find($request->id);
    $tvshow->delete();
    return redirect('/tvshows');
  }
  public function updateTvShow(Request $request) {
    $tvshow = TvShow::find($request->id);
    $genres = Genre::all();
    $genresList = array();
    foreach ($genres as $genre) {
      $genresList[$genre->id] = $genre->name;
    }
    return view('updateTvShow', ['name' => $tvshow->name, 'genres' => $genresList, 'id' => $tvshow->id]);
  }
  public function updateTvShowAction(Request $request) {
    $tvshow = TvShow::find($request->id);
    $tvshow->name = $request->name;
    $tvshow->save();
    $tvshow->genres()->detach();
    $tvshow->genres()->attach($request->genre);
    return redirect('/tvshows');
  }
}
