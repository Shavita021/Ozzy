<!-- app/views/nerds/inico.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Busqueda de Usuario</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('adminMaestro') }}">INICIO</a>
	</div>
		<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('buscar') }}">Administrar usuarios</a></li>
	</ul>
</nav>


    {{ Form::open(array('action' => 'systemController@busqueda', 'method' => 'get')) }}
        <h2 class="form-signin-heading">Busqueda</h2>
	    	{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
	    	
	  {{ Form::submit('Buscar', array('class' => 'btn btn-primary')) }}
</div>
</body>
</html>
