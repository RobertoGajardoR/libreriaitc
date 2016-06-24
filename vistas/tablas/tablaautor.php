<?php 

    include("../../datos/conex.php");

 ?>
<div class="table-responsive">          
          <table id="tablaautor" class="table table-striped" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido M</th>
                <th>Apellido P</th>
                <th class="acciones">Acciones</th>
              </tr>
            </thead>
            <tbody>
              
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM autor ORDER BY idautor ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  
                  ///echo "<option value='".$dato['nombrea']."'>".$dato['genero']."</option>";
                  echo "<tr><td>".$dato['idautor']."</td>
                  <td>".$dato['nombrea']."</td>
                  <td>".$dato['apellidoa']."</td>
                  <td>".$dato['apellidosa']."</td>
                 
                  
                   <td>
                   <div id='acciones' class='container'>
                     
                   
                   <form class='rowbaja col-xs-6' id='forme".$dato['idautor']."' action=''>
                   <input type='text' style='display:none;' name='idautor' value='".$dato['idautor']."'  />
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
                              $('#forme".$dato['idautor']."').submit(function() {
                                var datos = (JSON.stringify($('#forme".$dato['idautor']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: '../controlador/elimautor.php',
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
                   <form id='forms".$dato['idautor']."'  action='' class='rowedit col-xs-6'>
                     <input type='text' style='display:none;' name='idautor' value='".$dato['idautor']."'  />
                     <button type='submit' data-toggle='modal' data-target='#myModal2' value='".$dato['idautor']."' class='btn btn-success btn-xs'>Editar</button>
                       
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
                              $('#forms".$dato['idautor']."').submit(function() {
                                var datos = (JSON.stringify($('#forms".$dato['idautor']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: 'edit/editautor.php',
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
    $('#tablaautor').DataTable();
} );
</script>
