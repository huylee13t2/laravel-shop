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
				{{-- <div class="navbar-collapse collapse navTopLeft" id="bs-example-navbar-collapse-9" aria-expanded="false" style="height: 1px;"> 
					<ul class="nav navbar-nav" > 
						<li class="active"><a href="/"><i class="fa fa-sign-in"></i>Login</a></li> 
						<li class=""><a href="/"><i class="fa fa-sign-out"></i>Register</a></li> 
					</ul> 
				</div>  --}}
			</div> 
		</nav>
	</div>
	
	<div class="contentContainer">
		<div class="container">
			<div class="formLogin">
				<h3>Login</h3>
				<form class="form-inline" action="postLogin" method="post">
					{{ csrf_field() }}
					<div class="form-group frGroup">
						{{-- @if($msg != null)
						<div class="alert alert-danger name_alert">
							<p class="name_error">
								{{$msg}}
							</p>
						</div>
						@endif --}}
						<label class="sr-only" for="exampleInputAmount">Username</label>
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" class="form-control" name="username" id="username" placeholder="Username">
						</div>
						<br>
						<label class="sr-only" for="exampleInputAmount">Password</label>
						<div class="input-group inpFr">
							<div class="input-group-addon"><i class="fa fa-key"></i></div>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
					</div>
					<br>
					<div class="form-group frGroup" style="text-align: center;">
						<button type="submit" class="btn btn-primary">Login</button>
						<a href="register" style="display: block; margin-top: 5px;">Create new account</a>
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
</body>
</html>
</body>
</html>