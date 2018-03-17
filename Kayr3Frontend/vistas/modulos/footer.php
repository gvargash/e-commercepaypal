<!-- end contactanos -->
         <footer class="page-footer barraSuperior ocultar">
          <div class="container">
            <div class="row">
               <div class="col s12 m4">
                 <h6 class="white-text">ACERCA DE KAYRE</h6>
                <ul>
                  <li><a class="grey-text text-lighten-5" href="Nosotros"> <i class="fa fa-users" aria-hidden="true"></i> Nosotros</a></li>
                  <li><a class="grey-text text-lighten-3" href="Contactanos"><i class="fa fa-phone" aria-hidden="true"></i> Contactanos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-info-circle" aria-hidden="true"></i> Ayuda</a></li>
                  <li><a class="grey-text text-lighten-3" href="Contactanos"><i class="fa fa-map-marker" aria-hidden="Contactanos"></i> Ubicacion</a></li>
                </ul>
              </div>
              
              <div class="col  s12 m4 ">
                <h6 class="white-text">REDES SOCIALES</h6>
                  <ul >  

                      <?php

                      $social=ControladorPlantilla::ctrEstiloPlantilla();
                      $jsonRedesSociales=json_decode($social["redesSociales"],true);  

                      foreach ($jsonRedesSociales as $key => $value) {
                          if($value["activo"] != 0){

                            echo '<li>
                                <a href="'.$value["url"].'" target="_blank">
                                  <i class="fa '.$value["red"].' '.$value["estilo"].' redSocial"></i>
                                </a>
                              </li>';

                          }
                      }
                      ?>
                  
                  </ul>
               
              </div>

              <div class="col s12 m4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d124858.91111940691!2d-77.1104486!3d-12.0544606!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x9105c8c5c6296a19%3A0x5767bc7e338275d4!2skayr3!3m2!1d-12.0544693!2d-77.040408!5e0!3m2!1ses-419!2spe!4v1520102425775" width="100%" height="100%" frameborder="3" style="border-color: #cccccc; border-radius: 4px;" allowfullscreen></iframe>
              </div>
             
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Todos los derechos reservados
            <a class="grey-text text-lighten-4 right" href="#!">Kayr3 S.A.C</a>
            </div>
          </div>
        </footer>