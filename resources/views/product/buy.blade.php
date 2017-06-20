@extends('index')

@section('content')

<h3 class="title_h1"><a class="not_hover" style="cursor: default; text-decoration: none;">Buy</a></h3>

<div class="product">
	<div class="ctn_top">
		<p><strong>Name : {{$product->name}} </strong></p>
		<p><strong>Price : {{$product->price}} </strong></p>
	</div>
	<div class="ctn_bot">
		<form class="form-inline" action="product/{{$product->id}}/buy" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
					<input type="text" class="form-control" id="exampleInputAmount" placeholder="Email" name="email" value="{{$user->email}}">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-id-card"></i></div>
					<input type="text" class="form-control" id="exampleInputAmount" placeholder="Name"  name="name" value="{{$user->name}}">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-id-card"></i></div>
					<textarea rows="1" class="form-control" name="address" placeholder="Address"></textarea>
				</div>
			</div>
			<button class="btn btn-primary"><i class="fa fa-check" style="padding-right: 7px;"></i>OK</button>
			<a href="product/{{$product->id}}" class="btn btn-danger">Cancel</a>
		</form>
	</div>
</div>

@endsection