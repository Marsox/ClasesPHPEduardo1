<?php 
include_once '../../lib.php';
include_once '../../modelo/contacto.php';
include_once '../../modelo/usuario.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listas</title>
</head>
<body>
	<table>
		<tr>
			<th>Nombre y apellidos</th>
			<th>Teléfono</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php 
		if (isset($_SESSION['user'])) {
			$contactos = Contacto::getForOwner($_SESSION['user']->getEmail());
		}else{
			$contactos = array();
		}
		foreach ($contactos as $contacto) {
			echo
			"<tr>
				<td>".$contacto->getNombre()." ".$contacto->getApellido()."</td>
				<td>".$contacto->getTelefono()."</td>
				<td><a href=\"editarContacto.php?id=".$contacto->getId()."\">Modificar</a></td>
				<td><a href=\"../../acciones/contacto/borrar.php?id=".$contacto->getId()."\">Borrar</a></td>
			</tr>";
		}
		?>
		
	</table>

	<a href="nuevoContacto.php">Nuevo</a>
</body>
</html>