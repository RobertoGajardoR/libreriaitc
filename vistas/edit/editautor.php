   <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <div class="col-xs-12" id="respuesta2"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar autor</h4>
        </div>
        <form id="form2" action="">
        <div class="modal-body">
            <fieldset>
             <?php
              include("../../datos/conex.php");
              $datos = $_POST["datos"];
              $arr = json_decode($datos, true);
              $ideditar = $arr['idautor'];

                  $query =  mysqli_query($db, "SELECT * FROM autor where idautor = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                 
                
              <div class="form-group">
              <label for="idautor">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idautor" value="<?php echo $datoe['idautor'];?>" required maxlength="25" class="form-control" >
              </div>  
              <div class="form-group">
              <label for="nombrea">Nombre</label>
              <br>
              <input type="text" name="nombrea" onkeypress="return validar(event)" value="<?php echo $datoe['nombrea'];?>"  required maxlength="25"  class="form-control" >
              </div>   
              <div class="form-group">
              <label for="apellidoa">Primer apellido</label>
              <br>
              <input name="apellidoa" onkeypress="return validar(event)" required maxlength="25" value="<?php echo $datoe['apellidoa'];?>"  class="form-control" type="text">
              </div>  
               <div class="form-group">   
              <label for="apellidosa">Segundo apellido</label>
              <br>
              <input name="apellidosa" onkeypress="return validar(event)" required maxlength="25" value="<?php echo $datoe['apellidosa'];?>"  class="form-control" type="text">
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
          url: "../controlador/editautor.php",
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
  