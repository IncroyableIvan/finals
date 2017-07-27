<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', 'AccueilController@index');

// Routes in relation to albums element
Route::get('/albums', 'AlbumsController@index');
Route::get('/add/album', 'AlbumsController@addAlbum');
Route::post('/insert/album', 'AlbumsController@insertAlbum');
Route::post('/delete/album', 'AlbumsController@deleteAlbum');
Route::post('/update/album', 'AlbumsController@updateAlbum');
Route::post('/update/album/action', 'AlbumsController@updateAlbumAction');

// Routes in relation to movies element
Route::get('/movies', 'MoviesController@index');
Route::get('/add/movie', 'MoviesController@addMovie');
Route::post('/insert/movie', 'MoviesController@insertMovie');
Route::post('/delete/movie', 'MoviesController@deleteMovie');
Route::post('/update/movie', 'MoviesController@updateMovie');
Route::post('/update/movie/action', 'MoviesController@updateMovieAction');

// Routes in relation to tv_shows element
Route::get('/tvshows', 'TvShowsController@index');
Route::get('/add/tvshow', 'TvShowsController@addTvShow');
Route::post('/insert/tvshow', 'TvShowsController@insertTvShow');
Route::post('/delete/tvshow', 'TvShowsController@deleteTvShow');
Route::post('/update/tvshow', 'TvShowsController@updateTvShow');
Route::post('/update/tvshow/action', 'TvShowsController@updateTvShowAction');

// Routes in relation to video_games element
Route::get('/videogames', 'VideoGamesController@index');
Route::get('/add/videogame', 'VideoGamesController@addVideoGame');
Route::post('/insert/videogame', 'VideoGamesController@insertVideoGame');
Route::post('/delete/videogame', 'VideoGamesController@deleteVideoGame');
Route::post('/update/videogame', 'VideoGamesController@updateVideoGame');
Route::post('/update/videogame/action', 'VideoGamesController@updateVideoGameAction');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
