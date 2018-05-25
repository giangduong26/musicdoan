<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    protected $primaryKey = 'id_user';
    public $timestamps = true;

    public function comment()
    {
        return $this->hasMany('App\User_comment','id_user','id_user');
    }

    public function favorite()
    {
        return $this->hasMany('App\User_favorite','id_user','id_user');
    }
}
