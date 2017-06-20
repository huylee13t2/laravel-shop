<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductModel;

class CategoryModel extends Model
{
	public $timestamps = false;
    protected $table = 'categorys';

    public function product(){
    	return $this->hasMany('App\ProductModel', 'category_id', 'id');
    } 
}
