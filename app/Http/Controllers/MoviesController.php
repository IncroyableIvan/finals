<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie as Movie;

class MoviesController extends Controller
{
  public function addMovie() {
    $movies = Movie::all();
    $return = array();
    foreach ($movies as $movie) {
      array_push($return, $movie->name);
    }
    return view('addMovie', ['movies' => $return]);
  }
  public function insertMovie(Request $request) {
    $movie = new Movie;
    $movie->name = $request->name;
    $movie->director = $request->director;
    $movie->genre = $request->genre;
    $movie->year = $request->year;
    $movie->price = $request->price;
    $movie->save();
    return redirect('/add/movie');
  }
}
