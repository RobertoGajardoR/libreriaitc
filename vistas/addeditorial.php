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
  <link rel="shortcut icon" type="image/png" href="../favicon.png" />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/css.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.css">
  <script src="https://use.fontawesome.com/05e3561c64.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
 <script>
 $(document).ready(function() {
  $("#menu").load("menu.php");
   $("#tabla").load("tablas/tablaeditorial.php");
   $("#footer").load("footer.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('response.php?randval='+ Math.random());
   }, 9000);
   $.ajaxSetup({ cache: false });
});
 function recargartabla(){
      $("#tabla").load("tablas/tablaeditorial.php"); 
 };
</script>
</head>
<body>
<div id="menu"></div>   
    <div class="main container" role="main">
    
    <?php include "carrusel.php"; ?>
    <div class="tgestion container">
    <div class="col-xs-12"  id="message"></div>
    <h1 class="row col-xs-12 col-sm-6">Gestion de Editorial</h1>
    <div class="row col-xs-12 col-sm-6"><button type="button" class="registrar btn btn-primary" data-toggle="modal" data-target="#myModal1">Registrar nueva editorial</button>
    </div>
    </div>
    <div id="tabla" class="row">
      
      </div>
       <?php 

      include("citas.php");
   
     ?>
    </div>
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <div class="col-xs-12" id="respuesta"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro socio</h4>
        </div>
        <form id="form1" action="">
        <div class="modal-body">
           <fieldset>
              <div class="form-group">
              <label for="nombre">Nombre</label>
              <br>
              <input name="nombre" id="nombre" required maxlength="25" class="form-control" type="text">
              </div>   
              <div class="form-group">
              <label for="dir">Direccion</label>
              <br>
              <input name="dir" id="dir" required maxlength="50" class="form-control" type="text">
              </div>  
               
            </fieldset>
            
          
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" ">Close</button>
              <input type="reset" class="btn btn-danger"/><input class="btn btn-primary" type="submit"/>&nbsp
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
  </div>
  <footer id="footer" class="footer-distributed"></footer>
    <script>
    $().ready(function () {
      $.fn.serializeObject = function()
      {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
          if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
          } else {
            o[this.name] = this.value || '';
          }
        });
        return o;
      };

      $(function() {
        $('#form1').submit(function() {
          var datos = (JSON.stringify($('#form1').serializeObject()));

          $.ajax({

          type: "POST",
          url: "../controlador/addeditorial.php",
          data: {datos:datos},
          success: function(data){
             recargartabla();
            $("#respuesta").html(data);
          }

        })

          $("#sr1").text(datos);
          return false;
        });
      });
    });
  </script>

</body>
</html>