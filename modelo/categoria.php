<?php 

include_once 'dbpdo.php';

class Categoria{
	
	private $id;
	private $nombre;

	public static function all(){
		$dbpdo = new DBPDO('categoria');
		$dbpdo->modeDEV = false;

		$categoriasComoArrays = $dbpdo->all(1000);
		$categoriasComoObjetos = array();
		foreach ($categoriasComoArrays as $categoriaComoArray) {
			$c = new Categoria(
				$categoriaComoArray['id'],
				$categoriaComoArray['nombre']
			);
			array_push($categoriasComoObjetos, $c);
		}
		return $categoriasComoObjetos;
	}

	private function __construct($id, $nombre){
		# code...
	}

	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
	}
}
 ?>