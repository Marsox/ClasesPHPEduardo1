<?php 
include_once '../../lib.php';
include_once '../../modelo/contacto.php';
include_once '../../modelo/usuario.php';

$id = $_GET['id'];
if (!isset($id)) {
	pushError('id', 'No se ha recibido el campo id.');
}else{
	$contacto = Contacto::getById($id);

	if ($contacto == false) {
		pushError('id', 'No existe el contacto');
	}else{
		$contacto->borrar();
	}
}

header('Location: ../../paginas/contacto/lista.php')
 ?>