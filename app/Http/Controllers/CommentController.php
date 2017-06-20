<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentModel;
use App\ProductModel;
use App\CategoryModel;
use App\ProfileModel;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function new($id, Request $request){
    	if(Auth::check()){
    		$content = $request->comment;

    		$comment = new CommentModel;
    		$user = Auth::user();
    		$profile = ProfileModel::where('user_id', $user->id)->first();

    		$comment->content = $content;
    		$comment->product_id = $id;
    		$comment->user_id = $user->id;
    		$comment->profile_id = $profile->id;

    		$comment->save();

    		return redirect('product/'.$id);
    	}else{
    		return view('auth.login');
    	}
    }

    public function save($id, Request $request){
    	if(Auth::check()){
    		$content = $request->edit_content;

    		$comment = CommentModel::find($id);
    		$user = Auth::user();
    		$profile = ProfileModel::where('user_id', $user->id)->first();

    		$comment->content = $content;
    		$comment->user_id = $user->id;
    		$comment->profile_id = $profile->id;

    		$comment->save();

    		return redirect('product/'.$comment->product->id);
    	}else{
    		return view('auth.login');
    	}
    }

    public function delete($id){
    	if(Auth::check()){
    		$comment = CommentModel::find($id);

    		$product_id = $comment->product->id;

    		$comment->delete();

    		return redirect('product/'.$product_id);
    	} else{
    		return view('auth.login');
    	}
    }

}
