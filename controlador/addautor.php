<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$nombre = $arr['nombrea'];
	$app = $arr['apellidoa'];
	$apm = $arr['apellidosa'];

	
	$query=mysqli_query($db, "INSERT INTO autor (nombrea, apellidoa, apellidosa) VALUES ('$nombre', '$app', '$apm')");

	if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando al autor. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
			echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Autor ".$nombre." ".$app." agregado</div>";

		}





 ?>