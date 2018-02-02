<?php 
include_once '../lib.php';
include_once '../modelo/usuario.php';
session_start();
echo json_encode($_SESSION);
 ?>