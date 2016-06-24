<?php 

    include("../../datos/conex.php");

 ?>
<div class="table-responsive">          
          <table id="tablasocio" class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido M</th>
                <th>Apellido P</th>
                <th>telefono</th>
                <th>Correo</th>
                <th class="acciones">Acciones</th>
              </tr>
            </thead>
            <tbody>
              
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM socio ORDER BY idsocio ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  
                  ///echo "<option value='".$dato['nombrea']."'>".$dato['genero']."</option>";
                  echo "<tr><td>".$dato['idsocio']."</td>
                  <td>".$dato['nombres']."</td>
                  <td>".$dato['apellidos']."</td>
                  <td>".$dato['apellidoss']."</td>
                  <td>".$dato['telefono']."</td>
                  <td>".$dato['correo']."</td>
                  <td>
                   <div id='acciones' class='container'>
                     
                   
                   <form class='rowbaja col-xs-6' id='forme".$dato['idsocio']."' action=''>
                   <input type='text' style='display:none;' name='idsocio' value='".$dato['idsocio']."'  />
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
                              $('#forme".$dato['idsocio']."').submit(function() {
                                var datos = (JSON.stringify($('#forme".$dato['idsocio']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: '../controlador/elimsocio.php',
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
                   <form id='forms".$dato['idsocio']."'  action='' class='rowedit col-xs-6'>
                     <input type='text' style='display:none;' name='idsocio' value='".$dato['idsocio']."'  />
                     <button type='submit' data-toggle='modal' data-target='#myModal2' value='".$dato['idsocio']."' class='btn btn-success btn-xs'>Editar</button>
                       
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
                              $('#forms".$dato['idsocio']."').submit(function() {
                                var datos = (JSON.stringify($('#forms".$dato['idsocio']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: 'edit/editsocio.php',
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
    $('#tablasocio').DataTable();
} );
</script>