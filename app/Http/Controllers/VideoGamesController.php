<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoGame as VideoGame;

class VideoGamesController extends Controller
{
  public function addVideoGame() {
    $videogames = VideoGame::all();
    $return = array();
    foreach ($videogames as $videogame) {
      array_push($return, $videogame->name);
    }
    return view('addVideoGame', ['videogames' => $return]);
  }
  public function insertVideoGame(Request $request) {
    $videogame = new VideoGame;
    $videogame->name = $request->name;
    $videogame->editor = $request->editor;
    $videogame->genre = $request->genre;
    $videogame->year = $request->year;
    $videogame->price = $request->price;
    $videogame->save();
    return redirect('/add/videogame');
  }
}
