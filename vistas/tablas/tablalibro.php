<?php 

    include("../../datos/conex.php");

 ?>
<div class="table-responsive">          
          <table id="tablalibro" class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Nombre L</th>
                <th>Genero</th>
                <th>año</th>
                <th>Editorial</th>
                <th class="acciones">Acciones</th>
              </tr>
            </thead>
            <tbody>
              
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM libro ORDER BY idlibro ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  
                  ///echo "<option value='".$dato['nombrea']."'>".$dato['genero']."</option>";
                  echo "<tr><td>".$dato['idlibro']."</td>
                  <td>".$dato['idautor']."</td>
                  <td>".$dato['nombrel']."</td>
                  <td>".$dato['idgenero']."</td>
                 
                  <td>".$dato['ano']."</td>
                  <td>".$dato['ideditorial']."</td>
                   <td>
                   <div id='acciones' class='container'>
                     
                   
                   <form class='rowbaja col-xs-6' id='forme".$dato['idlibro']."' action=''>
                   <input type='text' style='display:none;' name='idlibro' value='".$dato['idlibro']."'  />
                   <button type='submit' value='Dar baja' class='btn btn-danger btn-xs'>Dar baja</button>
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
                              $('#forme".$dato['idlibro']."').submit(function() {
                                var datos = (JSON.stringify($('#forme".$dato['idlibro']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: '../controlador/elimlibro.php',
                                data: {datos:datos},
                                success: function(data){
                                  recargartabla();
                                  $('#message').html(data);
                                }

                              })

                                $('#sr1').text(datos);
                                return false;
                              });
                            });
                          });
                        </script>

                   </form>
                   <form id='forms".$dato['idlibro']."'  action='' class='rowedit col-xs-6'>
                     <input type='text' style='display:none;' name='idlibro' value='".$dato['idlibro']."'  />
                     <button type='submit' data-toggle='modal' data-target='#myModal2' value='".$dato['idlibro']."' class='btn btn-success btn-xs'>Editar</button>
                       
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
                              $('#forms".$dato['idlibro']."').submit(function() {
                                var datos = (JSON.stringify($('#forms".$dato['idlibro']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: 'edit/editlibro.php',
                                data: {datos:datos},
                                success: function(data){
                
                                  $('#myModal2').html(data);
                                }

                              })

                                $('#sr1').text(datos);
                                return false;
                              });
                            });
                          });
                        </script>

                  </form>
                  </div>
                  </td></tr>";

                
                }
                ?>
              
            </tbody>
          </table>
</div>
<script>
  $(document).ready(function() {
    $('#tablalibro').DataTable();
} );
</script>