<!-- END MODAL INICIAR SESSION -->

                <!--=====================================
                =            MODAL OLVIDE CONTRASEÑA          =
                ======================================-->
                  <!-- Modal Structure -->
             <div class="container">
               
                      <form method="POST">
                        <label>Escribe el correo electronico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>
                       

                              <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">email</i>
                                <input  type="email" name="passEmail" id="passEmail" class="validate" required>
                                <label for="email" >Correo</label>
                              </div>

                        
                               <?php

                                    $password = new ControladorUsuarios();
                                    $password -> ctrOlvidoPassword();

                                ?>
                            <button type="submit" class="btn waves-effect pink darken-4">
                                ENVIAR
                            </button>
                      </form>
             </div>
               