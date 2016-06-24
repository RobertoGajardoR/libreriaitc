    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <div class="col-xs-12" id="respuesta2"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar edicion</h4>
        </div>
        <form id="form2" action="">
        <div class="modal-body">
            <?php
              include("../../datos/conex.php");
              $datos = $_POST["datos"];
              $arr = json_decode($datos, true);
              $ideditar = $arr['idedicion'];

                  $query =  mysqli_query($db, "SELECT * FROM edicion where idedicion = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                 
            <fieldset>
              <div class="form-group">
              <label for="idedicion">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idedicion" value="<?php echo $datoe['idedicion'];?>" required maxlength="25" class="form-control" >
              </div>
             
               <div class="form-group">
              <label for="ano">A&ntilde;o</label>
              <select class="form-control"  name="ano" id="ano">
                <?php 
                for ($i=1900; $i<=2016; $i++) {
                      if ($i==$datoe['ano']) {
                        echo "<option value='$i' selected >$i</option>";
                      }else{

                       echo "<option value='$i'>$i</option>";
                      }
                    } 
                 ?>
              </select>
              </div>  
              <div class="form-group">   
              <label for="genero">Edicion</label>
              <br>
              <select class="form-control" name="libro" id="libro">
              <?php 
                 $query =  mysqli_query($db, "SELECT idlibro, nombrel FROM libro ORDER BY idlibro ASC");

                if (!$query) {
                  echo "<option value=''>Ocurrio un error en la consulta</option>";
                }
                else
                {
                  while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  if ($dato['idlibro']==$datoe['idlibro']) {
                    echo "<option value='".$dato['idlibro']."' selected >".$dato['nombrel']."</option>";

                  }else{
                    echo "<option value='".$dato['idlibro']."'>".$dato['nombrel']."</option>";
  
                  }
                                  }
                }
                 ?>
                
              </select>
              </div> 
              <div class="form-group">   
              <label for="editorial">Editorial</label>
              <br>
              <select class="form-control" name="editorial" id="editorial">
              <?php 
                 $query =  mysqli_query($db, "SELECT * FROM editorial ORDER BY ideditorial ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  if ($dato['ideditorial']==$datoe['ideditorial']) {
                    echo "<option value='".$dato['ideditorial']."' selected >".$dato['nombree']."</option>";
                  }else{
                    echo "<option value='".$dato['ideditorial']."'>".$dato['nombree']."</option>";  
                  }
                  
                }
                 ?>
                
              </select>
              </div>  
              <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <br>
                <input class="form-control" type="number" value="<?php echo $datoe['cantidad'];?>" name="cantidad" id="cantidad">
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
          url: "../controlador/editedicion.php",
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
  