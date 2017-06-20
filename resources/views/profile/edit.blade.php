@extends('index')

@section('content')

<div class="profile row">
	<form action="profile/{{$user->id}}/save" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class=" col-md-9 profile_right">
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username" disabled="disabled" value="{{$profile->user->name}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" value="{{$profile->user->email}}">
			</div>
			<div class="form-group">
				<label>Fullname</label>
				<input class="form-control" type="text" name="full_name" value="{{$profile->full_name}}">
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Birthday</label>
						<div class="well datetimepicker">
							<div id="datetimepicker1" class="input-append date">
								<input data-format="yyyy/MM/dd" type="text" name="birthday" class="form-control" style="width: 90%; display: inline-block;" value="{{ date('Y/m/d', strtotime($profile->birthday)) }}">
								<span class="add-on fa fa-calendar">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option value="0" @if($profile->gender == 0) selected @endif>Female</option>
							<option value="1" @if($profile->gender == 1) selected @endif>Male</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 profile_left">
			<img src="images/avatar/{{$profile->avatar}}" class="img-thumbnail">
			<div class="form-group">
				<label>Change image</label>
				<input class="form-control" type="file" name="file">
			</div>
		</div>
		<div class="form-group clear" style="overflow: hidden; padding: 0 15px; padding-top: 15px; border-top: 1px solid #1faa00; margin-top: 15px;">
			<button class="btn btn-primary">Save</button>
			<a href="profile/{{$user->id}}" class="btn btn-danger pull-right">Cancel</a>	
		</div>
	</form>
	
</div>

@endsection

@section('script')

<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker({
			language: 'pt-BR'
		});
	});
</script>

@endsection