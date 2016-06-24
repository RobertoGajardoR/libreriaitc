<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$idprestamo = $arr['idprestamo'];
	

	
	$query=mysqli_query($db, "DELETE FROM prestamo WHERE prestamo.idprestamo = '$idprestamo'");
	if(!$query)
			{
				echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error eliminando el prestamo. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
			}
			else
			{
					echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Prestamo ".$idprestamo." eliminado/div>";
			}
 ?>