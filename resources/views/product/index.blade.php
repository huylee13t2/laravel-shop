@extends('index')

@section('content')

<div class="product">
	<div class="sub_product">
		<h3 class="title_h2"><a href="product/{{$product->id}}">{{ $product->name }}</a></h3>
		<div class="ctn_left">
			<p class="ctn">{{ $product->content }}</p>
			<p class="price">Price : $ {{  $product->price }}</p>
			<p class="by_user">By : {{ $product->user->name }}</p>
			<p class="category">Category : {{ $product->catagory->title }}</p>
		</div>
		<div class="ctn_right">
			<img src="images/{{ $product->image }}" class="img-thumbnail">
		</div>
	</div>
	@if($product->user->id == $user->id)
	<div class="form-group" style="clear: both; overflow: hidden;">
		<a href="product/{{$product->id}}/edit" class="btn btn-primary pull-left"><i class="fa fa-edit" style="padding-right: 7px;"></i>Edit</a>
		<a href="/" class="btn btn-danger pull-right"><i class="fa fa-mail-reply" style="padding-right: 7px;"></i>Back</a>
	</div>
	@else
	<div class="clear">
		<a href="product/{{$product->id}}/view-buy" class="btn btn-danger"><i class="fa fa-shopping-cart" style="padding-right: 7px;"></i>Buy</a>
	</div>
	@endif
	
</div>

{{-- comment --}}
<div class="comment">
	<div class="comment_header">
		<div class="media">
			<div class="media-left">
				<div class="avatar">
					<img class="media-object" src="images/avatar/{{$profile->avatar}}" alt="{{$profile->avatar}}">
				</div>
			</div>
			<div class="media-body hd_ctn_comment">
				<form action="comment/{{$product->id}}/new" method="post">
					{{ csrf_field() }}
					<textarea rows="2" placeholder="Comment..." name="comment" class="form-control"></textarea>
					<button class="send_comment"><i class="fa fa-send-o"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div class="comment_content">
		@foreach($comment as $cmt)
		<div class="media sub_cmt">
			<div class="media-left">
				<div class="avatar">
					<img class="media-object" src="images/avatar/{{$cmt->profile->avatar}}">
				</div>
			</div>
			<div class="media-body ctn_comment">
				<h3 class="media-heading">
					<a href="profile/{{$cmt->profile->user->id}}">{{$cmt->profile->user->name}}</a>
					@if($user->id == $cmt->profile->user->id)
					<a href="comment/{{ $cmt->id }}/delete" class="pull-right" style="font-size: 14px; cursor: pointer;"><i class="fa fa-remove"></i></a>
					<a class="pull-right edit" style="font-size: 14px; margin-right: 10px; cursor: pointer;" data-toggle="collapse" data-target="#edit{{$cmt->id}}"><i class="fa fa-edit"></i></a>
					@endif
				</h3>
				<p class="ctn_cmt">{{ $cmt->content }}</p>
				<div class="action">
					<div class="dropdown view_like">
						<a class="dropdown-toggle"  data-toggle="dropdown">{{ $cmt->likecomment->count() }}</a>
						<ul class="dropdown-menu">
							@foreach($cmt->likecomment as $like)
							<li><a href="profile/{{$like->user->id}}">{{ $like->user->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<a href="comment/{{$cmt->id}}/like" 
						@foreach($cmt->likecomment as $like)
						@if($like->user->id == $user->id)
						style="color: #f34bb5;"
						@endif
						@endforeach
						><i class="fa fa-heart"></i>
					</a>
					<a href="#"><i class="fa fa-share-square-o"></i></a>
				</div>
				<div id="edit{{$cmt->id}}" class="collapse">
					<div class="edit_cmt">
						<form action="comment/{{ $cmt->id }}/save" method="post">
							{{ csrf_field() }}
							<textarea rows="2" class="form-control" name="edit_content">{{ $cmt->content }}</textarea>
							<button class="edit_save"><i class="fa fa-save"></i></button>
						</form>
					</div>
				</div>
				<div class="ctn_reply">
					@foreach($cmt->reply as $rp)
					<div class="media reply" style="overflow: visible;">
						<div class="media-left">
							<div class="avatar">
								<img class="media-object" src="images/avatar/{{$rp->profile->avatar}}">
							</div>
						</div>
						<div class="media-body ctn_comment ctn_reply">
							<h3 class="media-heading">
								<a href="profile/{{$rp->profile->user->id}}">{{$rp->profile->user->name}}</a>
								@if($user->id == $rp->profile->user->id)
								<a href="reply/{{ $rp->id }}/delete" class="pull-right" style="font-size: 14px; cursor: pointer;"><i class="fa fa-remove"></i></a>
								<a class="pull-right edit" style="font-size: 14px; margin-right: 10px; cursor: pointer;" data-toggle="collapse" data-target="#edit_reply{{$rp->id}}"><i class="fa fa-edit"></i></a>
								@endif
							</h3>
							<p class="ctn_cmt">{{ $rp->content }}</p>
							<div class="action">
								{{-- <a href="reply/{{$rp->id}}/like"><i class="fa fa-heart"></i></a> --}}
								<div class="dropdown view_like">
								<a class="dropdown-toggle"  data-toggle="dropdown">{{ $rp->like_reply->count() }}</a>
									<ul class="dropdown-menu">
										@foreach($rp->like_reply as $like)
										<li><a href="profile/{{$like->user->id}}">{{ $like->user->name }}</a></li>
										@endforeach
									</ul>
								</div>
								<a href="reply/{{$rp->id}}/like" 
									@foreach($rp->like_reply as $like)
									@if($like->user->id == $user->id)
									style="color: #f34bb5;"
									@endif
									@endforeach
									><i class="fa fa-heart"></i>
								</a>
							</div>
							<div id="edit_reply{{$rp->id}}" class="collapse">
								<div class="edit_cmt">
									<form action="reply/{{ $rp->id }}/save" method="post">
										{{ csrf_field() }}
										<textarea rows="2" class="form-control" name="edit_rp_content">{{ $rp->content }}</textarea>
										<button class="edit_save"><i class="fa fa-save"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="media" style="margin-top: 0; margin-bottom: 15px; margin-top: 15px;">
					<div class="media-left">
						<div class="avatar">
							<img class="media-object" src="images/avatar/{{$profile->avatar}}" alt="{{$profile->avatar}}">
						</div>
					</div>
					<div class="media-body hd_ctn_comment">
						<form action="reply/{{$cmt->id}}/new" method="post">
							{{ csrf_field() }}
							<textarea rows="2" placeholder="Comment..." name="comment" class="form-control"></textarea>
							<button class="send_comment"><i class="fa fa-send-o"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection

@section('script')

<script type="text/javascript">	
	$(document).ready(function(){
		$('.comment').on('click', '.edit', function(){
			if($(this).parent().parent().find('.display_none').length == 0){
				$(this).parent().parent().find('.ctn_cmt').addClass('display_none');
			} else{
				$(this).parent().parent().find('.ctn_cmt').removeClass('display_none');
			}
			console.log($(this).parent().parent().find('.ctn_cmt').length);
		});
	});
</script>

@endsection