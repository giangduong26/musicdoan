<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer_show extends Model
{
    //
    protected $table = "Singer_show";
    protected $primaryKey = 'id_show';
    public $timestamps = true;
     
    public function song()
    {
    	return $this->belongsTo('App\Song','id_song','id_song');
    }

    public function singer()
    {
    	return $this->belongsTo('App\Singer','id_singer','id_singer');
    }
}
