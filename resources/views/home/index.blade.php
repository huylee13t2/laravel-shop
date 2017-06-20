@extends('index')

@section('content')

@foreach($categories as $cate)
<h3 class="title_h1"><a href="category/{{$cate->id}}">{{$cate->title}}</a></h3>
<div class="product">
	@foreach($cate->product as $pro)
	<div class="sub_product">
		<h3 class="title_h2"><a href="product/{{$pro->id}}">{{ $pro->name }}</a></h3>
		<div class="ctn_left">
			<p class="ctn">{{ $pro->content }}</p>
			<p class="price">Price : $ {{  $pro->price }}</p>
			<p class="by_user">By : {{ $pro->user->name }}</p>
		</div>
		<div class="ctn_right">
			<img src="images/{{ $pro->image }}" class="img-thumbnail">
		</div>
		@if($pro->user->id != $user->id)
		<div class="clear">
			<a href="product/{{$pro->id}}" class="btn btn-danger"><i class="fa fa-shopping-cart" style="padding-right: 7px;"></i>Buy</a>
		</div>
		@endif
	</div>
	@endforeach
</div>
@endforeach

@endsection

