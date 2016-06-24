<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$nombre = $arr['nombre'];
	$dir = $arr['dir'];

	
	$query=mysqli_query($db, "INSERT INTO editorial (nombree, direccion) VALUES ('$nombre', '$dir')");
	if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando al editorial. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Editorial ".$nombre." agregado</div>";
		}








 ?>