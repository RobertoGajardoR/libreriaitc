<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$fecha = $arr['fecha'];
	$libro = $arr['idlibro'];
	$socio = $arr['idsocio'];

	if ($libro==0 || $socio==0) {
		echo "<div class='alert alert-warning'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> No registrado verifique opciones seleccionadas</div>";
	}else{
		$query=mysqli_query($db, "INSERT INTO prestamo (fecha, idlibro, idsocio) VALUES ('$fecha', '$libro', '$socio')");
		if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando al editorial. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Prestamo a socio ".$socio." agregado</div>";
		}	
	}
	
 ?>