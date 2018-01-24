<?php 
include_once '../lib.php';
include_once '../modelo/dbpdo.php';

echo json_encode(new DBPDO('usuario'));

 ?>