<?php 

	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$libro = $arr['libro'];
	$edit = $arr['editorial'];
	$ano = $arr['ano'];
	$cant = $arr['cantidad'];
	
	if ($libro==0 || $edit==0 || $ano==0 || $cant==0) {
		echo "<div class='alert alert-warning'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> No registrado verifique opciones seleccionadas</div>";
	}else{
		$query=mysqli_query($db,"INSERT INTO edicion (ano, idlibro, ideditorial, cantidad) VALUES ('$ano','$libro','$edit','$cant')");
	
		if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando la eidcion. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
			echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Edicion agregado</div>";
		}

	}

 ?>