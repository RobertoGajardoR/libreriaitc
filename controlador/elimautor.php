<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$idautor = $arr['idautor'];
	

	
	$query=mysqli_query($db, "DELETE FROM autor WHERE autor.idautor = '$idautor'");
 if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error eliminando el autor. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Autor ".$idautor." eliminado</div>";
		}

 ?>