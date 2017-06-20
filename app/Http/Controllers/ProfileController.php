<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\CategoryModel;
use App\ProfileModel;
use DateTime;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    public function view($id){
    	if(Auth::check()){
    		$user = Auth::user();
    		$categories = CategoryModel::get();
    		$profile = ProfileModel::where('user_id', $id)->first();

    		return view('profile.index', ['categories'=>$categories, 'user'=>$user, 'profile'=>$profile]);
    	} else{
    		return view('auth.login');
    	}
    }

    public function edit($id){
    	if(Auth::check()){
    		$user = Auth::user();
    		$categories  =CategoryModel::get();
    		$profile = ProfileModel::where('user_id', $id)->first();

    		return view('profile.edit', ['categories'=>$categories, 'user'=>$user, 'profile'=>$profile]);
    	} else{
    		return view('auth.login');
    	}
    }

    public function save($id, Request $request){
    	if(Auth::check()){
    		$full_name = $request->full_name;
    		$gender = $request->gender;
    		$email = $request->email;
    		$birthday = $request->birthday;
    		$birthday = str_replace("/","-",$birthday);

    		$profile = ProfileModel::where('user_id', $id)->first();
    		$user = Auth::user();
			$categories = CategoryModel::get();

			if($request->hasFile('file')){
				echo "co file";
				$file = $request->file('file');
				$file_type = $file->getClientMimeType('file');
				if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
					// remane
					$objDateTime = new DateTime('NOW');
					$now   = new DateTime;
					$file_name = $now->format( 'd-m-Y' ).'_'.rand(1000000000,99999999999).'.'.$file->getClientOriginalExtension();
					$file->move('images/avatar', $file_name);
					// $image_resize = Image::make($file->getRealPath());              
					// $image_resize->resize(54, 54);
					// $image_resize->save(public_path('images/avatar/' .$file_name));

					$profile->avatar = $file_name;
				} else{
					$msg = 'File upload not image!';
					return $msg;
				}
			}

			$profile->full_name = $full_name;
			$profile->gender = $gender;
			$profile->birthday = $birthday;
			$user->email = $email;

			$user->save();
			$profile->save();
			return redirect('profile/'.$user->id);

    	} else{
    		return view('auth.login');
    	}
    }

}
