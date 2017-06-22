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
	{{-- header --}}
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
				<div class="navbar-collapse collapse navTopLeft" id="bs-example-navbar-collapse-9" aria-expanded="false" style="height: 1px;"> 
					<ul class="nav navbar-nav" > 
						<li class="active"><a href="/"><i class="fa fa-home"></i>Home</a></li> 
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>{{$profile->full_name}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" style="left: auto; right: 0; min-width: 100%;">
								@if($profile->admin == 1)
								<li><a href="admin"><i class="fa fa-user-circle-o" style="padding-right: 7px; float: left;"></i>Admin</a></li>
								@endif
								<li><a href="profile/{{$user->id}}"><i class="fa fa-user" style="padding-right: 7px; float: left;"></i>Profile</a></li>
								<li><a href="logout"><i class="fa fa-sign-out" style="padding-right: 7px; float: left;"></i>Logout</a></li>
							</ul>
						</li>
					</ul> 
				</div> 
			</div> 
		</nav>
	</div>

