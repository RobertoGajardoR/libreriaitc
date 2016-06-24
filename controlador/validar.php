
<?php
session_start();
	include("../datos/conex.php");

	
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];




	$sql2=mysqli_query($db,"SELECT * FROM login WHERE user='$user'");
	if($f2=mysqli_fetch_array($sql2)){
		if($pass==$f2['pasadmin'] && $f2['password'] == '' ){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}


	$sql=mysqli_query($db,"SELECT * FROM login WHERE user='$user'");
	if($f=mysqli_fetch_array($sql)){
		if($pass==$f['password'] && $f2['pasadmin'] == ''){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			echo '<script>alert("Bienvenido '.$_SESSION['user'].' ")</script> ';
			echo "<script>location.href='../libreria.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='../index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='../index.php'</script>";	

	}

?>