<?php 
	
	include("../datos/conex.php");

	$datos = $_POST["datos"];
	$arr = json_decode($datos, true);
	$iddd = $arr['idlibro'];
	$autor = $arr['autor'];
	$nombre = $arr['nombre'];
	$ano = $arr['ano'];
	$genero = $arr['genero'];
	$editor = $arr['editorial'];
	
	$query=mysqli_query($db,"UPDATE libro SET autor = '$autor', nombrel = '$nombre' , genero = '$genero', ano = '$ano' , editorial = '$editor' WHERE libro.idlibro = '$iddd'");
	
 if(!$query)
		{
			echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Ah ocurrido un error editando el libro. Nro. Error: <b>".mysqli_errno($db)." campo desconido</b></div>";
		}
		else
		{
				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>×</button> Libro ".$nombre." editado</div>";
		}
 ?>