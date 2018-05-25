<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "Album";
    protected $primaryKey = 'id_album';
    public $timestamps = true;

    public function song()
    {
    	return $this->hasMany('App\Song','id_album','id_album');
    }
    public function singer()
    {
    	return $this->belongsTo('App\Singer','id_singer','id_singer');
    }
}
