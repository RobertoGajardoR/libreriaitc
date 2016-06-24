
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <div class="col-xs-12" id="respuesta2"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Prestamo</h4>
        </div>
        <form id="form2" action="">
        <div class="modal-body">

            <fieldset>
              <?php
              include("../../datos/conex.php");
              $datos = $_POST["datos"];
              $arr = json_decode($datos, true);
              $ideditar = $arr['idprestamo'];

                  $query =  mysqli_query($db, "SELECT * FROM prestamo where idprestamo = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                 
              <div class="form-group">
              <label for="idprestamo">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idprestamo" value="<?php echo $datoe['idprestamo'];?>" required maxlength="25" class="form-control" >
              </div>  
              <div class="form-group">
              <label for="fecha">fecha de entrega</label>
              <br>
              <input name="fecha" value="<?php echo $datoe['fecha'];?>"  id="fecha" required maxlength="25" class="form-control" type="date">
              </div>   
              <div class="form-group">

                 <div class="form-group">
               <label for="idlibro">Libro</label>
               <select class="form-control" name="idlibro" id="libro">
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM libro ORDER BY nombrel ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  if ($dato['idlibro']==$datoe['idlibro']) {
                    echo "<option value='".$dato['idlibro']."' selected >".$dato['nombrel']."</option>";
                  }else{
                    echo "<option value='".$dato['idlibro']."'>".$dato['nombrel']."</option>";  
                  }
                  
                }
                 ?>
              </select>
               </div>

                <div class="form-group">
               <label for="idsocio">Socio</label>
               <select class="form-control" name="idsocio" id="socio">
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM socio ORDER BY nombres ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  if ($dato['idsocio']==$datoe['idsocio']) {
                    echo "<option value='".$dato['idsocio']."' selected >".$dato['nombres']." ".$dato['apellidos']." </option>";
                  }else{
                    echo "<option value='".$dato['idsocio']."'>".$dato['nombres']." ".$dato['apellidos']."</option>";  
                  }
                  
                }
                 ?>
              </select>
               </div>
  
            </fieldset>
            
          
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" ">Close</button>
              <input type="reset" class="btn btn-danger"/><button class="btn btn-primary" type="submit">Guardar cambios </button>
        </div>
        </form>
      </div>
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
        $('#form2').submit(function() {
          var datos = (JSON.stringify($('#form2').serializeObject()));

          $.ajax({

          type: "POST",
          url: "../controlador/editprestamo.php",
          data: {datos:datos},
          success: function(data){
             recargartabla();
            $("#respuesta2").html(data);
          }

        })

          $("#sr1").text(datos);
          return false;
        });
      });
    });
  </script>
    </div>
  