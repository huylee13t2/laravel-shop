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
				<form action="admin/product/{{$product->id}}/update" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" type="text" name="title" value="{{ $product->name }}">
					</div>
					<div class="form-group">
						<label>Content</label>
						<textarea rows="10" class="form-control" name="content">{{ $product->content }}</textarea>
					</div>
					<div class="form_left">
						<div class="form-group">
							<label>Price</label>
							<input class="form-control" type="number" name="price" value="{{ $product->price }}">
						</div>
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="category">
								@foreach($list as $val)
								@if($val->id == $product->category_id)
								<option value="{{ $val->id }}" selected="selected">{{ $val->title }}</option>
								@else
								<option value="{{ $val->id }}" >{{ $val->title }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="form_right">
						<div class="form-group">
							<label>Image</label>
							<div class="img">
								<img src="images/{{ $product->image }}" class="img-thumbnail" style="width: 100%;">
							</div>
							<input type="file" name="file">
						</div>
					</div>
					<div class="clear"></div>
					<div class="form-group" style="clear: both; overflow: hidden; margin-top: 30px;">
						{{-- <a href="product/{{$product->id}}/save" class="btn btn-primary pull-left"><i class="fa fa-edit" style="padding-right: 7px;"></i>Save</a> --}}
						<button class="btn btn-primary">Save</button>
						<a href="admin" class="btn btn-danger pull-right"><i class="fa fa-mail-reply" style="padding-right: 7px;"></i>Back</a>
						<a href="admin/product/{{$product->id}}/delete" class="btn btn-danger pull-right" style="margin-right: 15px;"><i class="fa fa-trash" style="padding-right: 7px;"></i>Delete</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection