<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
	protected $table = 'replies';

    public function comment(){
		return $this->belongsTo('App\CommentModel', 'comment_id', 'id');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function profile(){
		return $this->belongsTo('App\ProfileModel', 'profile_id', 'id');
	}

	public function product(){
		return $this->belongsTo('App\ProductModel', 'product_id', 'id');
	}

    public function like_reply(){
        return $this->hasMany('App\LikeReplyModel', 'reply_id', 'id');
    }
}
