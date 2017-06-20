<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\ProductModel;
use App\CategoryModel;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller{

	public function view($id){
		if (Auth::check()) {
			$user = Auth::user();
			$products = ProductModel::get()->where('category_id', $id);
			$categories = CategoryModel::get();
			$category = CategoryModel::find($id);

			return view('category.index', ['products'=>$products, 'categories'=>$categories, 'category'=>$category, 'user'=>$user]);
		} else{

			return view('auth.login');
		}
	}
}

?>