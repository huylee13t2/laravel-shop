<!DOCTYPE html>
<html>
<head>
	<title>Shop Online</title>
	{{-- <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Mogra|Rokkitt|Shrikhand" rel="stylesheet"> --}}
	<base href="/public">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="datetimepicker/css/bootstrap-datetimepicker.min.css">
	<!-- <link href="bootstrap-star-rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css" /> -->
	<!-- <link href="bootstrap-star-rating/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/myscripts.js"></script>
	<script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- <script src="bootstrap-star-rating/js/star-rating.js" type="text/javascript"></script> -->
	<!-- <script src="bootstrap-star-rating/themes/krajee-svg/theme.js"></script> -->
	<!-- <script src="bootstrap-star-rating/js/locales/<lang>.js"></script> -->
</head>
<body>
	<div class="headerContainer">
		<nav class="navbar navbar-inverse navTop"> 
			<div class="container headerInner"> 
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
						<span class="sr-only">Shop Online</span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
					</button> 
					<a href="/" class="navbar-brand" id="logo"><i class="fa fa-qq"></i>Shop Online</a> 
				</div> 
			</div> 
		</nav>
	</div>
	
	<div class="contentContainer">
		<div class="container">
			<div class="formLogin">
				<h3>Register</h3>
				<form class="form-inline" action="postRegister" method="post">
					{{ csrf_field() }}
					<div class="form-group frGroup">
						<div class="alert alert-danger name_alert" style="display: none;">
							<p class="name_error"></p>
						</div>
						@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}<br>
							@endforeach
						</div>
						@endif
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" class="form-control" name="name" id="name" placeholder="Username" min="4" required="required">
						</div>
						<br>
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-key"></i></div>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" min="6" required>
						</div>
						<br>
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-history"></i></div>
							<input type="password" class="form-control" name="re_password" id="re_password" placeholder="Re-Password" min="6" required>
						</div>
						<br>
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
						</div>
					</div>
					<br>
					<div class="form-group frGroup">
						<button type="submit" class="btn btn-primary pull-left">Register</button>
						<a href="login" class="btn btn-primary pull-right">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="footerContainer">
		<div class="container footerInner">
			<p class="p_left" style="width: 50%; float: left;">&copy; Design by <strong>HuyLee</strong></p>
			<div class="p_right">
				<p>Email : <i>leduchuy13t2@gmail.com</i></p>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#name').blur(function(){
				var name = $('#name').val();
				if(name.length <4){
					$('.name_alert').css('display', 'block');
					$('.name_error').text('Name is longer than 4 characters');
				} else{
					$('.name_alert').css('display', 'none');
				}
			});

			$('#password').blur(function(){
				var name = $('#password').val();
				if(name.length < 6){
					$('.name_alert').css('display', 'block');
					$('.name_error').text('Password is longer than 6 characters');
				}else{
					$('.name_alert').css('display', 'none');
				}
			});

			$('#re_password').blur(function(){
				var name = $('#re_password').val();
				if(name.length < 6){
					$('.name_alert').css('display', 'block');
					$('.name_error').text('Password is longer than 6 characters');
				}else{
					$('.name_alert').css('display', 'none');
				}
			});

			$('#re_password').blur(function(){
				var name = $('#re_password').val();
				var password = $('#password').val();
				if(name != password){
					$('.name_alert').css('display', 'block');
					$('.name_error').text('Re-Password error!');
				} else{
					$('.name_alert').css('display', 'none');
				}
			});

			// $('.frGroup').on('blur', 'input', function(){
			// 	console.log($(this).val());
			// });
		});
	</script>
</body>
</html>