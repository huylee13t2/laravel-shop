@extends('index')

@section('content')

<div class="profile row">
	<div class=" col-md-9 profile_right">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Username</th>
					<td>{{ $profile->user->name }}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{ $profile->user->email }}</td>
				</tr>
				<tr>
					<th>Fullname</th>
					<td>{{ $profile->full_name }}</td>
				</tr>
				<tr>
					<th>Birthday</th>
					<td>{{ date('d/m/Y', strtotime($profile->birthday)) }}</td>
				</tr>
				<tr>
					<th>Gender</th>
					<td>
						@if($profile->gender == 1)
						{{'Male'}}
						@else
						{{'Female'}}
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-3 profile_left">
		<img src="images/avatar/{{$profile->avatar}}" class="img-thumbnail">
	</div>
	<div class="form-group clear" style="overflow: hidden; padding: 0 15px;">
		@if($user->id == $profile->user->id)
		<a href="profile/{{$user->id}}/edit" class="btn btn-primary pull-left">Change</a>
		@endif
		<a href="/" class="btn btn-danger pull-right">Back</a>	
	</div>
</div>

@endsection