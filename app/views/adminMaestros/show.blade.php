<!-- app/views/nerds/show.blade.php -->
@if((Session::get('autorizacion')) != 'si') 
{{	header("Location: /");
	exit();
	}}
@else
<!DOCTYPE html>
<html>
<head>
	<title>Maestro</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('adminMaestro') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('adminMaestro') }}">View All Nerds</a></li>
		<li><a href="{{ URL::to('adminMaestro/create') }}">Create a Nerd</a></li>
	</ul>
</nav>

  <a class="btn btn-default btn-lg" href="{{ URL::action('systemController@logout') }}">
	  <span class="glyphicon glyphicon-log-out"></span>
	</a>
	
	
<h1>Showing {{ $adminMaestro->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $adminMaestro->name }}</h2>
		<p>
			<strong>Email:</strong> {{ $adminMaestro->email }}<br>
			<strong>Telefono:</strong> {{ $adminMaestro->phone_number }}
		</p>
	</div>

</div>
</body>
</html>
@endif
