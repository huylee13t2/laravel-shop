<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\ProductModel;
use App\User;
use App\CategoryModel;
use App\ProfileModel;
use App\CommentModel;
use App\ReplyModel;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Mail;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller{


	public function view($id){
		if (Auth::check()) {
			$user = Auth::user();
			$product = ProductModel::find($id);
			$categories = CategoryModel::get();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			$comment = CommentModel::where('product_id', $id)->orderBy('updated_at', 'desc')->get();

			return view('product.index', ['product'=>$product, 'categories'=>$categories, 'user'=>$user, 'profile'=>$profile, 'comment'=>$comment]);
		} else{

			return view('auth.login');
		}
	}

	public function edit($id){
		if(Auth::check()){
			$user = Auth::user();
			$categories = CategoryModel::get();
			$product = ProductModel::find($id);
			$list = CategoryModel::all();			

			return view('product.edit', ['product'=>$product, 'categories'=>$categories, 'user'=>$user, 'list'=>$list]);
		} else{
			return view('auth.login');
		}
	}

	public function save(Request $request, $id){
		if(Auth::check()){
			$product = ProductModel::find($id);
			$user = Auth::user();
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

			return redirect('product/'.$product->id);

		} else{
			return view('auth.login');
		}
	}

	public function delete($id){
		if(Auth::check()){
			$product = ProductModel::find($id);
			$product->delete();	

			return redirect('/');
		} else{
			return view('auth.login');
		}
	}

	public function viewCreate(){
		if(Auth::check()){
			$user = Auth::user();
			$categories = CategoryModel::get();
			$list = CategoryModel::all();

			return view('product.add', ['categories'=>$categories, 'user'=>$user, 'list'=>$list]);
		} else{
			return view('auth.login');
		}
	}

	public function create(Request $request){
		// return 'save!';
		if(Auth::check()){
			$user = Auth::user();

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

			return redirect('/');

		} else{
			return view('auth.login');
		}
	}

	public function viewBuy($id){
		$user = Auth::user();
		$categories = CategoryModel::get();
		$product = ProductModel::find($id);

		return view('product.buy', ['categories'=>$categories, 'user'=>$user, 'product'=>$product]);
	}

	public function buy($id, Request $request){
		$email = $request->email;
		$name = $request->name;
		$address = $request->address;


		$product = ProductModel::find($id);

		// $content = 'Hi '.$product->name.'!\nYou buy product : '.$product->name.'\nPrice : '.$product->price.'\nAddress : '.$address.'\nThanks!';
		// Mail::raw($content, function($message)
		// {	
		// 	$message->subject('Shop Online');
		// 	$message->from('user123example@gmail.com', 'Shop Online - Huylee');
		// 	$message->to('ledcuhuy13t2@gmail.com');

		// 	return 'buy!';
		// });

		
	}

}

?>