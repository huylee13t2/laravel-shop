@extends('index')

@section('content')

<h3 class="title_h1"><a class="not_hover" style="cursor: default; text-decoration: none;">Create new product</a></h3>

<div class="product">
	<div class="sub_product">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}}<br>
				@endforeach
			</div>
		@endif
		<form action="product/create/save" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Title</label>
				<input class="form-control" type="text" name="name" >
			</div>
			<div class="form-group">
				<label>Content</label>
				<textarea rows="10" class="form-control" name="content"></textarea>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" type="number" name="price" >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category">
							@foreach($list as $val)
							<option value="{{ $val->id }}" >{{ $val->title }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Image</label>
						<input class="form-control" type="file" name="file">
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="form-group" style="clear: both; overflow: hidden; margin-top: 30px;">
				<button class="btn btn-primary"><i class="fa fa-plus-circle" style="padding-right: 7px;"></i>Add</button>
				<a href="/" class="btn btn-danger pull-right"><i class="fa fa-mail-reply" style="padding-right: 7px;"></i>Cancel</a>
			</div>
		</form>
	</div>	
</div>

@endsection