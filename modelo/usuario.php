<?php 

include_once '../../lib.php';
include_once '../../modelo/dbpdo.php';


class Usuario{
	
	private $nombre;
	private $md5password;
	private $apellido;
	private $email;
	private $nick;

	public static function getByEmail($email){
		$dbpdo = new DBPDO('usuario');
		$dbpdo->modeDEV = false;
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
			return $usuario;
		}else{
			return false;
		}
	}
	public static function nuevoUsuario($nombre, $password, $apellido, $email, $nick){
		$dbpdo = new DBPDO('usuario');
		$dbpdo->modeDEV = false;
		$usuarios = $dbpdo->select(array('email'=> $email));
		if(count($usuarios) > 0){
			return false;
		}else{
			$dbpdo->insert(array(
									'nombre' => $nombre,
									'md5password' => md5($password),
									'apellido' => $apellido,
									'email' => $email,
									'nick' => $nick
								));
			$usuario = new Usuario($nombre, md5($password), $apellido, $email, $nick);
			return $usuario;
		}
	}


	private function __construct($nombre, $md5password, $apellido, $email, $nick){
		$this->nombre = $nombre;
		$this->md5password = $md5password;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->nick = $nick;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getApellido(){
		return $this->apellido;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getNick(){
		return $this->nick;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function auth($pass){
		return ($this->md5password == md5($pass));
	}

}

 ?>