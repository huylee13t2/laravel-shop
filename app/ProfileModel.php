<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    public $timestamps = false;
    protected $table = 'profile';

    function user(){
    	return $this->belongsTo('App\User');
    }
}
