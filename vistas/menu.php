<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
?>
<nav class='navbar navbar-inverse navbar-fixed-top'  >
      
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='../libreria.php'>
          <img id='imghe' class='img-rounded' src='../medios/logo.jpg' alt=''></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav'>
            <li class='dropdown'>
              <a href='addsocio.php'  role='button' aria-haspopup='true' aria-expanded='false'>Socios</a>
            </li>
            <li class='dropdown'>
              <a href='addautor.php'  role='button' aria-haspopup='true' aria-expanded='false'>Autor</a>
            </li>
            <li class='dropdown'>
              <a href='addlibro.php'  role='button' aria-haspopup='true' aria-expanded='false'>Libros</a>
            </li>
            <li class='dropdown'>
              <a href='addprestamo.php'  role='button' aria-haspopup='true' aria-expanded='false'>Prestamos</a>
            </li>
            <li class='dropdown'>
              <a href='addeditorial.php'  role='button' aria-haspopup='true' aria-expanded='false'>Editorial</a>
            </li>
            <li class='dropdown'>
              <a href='addgenero.php'  role='button' aria-haspopup='true' aria-expanded='false'>Genero</a>
            </li>
            <li class='dropdown'>
              <a href='addedicion.php' role='button' aria-haspopup='true' aria-expanded='false'>Edicion</a>
            </li>
          </ul>
          <ul class='login nav navbar-nav navbar-right'>
            <li><label><a>Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href='../controlador/desconectar.php'> Cerrar Cesión </a></label></li>
          </ul>

        </div><!-- /.navbar-collapse -->
     
    </nav>