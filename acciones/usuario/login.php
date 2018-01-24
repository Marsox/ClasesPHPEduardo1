<?php 

include_once '../../lib.php';
include_once '../../modelo/dbpdo.php';
include_once '../../modelo/usuario.php';

errorInit();

$email = $_POST['email'];
$pass = $_POST['pass'];

if(empty($email)){
	pushError('email','Introduzca el email');
}

if(empty($pass)){
	pushError('pass','Introduzca el pass');
}


	$dbpdo = new DBPDO('usuario');
	$usuarios = $dbpdo->select(array('email'=> $email));
	if(count($usuarios) > 0){
		$usuarioComoArray = $usuarios[0];
		$usuario = new Usuario(
			$usuarioComoArray['nombre'],
			$usuarioComoArray['md5password'],
			$usuarioComoArray['apellido'],
			$usuarioComoArray['email'],
			$usuarioComoArray['nick']
		);
		if (!$usuario->auth($pass)){
			pushError('email','Usuario/contraseña incorrecto(s)');
		}else{
			$_SESSION['user'] = $usuario;
			echo "Wiii";
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