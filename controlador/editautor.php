<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$iddd = $arr['idautor'];
	$nombre = $arr['nombrea'];
	$app = $arr['apellidoa'];
	$apm = $arr['apellidosa'];
	
	$query=mysqli_query($db,"UPDATE autor SET nombrea = '$nombre', apellidoa = '$app', apellidosa = '$apm' WHERE autor.idautor = '$iddd'");
	if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error editando la editorial. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Actor ".$nombre." ".$app." editado</div>";
		}
 ?>