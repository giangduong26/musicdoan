<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    protected $table = "Song";
    protected $primaryKey = 'id_song';
    public $timestamps = true;

    public function menu()
    {
    	return $this->belongsTo('App\Menu','id_menu','id_menu');
    }

    public function genres()
    {
    	return $this->belongsTo('App\Genres','id_genres','id_genres');
    }

    public function comment()
    {
    	return $this->hasMany('App\User_comment','id_song','id_song');
    }

    public function favorite()
    {
    	return $this->hasMany('App\User_favorite','id_song','id_song');
    }

    public function show()
    {
    	return $this->hasMany('App\Singer_show','id_song','id_song');
    }

    public function album()
    {
    	return $this->belongsTo('App\Album','id_album','id_album');
    }
}
