<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentModel;
use App\ProductModel;
use App\CategoryModel;
use App\ProfileModel;
use App\LikeCommentModel;
use Illuminate\Support\Facades\Auth;

class LikeCommentController extends Controller
{
	public function like($id){
		if(Auth::check()){
			$comment = CommentModel::find($id);
			$user = Auth::user();
			$profile = ProfileModel::where('user_id', $user->id)->first();

			$like = LikeCommentModel::where([['comment_id', $id], ['user_id', $user->id]])->first();

			if($like == null){
				$like = new LikeCommentModel;

				$like->product_id = $comment->product->id;
				$like->user_id = $user->id;
				$like->profile_id = $profile->id;
				$like->comment_id = $comment->id;

				$like->save();

				return redirect('product/'.$comment->product->id);
			} else{
				// dislike
    			$like->delete();

    			return redirect('product/'.$comment->product->id);
			}
		} else{
			return view('auth.login');
		}
	}
}
