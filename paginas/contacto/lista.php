<?php 
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
		</tr>
		<?php 

		$contactos = Contacto::getForOwner($_SESSION['user']->getEmail());

		foreach ($contactos as $contacto) {
			echo
			"<tr>
				<td>".$contacto->getNombre()." ".$contacto->getApellido()."</td>
				<td>".$contacto->getTelefono()."</td>
			</tr>";
		}
		?>
		
	</table>
</body>
</html>