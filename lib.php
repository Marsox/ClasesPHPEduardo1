<?php

//error_reporting(0);

session_start();



function errorInit(){
	if (!isset($_SESSION['error_array_name'])) {
		$_SESSION['error_array_name'] = array();
	}
}

function pushError($nombre, $error){
	$_SESSION['error_array_name'][$nombre] = $error;
}

function mostrarErrores(){
	foreach ($_SESSION['error_array_name'] as $nombre => $error) {
		echo $nombre . ": " . $error . "<br>";
	}
	unset($_SESSION['error_array_name']);
}

function hayErrores(){
	return !empty($_SESSION['error_array_name']);
}