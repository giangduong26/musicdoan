<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    //
    protected $table = "Singer";
    protected $primaryKey = 'id_singer';
    public $timestamps = false;

    public function album()
    {
    	return $this->hasMany('App\Album','id_singer','id_singer');
    }

    public function song()
    {
    	return $this->hasManyThough('App\Song','App\Album','id_singer','id_album','id_singer');
    }

    public function show()
    {
    	return $this->hasMany('App\Singer_show','id_singer','id_singer');
    }
}
