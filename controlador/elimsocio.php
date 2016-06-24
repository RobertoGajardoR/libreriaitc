<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$idsocio = $arr['idsocio'];
	

	
	$query=mysqli_query($db, "DELETE FROM socio WHERE socio.idsocio = '$idsocio'");
	if(!$query)
			{
				echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error eliminando al socio. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
			}
			else
			{
					echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Socio ".$idsocio." eliminado</div>";
			}

 ?>