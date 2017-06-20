<div class="navLeft col-md-2">
	<h3 "><i class="fa fa-bars" style="padding-right: 15px;"></i>Menu</h3>
	<ul style="width: 100%; margin: 0; padding: 0;" class="nav navbar-nav leftBar">
		<li class="left_items" style="width: 100%; float: none;"><a href="product/create"><i class="fa fa-plus-circle" style="padding-right: 10px;"></i>New product</a></li>
		@foreach($categories as $cate)
		<li class="left_items" style="width: 100%; float: none;"><a href="category/{{$cate->id}}"><i class="fa fa-angle-double-right" style="padding-right: 10px;"></i>{{ $cate->title }}</a></li>
		@endforeach
	</ul>
</div>