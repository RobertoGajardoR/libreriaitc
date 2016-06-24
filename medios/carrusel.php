<?php 
echo " <div class='row'>
        <div class='col-xs-12'>
          <div id='myCarousel' class='carousel slide' data-ride='carousel'>
            <!-- Indicators -->
            <ol class='carousel-indicators'>
              <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
              <li data-target='#myCarousel' data-slide-to='1'></li>
              <li data-target='#myCarousel' data-slide-to='2'></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class='carousel-inner' role='listbox'>

              <div class='item active'>
                <img src='medios/imglibreria1.jpg' alt='Chania'>
                <div class='carousel-caption'>
                  <blockquote>
                  <p class='bg-success'>La lectura es a la mente lo que el ejercicio al cuerpo.</p>
                  <footer>Joseph Addison</footer>
                  </blockquote>
                </div>
              </div>

              <div class='item'>
                <img src='medios/imglibreria2.jpg' alt='Chania' >
                <div class='carousel-caption'>
                  <blockquote>
                  <p class='bg-success'>Quien dice que leer es aburrido es por que no ha encontrado el libro indicado.</p>
                  <footer>Cita</footer>
                  </blockquote>
                </div>
              </div>
            
              <div class='item'>
                <img src='medios/imglibreria3.jpg' alt='Flower'>
                <div class='carousel-caption'>
                  <blockquote>
                  <p class='bg-success'>Leer es como andar en bicicleta entre más peda<em>leas</em> más lejos puedes llegar.</p>
                  <footer>Wilbert altonar</footer>
                  </blockquote>
                </div>
              </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
              <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
              <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>
       </div>";
 ?>