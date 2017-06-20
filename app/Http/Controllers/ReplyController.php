<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentModel;
use App\ProductModel;
use App\CategoryModel;
use App\ProfileModel;
use App\ReplyModel;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
	public function new($id, Request $request){
		if(Auth::check()){
			$comment = CommentModel::find($id);
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();
			$reply = new ReplyModel;

			$reply->content = $request->comment;
			$reply->product_id = $comment->product->id;
			$reply->user_id = $user->id;
			$reply->profile_id = $profile->id;
			$reply->comment_id = $comment->id;

			$reply->save();

			return redirect('product/'.$comment->product->id);
		}
	}

	public function save($id, Request $request){
		if(Auth::check()){
			$reply = ReplyModel::find($id);

			$reply->content = $request->edit_rp_content;

			$reply->save();

			return redirect('product/'.$reply->product->id);
		} else{
			return view('auth.login');
		}
	}
}
