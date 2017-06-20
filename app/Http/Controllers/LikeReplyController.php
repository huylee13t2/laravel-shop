<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentModel;
use App\ReplyModel;
use App\ProductModel;
use App\CategoryModel;
use App\ProfileModel;
use App\LikeCommentModel;
use App\LikeReplyModel;
use Illuminate\Support\Facades\Auth;

class LikeReplyController extends Controller
{
	public function like($id){
		if(Auth::check()){
			$reply = ReplyModel::find($id);
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();

			$like = LikeReplyModel::where([['reply_id', $id], ['user_id', $user->id]])->first();

			if($like == null){
				$like = new LikeReplyModel;

				$like->product_id = $reply->product->id;
				$like->user_id = $user->id;
				$like->profile_id = $profile->id;
				$like->reply_id = $reply->id;

				$like->save();


			} else{
				$like->delete();
			}

			return redirect('product/'.$reply->product->id);
		} else{
			return view('auth.login');
		}
	}
}
