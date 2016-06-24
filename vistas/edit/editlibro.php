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
              $ideditar = $arr['idlibro'];

                  $query =  mysqli_query($db, "SELECT * FROM libro where idlibro = '$ideditar'");
                  $datoe=mysqli_fetch_array($query, MYSQLI_ASSOC);
                 ?>
                 
               <div class="form-group">
              <label for="idlibro">ID</label>
              <br>
              <input type="text" readonly="readonly"  name="idlibro" value="<?php echo $datoe['idlibro'];?>" required maxlength="25" class="form-control" >
              </div>  
              <div class="form-group">
               <label for="autor">Autor</label>
               <select class="form-control" name="autor" id="autor">
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM autor ORDER BY nombrea ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  
                  if ($dato['idautor'] == $datoe['idautor']) {
                    echo "<option value='".$dato['idautor']."' selected >".$dato['nombrea']." ".$dato['apellidoa']." ".$dato['apellidosa']." </option>";
                  }else{
                    echo "<option value='".$dato['idautor']."'>".$dato['nombrea']." ".$dato['apellidoa']." ".$dato['apellidosa']." </option>";  
                  }
                  
                }
                 ?>
              </select>
               </div>
            <div class="form-group">
              <label for="nombre">Nombre libro</label>
              <br>
              <input name="nombre" value="<?php echo $datoe['nombrel'];?>" required maxlength="50" class="form-control" type="text">
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
              <label for="genero">Genero</label>
              <br>
              <select class="form-control" name="genero" >
              <?php 
                 $query =  mysqli_query($db, "SELECT * FROM genero ORDER BY genero ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  if ($dato['idgenero']==$datoe['idgenero']) {
                    echo "<option value='".$dato['idgenero']."' selected >".$dato['genero']."</option>";

                  }else{
                    echo "<option value='".$dato['idgenero']."'>".$dato['genero']."</option>";
  
                  }
                  }
                 ?>
                
              </select>
              </div> 


               <div class="form-group">   
              <label for="editorial">Editorial</label>
              <br>
              <select class="form-control" name="editorial" >
                <?php 
                 $query1 =  mysqli_query($db, "SELECT * FROM editorial ORDER BY ideditorial ASC");

                while ($dato=mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                  if ($dato['ideditorial']==$datoe['ideditorial']) {
                   echo "<option value='".$dato['ideditorial']."' selected >".$dato['nombree']."</option>";
                  }else{

                   echo "<option value='".$dato['ideditorial']."'>".$dato['nombree']."</option>";
                  }
                }
                 ?>
                
              </select>
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
          url: "../controlador/editlibro.php",
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
  