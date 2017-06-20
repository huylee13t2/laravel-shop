<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryModel;

class ProductModel extends Model
{
	public $timestamps = false;
    protected $table = 'products';

    public function catagory(){
    	return $this->belongsTo('App\CategoryModel', 'category_id', 'id');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function likecomment(){
        return $this->hasMany('App\LikeCommentModel', 'product_id', 'id');
    }

    public function like_reply(){
        return $this->hasMany('App\LikeReplyModel', 'product_id', 'id');
    }
}
