<?php 

include_once '../../lib.php';
include_once '../../modelo/usuario.php';
session_start();
errorInit();

$email = $_POST['email'];
$pass = $_POST['pass'];

if(empty($email)){
	pushError('email','Introduzca el email');
}

if(empty($pass)){
	pushError('pass','Introduzca el pass');
}

	$usuario = Usuario::getByEmail($email);

	if($usuario != false){
		if(!$usuario->auth($pass)){
			pushError('email','Usuario/contraseña incorrecto(s)');
		}else{
			$_SESSION['user'] = $usuario;
		}
	}else{
		pushError('email','Usuario/contraseña incorrecto(s)');
	}

if(!hayErrores()){
	header('Location: ../../paginas/contacto/lista.php');
}else{
	header('Location: ../../paginas/usuario/login.php');
}

?>