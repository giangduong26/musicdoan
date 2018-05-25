<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    //
    protected $table = "Genres";
    protected $primaryKey = 'id_genres';
    public $timestamps = false;

    public function song()
    {
    	return $this->hasMany('App\Song','id_genres','id_genres');
    }
}
