<!DOCTYPE html>
<html>
	<head>
		<title>CCI Administration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
		@stylesheets('Grid')
		@stylesheets('Admin')
	</head>
	<body>
		<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">CCI</a>
		  </div>
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>
					<li><a href="/admin/users"><span class="glyphicon glyphicon-user"></span>Users</a></li>
					<li><a href="/admin/services"><span class="glyphicon glyphicon-align-right"></span> Services</a></li>
					<li><a href="/admin/about-pages"><span class="glyphicon glyphicon-book"></span> About Pages</a></li>
					<li><a href="/admin/content-areas"><span class="glyphicon glyphicon-book"></span> Pages and Content Areas</a></li>
					<li><a href="/admin/highlights"><span class="glyphicon glyphicon-star"></span> Highlights</a></li>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<p class="navbar-text">Signed in as {{ $user->email }}</p>
			  <li><a href="/logout">Logout</a></li>
			</ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
		@if(Session::has('message'))
			<div class="alert alert-warning">
				<h2>{{ Session::get('message') }}</h2>
			</div>
		@endif
		<div class="container">
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Delete</h4>
						</div>
						<div class="modal-body">
						
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" id="confirmDelete">Delete</button>
						</div>
					</div>
				</div>
			</div>
			<div class="page-header">
				@if(isset($grid['pageHeading']))
				<h1>{{ $grid['pageHeading'] }} </h1>
				@else
				<h1>CCI Administrator Area</h1>
				@endif
			</div>
			@yield('content')
		</div>
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/deleteModal.js"></script>
		@javascripts('Grid')
		@javascripts('Admin')
	</body>
</html>
