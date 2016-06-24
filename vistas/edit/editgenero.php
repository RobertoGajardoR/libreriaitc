
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
              $ideditar = $arr['idgenero'];

                  $query =  mysqli_query($db, "SELECT * FROM genero where idgenero = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                <div class="form-group">
              <label for="idgenero">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idgenero" value="<?php echo $datoe['idgenero'];?>" required maxlength="25" class="form-control" >
              </div>  
              <div class="form-group">
              <label for="genero">Genero</label>
              <br>
              <input name="genero" id="genero" value="<?php echo $datoe['genero'];?>" required maxlength="25" class="form-control" type="text">
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
          url: "../controlador/editgenero.php",
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
  