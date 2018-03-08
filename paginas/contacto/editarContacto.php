<?php 
include_once '../../lib.php';
include_once '../../modelo/categoria.php';
include_once '../../modelo/usuario.php';
include_once '../../modelo/contacto.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Contacto</title>
</head>
<body>
	<?php if (hayErrores()) {
		mostrarErrores();
	}

	if (isset($_SESSION['user'])) {
		$categorias = Categoria::all();
		$id = $_GET["id"];
		if (isset($id)) {
			$contacto = Contacto::getById($id);

			if ($contacto != false) {
				if ($contacto->getUserPropietarioEmail() == $_SESSION['user']->getEmail()) {
				?>
					<form action="../../acciones/contacto/editar.php" method="POST">
						<input type="hidden" name="id" value = "<?php echo $contacto->getId()?>">
						<p>
							<label for="nombre"> nombre </label>
							<input type="text" name="nombre" value="<?php echo $contacto->getNombre();?>">
						</p>
						<p>
							<label for="apellido"> apellido </label>
							<input type="text" name="apellido" value="<?php echo $contacto->getApellido();?>">
						</p>
						<p>
							<label for="telefono"> telefono </label>
							<input type="number" name="telefono" value="<?php echo $contacto->getTelefono();?>">
						</p>
						<p>
							<label for="email"> email </label>
							<input type="email" name="email" value="<?php echo $contacto->getEmail();?>">
						</p>
						<p>
							<label for="direccion"> direccion </label>
							<input type="text" name="direccion" value="<?php echo $contacto->getDireccion();?>">
						</p>
						<p>
							<label for="categoria"> categoria </label>
							<select name="categoria">
								<?php foreach ($categorias as $categoria) {
									$s = "<option value=\"".$categoria->getId()."\"";
									if ($categoria->getId() == $contacto->getCategoria()) {
										$s .= " selected";
									}
									$s.= ">". $categoria->getNombre() ."</option>";
									echo $s;
								} ?>
							</select>
						</p>
						<input type="submit" value="Guardar">
					</form>
				<?php
				}else {
					pushError('user', 'No es el propietario del contacto especificado.');
					header('Location: lista.php');
				}
			}else{
				pushError('id', 'No se encuentra el contacto con el id especificado.');
				header('Location: lista.php');
			}
		}else{
			pushError('id', 'No se ha recibido un id.');
			header('Location: lista.php');
		}

	}else{
		header('Location: ../usuario/login.php');
	} ?>
</body>
</html>