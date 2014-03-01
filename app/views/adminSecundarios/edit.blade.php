<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Editar Secundario</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('adminSecundario') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('adminSecundario') }}">View All Nerds</a></li>
		<li><a href="{{ URL::to('adminSecundario/create') }}">Create a Nerd</a>
	</ul>
</nav>

<h1>Editar {{ $adminSecundario->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($adminSecundario, array('route' => array('adminSecundario.update', $adminSecundario->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Nombre') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone_number', 'Telefono') }}
		{{ Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
