<?php 

    include("../../datos/conex.php");

 ?>
<div class="table-responsive">          
          <table id="tablaprestamo" class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Fecha entrega</th>
                <th>ID libro</th>
                <th>ID socio</th>
                <th class="acciones">Acciones</th>
              </tr>
            </thead>
            <tbody>
              
                <?php 
                 $query =  mysqli_query($db, "SELECT * FROM prestamo ORDER BY idprestamo ASC");

                while ($dato=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  
                  ///echo "<option value='".$dato['nombrea']."'>".$dato['genero']."</option>";
                  echo "<tr><td>".$dato['idprestamo']."</td>
                  <td>".$dato['fecha']."</td>
                  <td>".$dato['idlibro']."</td>
                  <td>".$dato['idsocio']."</td>
                  
                  
                   <td>
                   <div id='acciones' class='container'>
                     
                   
                   <form class='rowbaja col-xs-6' id='forme".$dato['idprestamo']."' action=''>
                   <input type='text' style='display:none;' name='idprestamo' value='".$dato['idprestamo']."'  />
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
                              $('#forme".$dato['idprestamo']."').submit(function() {
                                var datos = (JSON.stringify($('#forme".$dato['idprestamo']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: '../controlador/elimprestamo.php',
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
                   <form id='forms".$dato['idprestamo']."'  action='' class='rowedit col-xs-6'>
                     <input type='text' style='display:none;' name='idprestamo' value='".$dato['idprestamo']."'  />
                     <button type='submit' data-toggle='modal' data-target='#myModal2' value='".$dato['idprestamo']."' class='btn btn-success btn-xs'>Editar</button>
                       
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
                              $('#forms".$dato['idprestamo']."').submit(function() {
                                var datos = (JSON.stringify($('#forms".$dato['idprestamo']."').serializeObject()));

                                $.ajax({

                                type: 'POST',
                                url: 'edit/editprestamo.php',
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
    $('#tablaprestamo').DataTable();
} );
</script>