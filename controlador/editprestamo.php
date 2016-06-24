<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$iddd = $arr['idprestamo'];
	$fecha = $arr['fecha'];
	$idlibro = $arr['idlibro'];
	$idsocio = $arr['idsocio'];
	
	$query=mysqli_query($db,"UPDATE prestamo SET fecha = '$fecha', idlibro = '$idlibro', idsocio = '$idsocio' WHERE prestamo.idprestamo = '$iddd'");
	
if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error editando el prestamo. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Prestamo ".$iddd." editado</div>";
		}
 ?>