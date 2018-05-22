<?php
	function conexion()
	{
		//$idCone = mysqli_connect("mysql.hostinger.com.ar","u465856090_sebas","Sebastiansanchez9902") or die("Error conectando al servidor");
		//$db = "u465856090_muebl";

		$idCone = mysqli_connect("localhost","root","") or die("Error conectando al servidor");
		$db = "muebles";
		mysqli_select_db($idCone,$db) or die("Error seleccionando la base de datos");
		return $idCone;
	}

?>