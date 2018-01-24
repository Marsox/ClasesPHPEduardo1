<?php

include_once '../../lib.php';
include_once '../../modelo/dbpdo.php';
include_once '../../modelo/usuario.php';

errorInit();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

if(empty($nombre)){
	pushError('nombre', 'Introduzca el nombre');
}else{
	if(strlen($nombre) < 6) {
		pushError('nombre', 'El nombre debe tener al menos 6 caracteres');
	}
}

if(empty($apellido)){
	pushError('apellido','Introduzca el apellido');
} else {
	if(strlen($apellido) < 12) {
		pushError('apellido','Los apellido deben tener al menos 12 caracteres');
	}
}

if(empty($nick)){
	pushError('nick','Introduzca el nick');
} else {
	if(strlen($nick) < 6) {
		pushError('nick','El nick debe tener al menos 6 caracteres');
	}
}

if(empty($email)){
	pushError('email','Introduzca el email');
} else {
	if(strlen($email) < 6) {
		pushError('email','El email debe tener al menos 6 caracteres');
	}
}

if(empty($pass)){
	pushError('pass','Introduzca el pass');
} else {
	if(strlen($pass) < 6) {
		pushError('pass','La contraseñá debe tener al menos 6 caracteres');
	}else{
		/*if (strpos('[a-z]',$pass) == false) {
			pushError('pass','La contraseña debe contener al menos una minuscula');
		}
		if (strpos('[A-Z]',$pass) == false) {
			pushError('pass','La contraseña debe contener al menos una mayuscula');
		}
		if (strpos('[0-9]',$pass) == false) {
			pushError('pass','La contraseña debe contener al menos un numero');
		}*/
	}
}

if(empty($pass2)){
	pushError('pass2','Introduzca el pass2');
} else {
	if($pass != $pass2){
		pushError('pass2','Las contraseñas deben ser iguales');
	}
}

if(!hayErrores()){
	$dbpdo = new DBPDO('usuario');
	$md5password = md5($pass);
	$dbpdo->insert(array(
									'nombre' => $nombre,
									'md5password' => $md5password,
									'apellido' => $apellido,
									'email' => $email,
									'nick' => $nick
								));

	$u = new Usuario($nombre, $md5password, $apellido, $email, $nick);
	

	$_SESSION['user'] = $u;


	header('Location: ../../paginas/contacto/lista.php');
}else{
	$_SESSION['POST'] = $_POST;
	unset($_SESSION['POST']);
	header('Location: ../../paginas/usuario/registro.php');
}

?>

