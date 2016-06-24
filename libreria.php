<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
  header("Location:../index.php");
}
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestamo de libros</title>
  <link rel="shortcut icon" type="image/png" href="favicon.png" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/css.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/05e3561c64.js"></script>

  <link rel="stylesheet" type="text/css" href="css/css.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Libreria</a> -->
          <a class='navbar-brand' href='index.php'>
          <img id='imghe' class='img-rounded' src='medios/logo.jpg' alt=''></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="vistas/addsocio.php"  role="button" aria-haspopup="true" aria-expanded="false">Socios</a>
            </li>
            <li class="dropdown">
              <a href="vistas/addautor.php" role="button" aria-haspopup="true" aria-expanded="false">Autor</a>
            </li>
            <li class="dropdown">
              <a href="vistas/addsocio.php" role="button" aria-haspopup="true" aria-expanded="false">Libros</a>
            </li>
            <li class="dropdown">
              <a href="vistas/addprestamo.php"  role="button" aria-haspopup="true" aria-expanded="false">Prestamos</a>
            </li>
          </ul>
          <ul class="login nav navbar-nav navbar-right">
            <li><label><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="controlador/desconectar.php"> Cerrar Cesión </a></label></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
   

    <div class="main container" role="main">

      <div class="row">
        <div class="carusel col-xs-12">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

              <div class="item active">
                <img src="medios/imglibreria1.jpg" alt="Chania">
                <div class="carousel-caption">
                  <blockquote>
                  <p class="bg-success">La lectura es a la mente lo que el ejercicio al cuerpo.</p>
                  <footer>Joseph Addison</footer>
                  </blockquote>
                </div>
              </div>

              <div class="item">
                <img src="medios/imglibreria4.jpg" alt="Chania" >
                <div class="carousel-caption">
                  <blockquote>
                  <p class="bg-success">Quien dice que leer es aburrido es por que no ha encontrado el libro indicado.</p>
                  <footer>Cita</footer>
                  </blockquote>
                </div>
              </div>
            
              <div class="item">
                <img src="medios/imglibreria5.jpg" alt="Flower">
                <div class="carousel-caption">
                  <blockquote>
                  <p class="bg-success">Leer es como andar en bicicleta entre más peda<em>leas</em> más lejos puedes llegar.</p>
                  <footer>Wilbert altonar</footer>
                  </blockquote>
                </div>
              </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
       </div>
      
         <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col lg-6">
          <img class="imgppal img-thumbnail" src="medios/ernestosabato.jpg" alt="">
          <blockquote >
                  <p>Leer les dará una mirada más abierta sobre los hombres y sobre el mundo, y los ayudará a rechazar la realidad como un hecho irrevocable. Esa negación, esa sagrada rebeldía, es la grieta que abrimos sobre la opacidad del mundo. A través de ella puede filtrarse una novedad que aliente nuestro compromiso.</p>
                  <footer>Ernesto Sabato</footer>
          </blockquote>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col lg-6">
          <img class="imgppal img-thumbnail"  src="medios/PabloNeruda.png" alt="">
         <blockquote >
                  <p>Muere lentamente quien no viaja, quien no lee, quien no oye música, quien no encuentra gracia en sí mismo.</p>
                  <footer>Pablo Neruda</footer>
          </blockquote>
        </div>
      </div>
       </div>
      


  <footer class="footer-distributed">

      <div class="footer-right">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>

      </div>

      <div class="footer-left">

        <p class="footer-links">
          <a href="index.php">inicio</a>
          ·
          <a href="#">Soporte</a>
          ·
          <a href="#">Información</a>
          ·
          <a href="#">Contacto</a>
        </p>

        <p>Company SobreMargenes &copy; 2016</p><br>
        <p><em>librería es un producto de tu imaginación.</em></p>
      </div>

    </footer>
  <script>
    $().ready(function () {
      $("#info").click(function()
      {
        alert("Revise el archivo 'Clase' en la carpeta controlador....")
      });
    });
  </script>
</body>
</html>