@extends('index')

@section('content')

<h3 class="title_h1"><a href="category/{{$category->id}}">{{$category->title}}</a></h3>
<div class="product">
@foreach($products as $pro)
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
		</div>
	@endforeach
</div>

@endsection