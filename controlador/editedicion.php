<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$idedicion = $arr['idedicion'];
	$libro = $arr['libro'];
	$edit = $arr['editorial'];
	$ano = $arr['ano'];
	$cant = $arr['cantidad'];

	$query=mysqli_query($db,"UPDATE edicion SET idlibro = '$libro', ideditorial = '$edit', ano = '$ano', cantidad = '$cant' WHERE edicion.idedicion = '$idedicion'");
	
if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error editando la edicion. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Edicion ".$idedicion." editado</div>";
		}

 ?>