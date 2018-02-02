<?php 
include_once '../../lib.php';
include_once '../../modelo/categoria.php';
include_once '../../modelo/usuario.php';
include_once '../../modelo/contacto.php';
session_start();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$categoria = $_POST['categoria'];

if (isset($_SESSION['user'])) {
	$userPropietario = $_SESSION['user'];

	if ( !isset($nombre) ){
		pushError('nombre', 'No existe el campo nombre.');
	}
	if ( !isset($apellido) ) {
		pushError('apellido', 'No existe el campo apellido.');
	}
	if ( !isset($telefono) ) {
		pushError('telefono', 'No existe el campo telefono.');
	}
	if ( !isset($email) ) {
		pushError('email', 'No existe el campo email.');
	}
	if ( !isset($direccion) ) {
		pushError('direccion', 'No existe el campo direccion.');
	}
	if ( !isset($categoria) ) {
		pushError('categoria', 'No existe el campo categoria.');
	}

	Contacto::nuevoContacto($nombre,
		$apellido,
		$telefono,
		$email,
		$direccion,
		$categoria,
		$userPropietario);

	header('Location: ../../paginas/contacto/lista.php');

}else{
	//echo json_encode($_SESSION);
	header('Location: ../../paginas/usuario/login.php');
}

?>