<!-- app/views/nerds/inico.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenida</title>
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

<h1>Bienvenido</h1>

</div>
</body>
</html>
