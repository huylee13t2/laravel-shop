<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\ProductModel;
use App\User;
use App\CategoryModel;
use App\CommentModel;
use App\ReplyModel;
use App\ProfileModel;
use DateTime;

use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
	public function index(Request $request){
		if (Auth::check()) {
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			if($profile->admin == 1){
				$product = ProductModel::where('user_id', $user->id)->orderBy('id', 'disc')->paginate(5);

				return view('admin.index', ['user'=>$user, 'product'=>$product, 'profile'=>$profile]);
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}
		} else{

			return redirect('login');
		}
	}

	public function view($id) {
		if(Auth::check()){
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			if($profile->admin == 1){
				$product = ProductModel::find($id);	

				return view('admin.product.view', ['user'=>$user, 'profile'=>$profile, 'product'=>$product]);
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}
		} else{
			return redirect('login');
		}
	}

	public function edit($id){
		if(Auth::check()){
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();

			if($profile->admin == 1){
				$product = ProductModel::find($id);
				$list = CategoryModel::all();

				return view('admin.product.edit', ['user'=>$user, 'product'=>$product, 'profile'=>$profile, 'list'=>$list]);
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}
		} else{
			return redirect('login');
		}
	}

	public function update(Request $request, $id){
		if(Auth::check()){
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();

			if($profile->admin == 1){
				$product = ProductModel::find($id);
				$categories = CategoryModel::get();
				$list = CategoryModel::all();	

				if($request->hasFile('file')){
					$file = $request->file('file');
					$file_type = $file->getClientMimeType('file');
					if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
					// remane
						$objDateTime = new DateTime('NOW');
						$now   = new DateTime;
						$file_name = $now->format( 'd-m-Y' ).'_'.rand(1000000000,99999999999).'.'.$file->getClientOriginalExtension();
					// Image::make($file)->resize(250, 350);
					// Image::make($file)->resize(350, 250)->save(public_path('images/' . $file_name));
						$image_resize = Image::make($file->getRealPath());              
						$image_resize->resize(350, 250);
						$image_resize->save(public_path('images/' .$file_name));
					// $file->move('images', $file_name);

						$product->image = $file_name;
					} else{
						$msg = 'File upload not image!';
						return $msg;
					}
				}


				$product->name = $request->title;
				$product->content = $request->content;
				$product->price = intval($request->price);
				$product->category_id = intval($request->category);
				$product->user_id = intval($user->id);

				$product->save();

				return redirect('admin');
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}

		} else{
			return redirect('login');
		}
	}

	public function delete($id){
		if(Auth::check()){
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();

			if($profile->admin == 1){
				$product = ProductModel::find($id);
				$product->delete();	

				return redirect('admin');
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}

		} else{
			return redirect('login');
		}
	}

	public function new(){
		if (Auth::check()) {
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			if($profile->admin == 1){
				$product = ProductModel::where('user_id', $user->id)->orderBy('id', 'disc')->get();
				$list = CategoryModel::all();	

				return view('admin.product.add', ['user'=>$user, 'product'=>$product, 'profile'=>$profile, 'list'=>$list]);
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}
		} else{

			return redirect('login');
		}
	}

	public function save(Request $request){
		// return 'save!';
		if(Auth::check()){
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			if($profile->admin == 1){

				$this->validate($request, 
					[
					'name'=>'required|unique:products',
					'content' => 'required',
					'price' => 'required',
					'file' => 'required',
					], 
					[
					'name.required'=>'Name is required!',
					'name.unique'=>'Name already exists!',
					// content
					'content.required' => 'Content is required!',
					// price
					'price.required' => 'Price is required!',
					// file
					'file.required' => 'File is required!'
					]
					);

			// save data
				$product = new ProductModel;

				if($request->hasFile('file')){
					$file = $request->file('file');
					$file_type = $file->getClientMimeType('file');
					if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
					// remane
						$objDateTime = new DateTime('NOW');
						$now   = new DateTime;
						$file_name = $now->format( 'd-m-Y' ).'_'.rand(1000000000,99999999999).'.'.$file->getClientOriginalExtension();
					// $file->move('images', $file_name);
						$image_resize = Image::make($file->getRealPath());              
						$image_resize->resize(350, 250);
						$image_resize->save(public_path('images/' .$file_name));

						$product->image = $file_name;
					} else{
						$msg = 'File upload not image!';
						return $msg;
					}
				}

				$product->name = $request->name;
				$product->content = $request->content;
				$product->price = intval($request->price);
				$product->category_id = intval($request->category);
				$product->user_id = intval($user->id);

				$product->save();

				return redirect('admin');
			} else{
				return view('error.index', ['msg'=>'User not amdin!']);
			}

		} else{
			return view('auth.login');
		}
	}

}
