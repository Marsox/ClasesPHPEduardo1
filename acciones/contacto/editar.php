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
$id = $_POST['id'];

if (isset($_SESSION['user'])) {
	$userPropietario = $_SESSION['user'];

	if (isset($id)) {
		$contacto = Contacto::getById($id);

		if($contacto != false){
			if ($contacto->getUserPropietarioEmail() == $userPropietario->getEmail()) {
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

				$contacto->setNombre($nombre);
				$contacto->setApellido($apellido);
				$contacto->setTelefono($telefono);
				$contacto->setEmail($email);
				$contacto->setDireccion($direccion);
				$contacto->setCategoria($categoria);

				$contacto->guardar();

			}else{
				pushError('userPropietarioEmail', 'No tiene permiso para editar este contacto');
			}
		}else{
			pushError('id', 'El contacto solicitado no existe');
		}
	}else{
		pushError('id', 'Seleccione el contacto que desea editar.');
	}
	if(!hayErrores()){
		header('Location: ../../paginas/contacto/lista.php');
	}else{
		header('Location: ../../paginas/contacto/editar.php?id='.$id);
	}
	

}else{
	//echo json_encode($_SESSION);
	header('Location: ../../paginas/usuario/login.php');
}

?>