<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeReplyModel extends Model
{
    protected $table = 'likes_reply';

    public function product(){
		return $this->belongsTo('App\ProductModel', 'product_id', 'id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function profile(){
		return $this->belongsTo('App\ProfileModel', 'profile_id', 'id');
	}
}
