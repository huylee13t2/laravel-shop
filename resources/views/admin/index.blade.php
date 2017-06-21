@extends('base')

@section('content')

<div class="row">
	<div class="">
		<h3 class="title_h1"><a class="not_hover" style="cursor: default; text-decoration: none;">Admin <i class="fa fa-angle-double-right"></i> My product</a></h3>
		<div class="product">
			<div class="add_new_product" style="margin-bottom: 15px;">
				<a href="admin/product/add-new" class="btn btn-primary"><i class="fa fa-plus" style="padding-right: 7px;"></i>Add new</a>
				<a href="admin/category/add-new" class="btn btn-primary pull-right"><i class="fa fa-plus" style="padding-right: 7px;"></i>Create category</a>
				{{-- <div class="pull-right">
					<label>Record : {{$record}}</label>
					<div class="" style="width: 60px; display: inline-block;">
						<select id="record" name="record" class="form-control" onchange="changRecord()">
							<option>5</option>
							<option>10</option>
							<option>20</option>
						</select>
					</div>
				</div> --}}
			</div>
			<div class="table-responsive">
				<table class="table table-bordered list_product">
					<thead>
						<th>Name</th>
						<th>Price</th>
						<th>Category</th>
						<th>Content</th>
						<th>Image</th>
						<th>Updated</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($product as $pro)
						<tr>
							<td class="name" style="width: 15%;"> <p>{{$pro->name}}</p> </td>
							<td style="width: 10%; font-weight: bold;"> $ {{$pro->price}} </td>
							<td style="width: 10%;"> {{$pro->catagory->title }} </td>
							<td class="td_ctn" style="width: 28%;"> <p>{{$pro->content }}</p> </td>
							<td style="width: 15%;">
								<img src="images/{{$pro->image}}" style="width: 100%;">
							</td>
							<td style="width: 12%; font-size: 14px;"> {{date('d/m/Y H:m:s', strtotime($pro->updated_at))}} </td>
							<td style="width: 10%;">
								<a class="col-md-4" href="admin/product/{{$pro->id}}/view"  ><i class="fa fa-eye"></i></a>
								<a class="col-md-4" href="admin/product/{{$pro->id}}/edit"  ><i class="fa fa-edit"></i></a>
								<a class="col-md-4" href="admin/product/{{$pro->id}}/delete"  ><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div style="text-align: center;">
					{!! $product->links() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

<script language="javascript">
             
            function changRecord()
            {
                $.ajax({
                    url : "admin", 
                    type : "get", 
                    dateType:"text", 
                    data : { 
                         record : $('#record').val()
                    },
                    success : function (result){
                        // $('#result').html(result);
                        console.log(result);
                    }
                });
            } 
     
        </script>

@endsection

