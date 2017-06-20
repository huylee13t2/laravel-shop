<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
	protected $table = 'comments';

	public function product(){
		return $this->belongsTo('App\ProductModel', 'product_id', 'id');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function profile(){
		return $this->belongsTo('App\ProfileModel', 'profile_id', 'id');
	}

	public function reply(){
        return $this->hasMany('App\ReplyModel', 'comment_id', 'id');
    }

    public function likecomment(){
        return $this->hasMany('App\LikeCommentModel', 'comment_id', 'id');
    }
}
