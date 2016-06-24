
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <div class="col-xs-12" id="respuesta2"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar socio</h4>
        </div>
        <form id="form2" action="">
        <div class="modal-body">
            <fieldset>
             <?php
              include("../../datos/conex.php");
              $datos = $_POST["datos"];
              $arr = json_decode($datos, true);
              $ideditar = $arr['idsocio'];

                  $query =  mysqli_query($db, "SELECT * FROM socio where idsocio = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                 
                
              <div class="form-group">
              <label for="idsocio">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idsocio" value="<?php echo $datoe['idsocio'];?>" required maxlength="25" class="form-control" >
              </div>  
              <div class="form-group">
              <label for="nombre">Nombre</label>
              <br>
              <input type="text" name="nombre" onkeypress="return validar(event)" value="<?php echo $datoe['nombres'];?>"  required maxlength="25"  class="form-control" >
              </div>   
              <div class="form-group">
              <label for="apellidop">Primer apellido</label>
              <br>
              <input name="apellidop" onkeypress="return validar(event)" required maxlength="25" value="<?php echo $datoe['apellidos'];?>"  class="form-control" type="text">
              </div>  
               <div class="form-group">   
              <label for="apellidom">Segundo apellido</label>
              <br>
              <input name="apellidom" onkeypress="return validar(event)"  required maxlength="25" value="<?php echo $datoe['apellidoss'];?>"  class="form-control" type="text">
              </div>
              <div class="form-group">   
              <label for="telefono">Telefono</label>
              <br>
              <input name="telefono"  required maxlength="14" value="<?php echo $datoe['telefono'];?>"  class="form-control" type="text">
              </div> 
              <div class="form-group">   
              <label for="mail">E-mail</label>
              <br>
              <input name="mail"  required maxlength="50" value="<?php echo $datoe['correo'];?>"  class="form-control" type="email">
              </div>   
            </fieldset>
            
          
        </div>
        <div class="modal-footer">
              <button type="button pull-left" class="btn btn-default" data-dismiss="modal" ">Close</button>
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
          url: "../controlador/editsocio.php",
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
  