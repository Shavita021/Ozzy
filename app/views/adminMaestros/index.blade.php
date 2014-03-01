<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Maestro</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('adminMaestro') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('adminMaestro') }}">View All Nerds</a></li>
		<li><a href="{{ URL::to('adminMaestro/create') }}">Create a Nerd</a>
	</ul>
</nav>

<h1>Maestros</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Email</td>
			<td>Numero</td>
			<td>Acciones</td>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>{{ Session::get('nombre') }}</td>
			<td>{{ Session::get('email') }}</td>
			<td>{{ Session::get('telefono') }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'adminMaestro/' . Session::get('id'), 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Borrar', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('adminMaestro/' . Session::get('id') ) }}">Show this Nerd</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('adminMaestro/' . Session::get('id'). '/edit') }}">Edit this Nerd</a>

			</td>
		</tr>
	</tbody>
</table>

</div>
</body>
</html>
