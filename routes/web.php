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
use App\Genres;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin');

Route::get('admin/logout','UserController@getlogoutAdmin');

Route::get('home', function(){	
	return view('admin.Home');
});

Route::group(['prefix'=>'admin','middleware' => 'adminLogin'], function(){
	Route::group(['prefix'=>'Album'], function(){
		//admin/Album/listAlbum
		Route::get('listAlbum','AlbumController@getList');

		Route::get('addAlbum','AlbumController@getAdd');
		Route::post('addAlbum','AlbumController@postAdd');

		Route::get('editAlbum/{id_album}','AlbumController@getEdit');
		Route::post('editAlbum/{id_album}','AlbumController@postEdit');

		Route::get('delAlbum/{id_album}','AlbumController@getDel');
	});

	Route::group(['prefix'=>'Genres'], function(){
		//admin/Genres/listGenres
		Route::get('listGenres','GenresController@getList');

		Route::get('addGenres','GenresController@getAdd');
		Route::post('addGenres','GenresController@postAdd');

		Route::get('editGenres/{id_genres}','GenresController@getEdit');
		Route::post('editGenres/{id_genres}','GenresController@postEdit');

		Route::get('delGenres/{id_genres}','GenresController@getDel');
	});

	Route::group(['prefix'=>'Menu'], function(){
		//admin/Menu/listMenu
		Route::get('listMenu','MenuController@getList');

		Route::get('addMenu','MenuController@getAdd');
		Route::post('addMenu','MenuController@postAdd');

		Route::get('editMenu/{id_menu}','MenuController@getEdit');
		Route::post('editMenu/{id_menu}','MenuController@postEdit');

		Route::get('delMenu/{id_menu}','MenuController@getDel');
	});

	Route::group(['prefix'=>'Singer'], function(){
		//admin/Singer/listSinger
		Route::get('listSinger','SingerController@getList');

		Route::get('addSinger','SingerController@getAdd');
		Route::post('addSinger','SingerController@postAdd');

		Route::get('editSinger/{id_singer}','SingerController@getEdit');
		Route::post('editSinger/{id_singer}','SingerController@postEdit');

		Route::get('delSinger/{id_singer}','SingerController@getDel');
	});

	Route::group(['prefix'=>'Song'], function(){
		//admin/Song/listSong
		Route::get('listSong','SongController@getList');

		Route::get('addSong','SongController@getAdd');
		Route::post('addSong','SongController@postAdd');

		Route::get('editSong/{id_song}','SongController@getEdit');
		Route::post('editSong/{id_song}','SongController@postEdit');

		Route::get('delSong/{id_song}','SongController@getDel');
	});

	Route::group(['prefix'=>'Singer_show'], function(){
		//
		Route::get('listShow','ShowController@getList');

		Route::get('addShow','ShowController@getAdd');
		Route::post('addShow','ShowController@postAdd');

		Route::get('editShow/{id_show}','ShowController@getEdit');
		Route::post('editShow/{id_show}','ShowController@postEdit');

		Route::get('delShow/{id_show}','ShowController@getDel');
	});

	Route::group(['prefix'=>'User_comment'], function(){
		//
		// Route::get('listComment','CommentController@getList');

		Route::get('delComment/{id_comment}/{id_song}','CommentController@getDel');
	});

	Route::group(['prefix'=>'User'], function(){
		//admin/Album/listGenres
		Route::get('listUser','UserController@getList');

		Route::get('addUser','UserController@getAdd');
		Route::post('addUser','UserController@postAdd');

		Route::get('editUser/{id_user}','UserController@getEdit');
		Route::post('editUser/{id_user}','UserController@postEdit');
		Route::get('profileuser/{id_user}','UserController@getProfile');

		Route::get('delUser/{id_user}','UserController@getDel');
	});
});


// ======================================================
Route::get('indexx', 'pagesController@trangchu');

Route::get('song', 'pagesController@song'); 
Route::post('playsong', 'pagesController@playsong');

Route::get('album', 'pagesController@album');
Route::get('detailAlbum/{id_album}','pagesController@detailAlbum');
Route::post('albumsong', 'pagesController@albumsong');

Route::get('singer','pagesController@singer');
Route::get('detailSinger/{id_singer}','pagesController@detailSinger');
Route::any('singersong/{id_show}/{id_singer}', 'pagesController@singersong');

Route::post('addToPlaylist/{id_song}','pagesController@addToPlaylist');
Route::post('delToPlaylist/{id_song}','pagesController@delToPlaylist');
Route::get('playList/{id}', 'pagesController@getplayList');
Route::post('playList', 'pagesController@postplayList');

Route::post('listright','pagesController@listright');

Route::post('login', 'pagesController@postlogin');
Route::get('logout', 'pagesController@getlogout');

Route::get('search', 'pagesController@search');
Route::post('search', 'pagesController@postsearch');

Route::get('detailgenres/{id_genres}', 'pagesController@detailgenres');
Route::get('detailmenu/{id_menu}', 'pagesController@detailmenu');

Route::get('createacc','pagesController@getcreateacc');
Route::post('createacc','pagesController@postcreateacc');

Route::get('proFile/{id}', 'pagesController@profile');
Route::post('proFile/{id}', 'pagesController@postprofile');

Route::get('video', 'pagesController@video');
Route::get('playvideo/{id}', 'pagesController@playVideo');

Route::post('comment/{id}', 'pagesController@postcomment');

