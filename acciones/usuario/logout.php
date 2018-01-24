<?php 
include_once '../../lib.php';

unset($_SESSION['user']);

header('Location: ../../paginas/usuario/login.php');
 ?>