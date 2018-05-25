<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_favorite extends Model
{
    //
    protected $table = "User_favorite";
    protected $primaryKey = 'id_favorite';

    public function song()
    {
    	return $this->belongsTo('App\Song','id_song','id_song');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id_user');
    }
}
