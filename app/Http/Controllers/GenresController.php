<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre as Genre;

class GenresController extends Controller
{
  public function addGenre() {
    $genres = Genre::all();
    $return = array();
    foreach ($genres as $genre) {
      array_push($return, $genre->name);
    }
    return view('addGenre', ['genres' => $return]);
  }
  public function insertGenre(Request $request) {
    $genre = new Genre;
    $genre->name = $request->name;
    $genre->save();
    return redirect('/add/genre');
  }
}
