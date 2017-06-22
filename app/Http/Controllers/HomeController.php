<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\User;
use App\CategoryModel;
use App\ProfileModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function show(){
		if (Auth::check()) {
			// return 'Da login';
			$user = Auth::user();
			$products = ProductModel::get();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			$categories = CategoryModel::get();

			return view('home.index',['products'=>$products,'categories'=>$categories, 'user'=> $user, 'profile'=>$profile]);
		} else{
			return view('auth.login');
		}
		
	}
}
