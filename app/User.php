<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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


    public function products()
    {
        return $this->hasMany('App\ProductModel', 'user_id', 'id');
    }

    public function profile(){
        return $this->hasMany('App\ProfileModel', 'user_id', 'id');
    }

    public function comment(){
        return $this->hasMany('App\CommentModel', 'user_id', 'id');
    }

    public function likecomment(){
        return $this->hasMany('App\LikeCommentModel', 'user_id', 'id');
    }

    public function reply(){
        return $this->hasMany('App\ReplyModel', 'user_id', 'id');
    }
    
    public function like_reply(){
        return $this->hasMany('App\LikeReplyModel', 'user_id', 'id');
    }
}
