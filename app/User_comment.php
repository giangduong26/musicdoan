<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_comment extends Model
{
    //
    protected $table = "User_comment";
    protected $primaryKey = 'id_comment';

    public function song()
    {
    	return $this->belongsTo('App\Song','id_song','id_song');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id_user');
    }
}
