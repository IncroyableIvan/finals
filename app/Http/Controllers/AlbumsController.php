<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album as Album;

class AlbumsController extends Controller
{
  public function addAlbum() {
    $albums = Album::all();
    $return = array();
    foreach ($albums as $album) {
      array_push($return, $album->name);
    }
    return view('addAlbum', ['albums' => $return]);
  }
  public function insertAlbum(Request $request) {
    $album = new Album;
    $album->name = $request->name;
    $album->artist = $request->artist;
    $album->genre = $request->genre;
    $album->year = $request->year;
    $album->price = $request->price;
    $album->save();
    return redirect('/add/album');
  }
}
