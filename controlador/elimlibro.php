<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$idlibro = $arr['idlibro'];
	

	
	$query=mysqli_query($db, "DELETE FROM libro WHERE libro.idlibro = '$idlibro'");
	if(!$query)
			{
				echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error eliminando el libro. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
			}
			else
			{
					echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Libro ".$idlibro." eliminado</div>";
			}



 ?>