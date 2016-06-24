<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$autor = $arr['autor'];
	$nombre = $arr['nombre'];
	$ano = $arr['ano'];
	$gene = $arr['genero'];
	$edito = $arr['editorial'];
if ($autor==0 || $gene==0 || $ano==0 || $edito==0) {
		echo "<div class='alert alert-warning'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> No registrado verifique opciones seleccionadas</div>";	
		}else{
			$query=mysqli_query($db, "INSERT INTO libro (idautor, nombrel, idgenero, ano, ideditorial) VALUES ('$autor','$nombre', '$gene', '$ano','$edito')");

			if(!$query)
					{
						echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error guardando al editorial. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
					}
					else
					{
							echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Libro ".$nombre." agregado</div>";
					}	
		}	

 ?>