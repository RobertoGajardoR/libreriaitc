<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$nombre = $arr['nombre'];
	$app = $arr['apellidop'];
	$apm = $arr['apellidom'];
	$tlf = $arr['telefono'];
	$mail = $arr['mail'];

	
	$query=mysqli_query($db, "INSERT INTO socio(nombres, apellidos, apellidoss, telefono, correo) VALUES ('$nombre', '$app', '$apm','$tlf','$mail')");

	if(!$query)
	{
		echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando al socio. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
	}
	else
	{
		echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Socio ".$nombre." ".$app." agregado</div>";
	}


	


 ?>