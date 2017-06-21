@extends('base')

@section('content')

<div class="row">
	
	<div class="navLeft col-md-2">
		<h3 "><i class="fa fa-bars" style="padding-right: 15px;"></i>Menu</h3>
		<ul style="width: 100%; margin: 0; padding: 0;" class="nav navbar-nav leftBar">
			<li class="left_items" style="width: 100%; float: none;"><a href="product/create"><i class="fa fa-plus-circle" style="padding-right: 10px;"></i>New category</a></li>
			<li class="left_items" style="width: 100%; float: none;"><a href="admin"><i class="fa fa-list-alt" style="padding-right: 10px;"></i>My product</a></li>
		</ul>
	</div>
	<div class="col-md-10 content">
		<h3 class="title_h1"><a class="not_hover" style="cursor: default; text-decoration: none;">Product <i class="fa fa-angle-right"></i> {{$product->name}} </a></h3>
		<div class="product">
			<div class="sub_product">
				{{-- <h3 class="title_h2"><a href="product/1">Aston Martin AM-RB 001</a></h3> --}}
				<div class="ctn_left">
				<p class="ctn">{{$product->content}} </p>
					<p class="price">Price : $ {{ $product->price }}</p>
					{{-- <p class="by_user">By : huylee</p> --}}
					<p class="category">Category : {{$product->catagory->title}}</p>
				</div>
				<div class="ctn_right">
					<img src="images/{{$product->image}}" class="img-thumbnail">
				</div>
			</div>
			<div class="form-group" style="clear: both; overflow: hidden;">
				{{-- <a href="product/1/edit" class="btn btn-primary pull-left"><i class="fa fa-edit" style="padding-right: 7px;"></i>Edit</a> --}}
				<a href="/admin" class="btn btn-danger pull-right"><i class="fa fa-mail-reply" style="padding-right: 7px;"></i>Back</a>
			</div>

		</div>
	</div>
</div>


@endsection