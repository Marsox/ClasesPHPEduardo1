<?php 
include_once '../../lib.php';
include_once '../../modelo/categoria.php';
include_once '../../modelo/usuario.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NUevo Contacto</title>
</head>
<body>
	<?php if (hayErrores()) {
		mostrarErrores();
	}

	if (isset($_SESSION['user'])) {
		$categorias = Categoria::all();

	?>
		<form action="../../acciones/contacto/crear.php" method="POST">
			<p>
				<label for="nombre"> nombre </label>
				<input type="text" name="nombre">
			</p>
			<p>
				<label for="apellido"> apellido </label>
				<input type="text" name="apellido">
			</p>
			<p>
				<label for="telefono"> telefono </label>
				<input type="number" name="telefono">
			</p>
			<p>
				<label for="email"> email </label>
				<input type="email" name="email">
			</p>
			<p>
				<label for="direccion"> direccion </label>
				<input type="text" name="direccion">
			</p>
			<p>
				<label for="categoria"> categoria </label>
				<select name="categoria">
					<?php foreach ($categorias as $categoria) {
						echo "<option value=\"".$categoria->getId()."\">". $categoria->getNombre() ."</option>";
					} ?>
				</select>
			</p>
			<input type="submit" value="Crear">
		</form>
	<?php
	}else{
		header('Location: ../usuario/login.php');
	} ?>
</body>
</html>