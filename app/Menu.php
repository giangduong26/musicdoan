<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = "Menu";
    protected $primaryKey = 'id_menu';
    public $timestamps = true;
    
    public function song()
    {
    	return $this->hasMany('App\Song','id_menu','id_menu');
    }
}
