<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\User;
use App\CategoryModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function show(){
		if (Auth::check()) {
			$user = Auth::user();
			$products = ProductModel::get();
			$categories = CategoryModel::get();

			return view('home.index',['products'=>$products,'categories'=>$categories, 'user'=> $user]);
		} else{

			return view('auth.login');
		}
		
	}
}
