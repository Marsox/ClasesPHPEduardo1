<?php 
include_once '../lib.php';

session_destroy();


session_start();
echo json_encode($_SESSION);
 ?>