<?php 

include_once '../../lib.php';
include_once '../../modelo/dbpdo.php';


class Contacto{

	private $id;

	private $nombre;
	private $apellido;
	private $telefono;
	private $email;
	private $direccion;
	private $categoria;
	private $fechaAlta;
	private $userPropietarioEmail;

	public static function nuevoContacto($nombre, $apellido, $telefono, $email, $direccion, $categoria, $userPropietario){
		$fechaAlta = time() + 3600;
		$dbpdo = new DBPDO('contacto');
		$dbpdo->modeDEV = false;
		$params = array('nombre' => $nombre,
			'apellido' => $apellido,
			'telefono' => $telefono,
			'email' => $email,
			'direccion' => $direccion,
			'categoria' => $categoria,
			'fechaAlta' => $fechaAlta,
			'userPropietarioEmail' => $userPropietario->getEmail());
		$id = $dbpdo->insert($params);
		return new Contacto($id, $nombre, $apellido, $telefono, $email, $direccion, $categoria, $fechaAlta, $userPropietario->getEmail());
	}

	public static function getForOwner($ownerEmail){
		$dbpdo = new DBPDO('contacto');
		$dbpdo->modeDEV = false;
		$contactosComoArrays = $dbpdo->select(array('userPropietarioEmail'=> $ownerEmail));
		$contactosComoObjetos = array();
		foreach ($contactosComoArrays as $contactoComoArray) {
			$contactoComoObjeto = new Contacto(
				$contactoComoArray['id'],
				$contactoComoArray['nombre'],
				$contactoComoArray['apellido'],
				$contactoComoArray['telefono'],
				$contactoComoArray['email'],
				$contactoComoArray['direccion'],
				$contactoComoArray['categoria'],
				$contactoComoArray['fechaAlta'],
				$contactoComoArray['userPropietarioEmail']
			);
			array_push($contactosComoObjetos, $contactoComoObjeto);
		}
		return $contactosComoObjetos;
	}

	
	private function __construct($id, $nombre, $apellido, $telefono, $email, $direccion, $categoria, $fechaAlta, $userPropietarioEmail){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->telefono = $telefono;
		$this->email = $email;
		$this->direccion = $direccion;
		$this->categoria = $categoria;
		$this->fechaAlta = $fechaAlta;
		$this->userPropietarioEmail = $userPropietarioEmail;
	}

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}
	
	public function getApellido(){
		return $this->apellido;
	}
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	public function getCategoria(){
		return $this->categoria;
	}
	
	public function getFechaAlta(){
		return $this->fechaAlta;
	}
	
	public function getUserPropietarioEmail(){
		return $this->userPropietarioEmail;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}



}




?>