    <?php 
    $url = Ruta::ctrRuta(); 
     $servidor=Ruta::ctrRutaServidor();

    /*=============================================
     INICIO DE SESSION USUARIO
    =============================================*/  
    if (isset($_SESSION["validarSession"])) {
        if ($_SESSION["validarSession"]=="ok") {
            echo  '<script>
                    localStorage.setItem("usuario","'.$_SESSION["idUsuario"].'");
                </script>';
        }
    }
    /*=============================================
    CREAR EL OBJETO DE LA API GOOGLE
    =============================================*/      
    $cliente = new Google_Client();
    $cliente->setAuthConfig('modelos/secreto_cliente.json');
    $cliente->setAccessType("offline");
    $cliente->setScopes(['profile','email']);


    /*=============================================
    RUTA PARA EL LOGIN DE GOOGLE
    =============================================*/

    $rutaGoogle = $cliente->createAuthUrl();

    /*=============================================
    RECIBIMOS LA VARIABLE GET DE GOOGLE LLAMADA CODE
    =============================================*/

    if(isset($_GET["code"])){

        $token = $cliente->authenticate($_GET["code"]);

        $_SESSION['id_token_google'] = $token;

        $cliente->setAccessToken($token);

    }

    /*=============================================
    RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
    =============================================*/
    if($cliente->getAccessToken()){

        $item = $cliente->verifyIdToken();

        $datos=array("NombreUsu"=>$item["name"],
                   "ApellidoUsu"=>"",
                   "DNI"=>"null",
                   "CorreoUsu"=>$item["email"],
                   "claveUsu"=>"null",
                   "fotoUsu"=>$item["picture"],
                   "EstadoUsu"=> 1,
                   "idTipo"=>"UKA02",
                   "verificacion"=>0,
                   "modo"=>"google",
                   "emailEncriptado"=>"null");
        $respuesta=ControladorUsuarios::ctrRegistroRedesSociales($datos);
            echo '<script>
                setTimeout(function(){

                    window.location = localStorage.getItem("rutaActual");

                },1000);

                </script>';
    }

     ?>




             
        <!--=====================================
        =   LOGO      =
        ======================================-->
            <?php 
                $social=ControladorPlantilla::ctrEstiloPlantilla();
                $jsonRedesSociales=json_decode($social["redesSociales"],true);
             ?>
    


        <!-- nav -->
        <div class="navbar-fixed ocultar">
            <nav>
                <div class="nav-wrapper barraSuperior">
                    <a href="<?php echo $url?>" class="brand-logo"><img src="<?php echo $servidor.$social["logo"]?>" class="logo-img hide-on-med-and-down" alt="" id="logo-empres" /><h4 class="right hide-on-med-and-up" alt="" width="300" height="80">Kayr3</h4></a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                           
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons left">dehaze</i>Categoria</a></li>
                             <ul id='dropdown1' class='dropdown-content'>
                            <!--=====================================
                            =            CATEGORIA            =
                            ======================================-->

                             <?php 
                             $item=null;
                             $valor=null;
                                $categorias=ControladorProductos::ctrMostrarCategorias($item,$valor);
                                    foreach ($categorias as $key => $value) {
                                       echo '<li><a href="'.$url.$value["ruta"].'">
                                                <i class="pixelCategorias material-icons right" aria-hidden="true">chevron_right</i>'
                                                .$value["NameCategoria"].'</a>
                                            </li>';
                                    }
                             ?>
                            <!--====  FIN CATEGORIA  ====-->
                        </ul> 



                        <!--=================|===================
                                 =           BUSCADOR            =
                         ======================================-->
                          <li>
                            <div class="nav-wrapper center-align">
                                    <div class="buscador input-field col s12" id="buscador">
                                        <input  type ="search" name="buscar"  placeholder="Buscar Tinta,Toner,Repuestos, Accesorios" id="inputBuscar" class="col l12">
                                        <span style="display: none;">
                                            <a href="<?php echo $url; ?>buscador/1/recientes">
                                                <button class="btn"  type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </a>
                                        </span>
                                    </div>
                            </div>
                        </li>   
                     <!--====  FIND BUSCADOR  ====-->


                        <!--=================|===================
                                    ITEM DE USUARIO       
                         ======================================-->
                        
                        <li><a href="carrito-de-compras"><i class="material-icons left">shopping_cart</i>
                            <span class="new badge colorSecundario cantidadCesta">0</span></a>
                        </li>
                        
                            <?php 
                                if (isset($_SESSION["validarSession"])) {
                                    if ($_SESSION["validarSession"]=="ok") {
                                        if ($_SESSION["modo"]=="directo") {
                                            if ($_SESSION["foto"]!="") {
                                               echo '<li>
                                               <a class="dropdown-button" href="#!" data-activates="dropdown3">
                                               <img src="'.$url.$_SESSION["foto"].'"  alt="" class="circle responsive-img img-acount-perzonalize">
                                               </a>
                                               </li>';
                                            }else{
                                                echo '<li>
                                                <a class="dropdown-button" href="#!" data-activates="dropdown3">
                                                <img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" alt="" class="circle responsive-img img-acount-perzonalize">
                                                </a>
                                                </li>';
                                            }

                                                    echo '<ul id="dropdown3" class="dropdown-content">
                                                    <li><a class="modal-trigger" href="'.$url.'perfil"><i class="fa fa-lock" aria-hidden="true"></i>
                                                        Ver Perfil</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="'.$url.'perfil"><i class="fa fa-truck" aria-hidden="true"></i>Mis pedidos</a></li>
                                                    <li><a href="'.$url.'salir"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a></li>
                                                </ul> ';
                                        }


                                        if($_SESSION["modo"]=="facebook"){
                                                echo '<li>
                                               <a class="dropdown-button" href="#!" data-activates="dropdown3">
                                               <img src="'.$_SESSION["foto"].'"  alt="" class="circle responsive-img img-acount-perzonalize">
                                               </a>
                                               </li>';

                                          echo '<ul id="dropdown3" class="dropdown-content">
                                                    <li><a class="modal-trigger" href="'.$url.'perfil"><i class="fa fa-lock" aria-hidden="true"></i>
                                                        Ver Perfil</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="'.$url.'perfil"><i class="fa fa-truck" aria-hidden="true"></i>Mis pedidos</a></li>
                                                    <li><a href="'.$url.'salir" class="salir"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a></li>
                                                </ul> ';
                                        }

                                        if($_SESSION["modo"]=="google"){
                                            echo '<li>
                                               <a class="dropdown-button" href="#!" data-activates="dropdown3">
                                               <img src="'.$_SESSION["foto"].'"  alt="" class="circle responsive-img img-acount-perzonalize">
                                               </a>
                                               </li>';

                                         echo '<ul id="dropdown3" class="dropdown-content">
                                                    <li><a class="modal-trigger" href="'.$url.'perfil"><i class="fa fa-lock" aria-hidden="true"></i>
                                                        Ver Perfil</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="'.$url.'perfil"><i class="fa fa-truck" aria-hidden="true"></i>Mis pedidos</a></li>
                                                    <li><a href="'.$url.'salir"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a></li>
                                                </ul> ';
                                        }



                                    }
                                }else{
                                    echo '<li>
                                    <a class="dropdown-button" href="#!" data-activates="dropdown3"><i class="material-icons">account_circle</i></a></li>';

                                    echo '<ul id="dropdown3" class="dropdown-content">
                                                    <li><a class="modal-trigger" href="#Iniciar-session"><i class="fa fa-lock" aria-hidden="true"></i>
                                                        Iniciar Session</a>
                                                    </li>
                                                    <li><a class="modal-trigger" href="#Iniciar-session"><i class="fa fa-map" aria-hidden="true"></i>Mis Direcciones</a></li>
                                                    <li class="divider"></li>
                                                    <li><a class="modal-trigger" href="#Iniciar-session"><i class="fa fa-truck" aria-hidden="true"></i>Mis pedidos</a></li>
                                                </ul> ';
                                }
                             ?>
                             <!-- acount -->
                             
                        <!-- acount -->
                        
                        <!--====  FIND ITEM USUARIOS  ====-->
                    </ul>
                </div>
            </nav>
        </div>

        <!-- DATOS MOBIL -->
        <ul class="side-nav" id="mobile-demo">
            <li><a  href="inicio"><i class="material-icons left">store_mall_directory</i> Inicio</a></li>
            <li>
                <a class='dropdown-button' href='#' data-activates='dropdown2'><i class="material-icons left">dehaze</i> Productos</a></li>
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="Cartuchos-de-tinta"><i class="fa fa-tint" aria-hidden="true"></i>Tinta</a></li>
                <li><a href="Toners"><i class="fa fa-th" aria-hidden="true"></i>Toner</a></li>
                <li class="divider"></li>
                <li><a href="Accesorios-para-tinta-y-toner"><i class="fa fa-cog" aria-hidden="true"></i>Repuestos</a></li>
                <li><a href="Repuestos-para-tinta-y-toner"><i class="fa fa-th-large" aria-hidden="true"></i>Accesorios</a></li>
            </ul>
            <li><a href="carrito-de-compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito</a></li>
            <li><a href="Nosotros"><i class="fa fa-users" aria-hidden="true"></i>Nosotros</a></li>
            <li><a href="Contactanos"><i class="fa fa-phone-square" aria-hidden="true"></i>Contactanos</a></li>
           <?php 
                if (isset($_SESSION["idUsuario"])) {
                         echo '<li><a class="dropdown-button" href="" data-activates="dropdown12"><i class="material-icons left">account_box</i>Perfil</a></li>
                            <ul id="dropdown12" class="dropdown-content">
                                <li><a  class="" href="perfil"><i class="fa fa-user" aria-hidden="true"></i>Mi perfil</a></li>
                                <li><a href="'.$url.'salir"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a></li>
                            </ul>';
                        
                    }else{
                       echo '
                        <li><a  class="modal-trigger" href="#Iniciar-session"><i class="fa fa-lock" aria-hidden="true"></i>Iniciar Session</a>
                        <li>';
                    }

            ?>
           </li>
        </ul>
        <!-- END MOBIEL -->

        
        <!-- MODAL INICIAR SESSION -->
        <div id="Iniciar-session" class="modal">
            <div class="modal-content">
                <form class="col s12 m6 l6 offset-m3 offset-l3" method="post">
                    <h3 class="tituloLogin center">INICIAR SESSION </h3>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="email" type="email" class="validate" name="ingEmail" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">https</i>
                                <input id="password" type="password" class="validate" name="ingClave" required>
                                <label for="password">Password</label>
                                <small class="right" ><a class="modal-close waves-effect waves-light  modal-trigger" href="#Olvide-contrasena" style="color:#E10D80">¿Olvidaste tu contraseña?</a></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 l6 center ingresar">
                                <?php 
                                    $ingreso = new ControladorUsuarios();
                                    $ingreso -> ctrIngresoUsuario();
                                 ?>
                                <button class="btn waves-effect pink darken-4 btnIngreso" type="submit" name="action">Ingresar
                                    <i class="material-icons left">lock_open</i>
                                </button>
                            </div>

                            <div class="col s12 l6 center">
                                <a class="waves-effect pink darken-4 btn modal-trigger  modal-close" href="#Registro-de-usuario">Registrate
                                    <i class="material-icons left">create</i>
                                </a>
                            </div>
                        </div>
                    </form>
                        <div class="row center">
                            <div class="col s12 l6 facebook">
                                <button class="btn waves-effect blue darken-4 tooltipped" data-position="left" data-delay="50" data-tooltip="Iniciar session con facebook">FACEBOOK <i class="fa fa-facebook left" aria-hidden="true"></i></button>
                            </div>
                            <a href="<?php echo $rutaGoogle;?>">
                                <div class="col s12 l6 google">
                                     <button class="btn waves-effect red darken-4 tooltipped" data-position="right" data-delay="50" data-tooltip="Iniciar session con google"> GOOGLE +  <i class="fa fa-google left" aria-hidden="true"></i></i></button>
                                </div>
                             </a>
                        </div>
                    
            </div>
        </div>
        <!-- END MODAL INICIAR SESSION -->

                <!--=====================================
                =            MODAL OLVIDE CONTRASEÑA          =
                ======================================-->
                  <!-- Modal Structure -->
                  <div id="Olvide-contrasena" class="modal">
                    <div class="modal-content center">
                      <h3 class="tituloLogin center">SOLICITUD DE NUEVA CONTRASEÑA</h3>
                      <form method="POST">
                        <label>Escribe el correo electronico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>
                       

                              <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">email</i>
                                    <input type="email"  name="passEmail" id="passEmail" class="validate" required>
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
                </div>
<!-- MODAL REGISTRO DE USUARIO  -->

 <!-- modal registro -->
        <div id="Registro-de-usuario" class="modal">
            <div class="modal-content">
                <form method="post" onsubmit="return registroUsuario()">
                      <h3 class="tituloLogin center"> REGISTRATE  </h3>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">perm_identity</i>
                            <input name="regNombre"  id="regNombreInput" type="text" required>
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">person</i>
                            <input name="regApellido"  id="regApellidoInput" type="text" required>
                            <label for="name">Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">email</i>
                            <input name="regEmail"  id="regCorreoInput" type="email" class="validate" required>
                            <label for="email" >Email</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">https</i>
                            <input name="regClave"  id="regClaveInput" type="password" class="validate" required>
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="checkBox left-align">
                            <label>
                                <input type="checkbox" id="test5" />
                                <label for="test5">
                                    Al registrarse, usted  acepta nuestras condiciones de uso y políticas de privacidad
                                </label>
                                    <br>
                                    <a href="https://www.iubenda.com/privacy-policy/8268984" class="iubenda-white iubenda-embed" title="condiciones de uso y políticas de privacidad">Leer más</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                            </label>
                        </div>
                    </div>
                                <?php
                                    $registro = new ControladorUsuarios();
                                    $registro -> ctrRegistroUsuario();
                                ?>
                    <div class="row">
                        <div class="col s12 center">
                            <div class="col m4 s12 directo">
                               
                             <button type="submit" value="REGISTRARME" class="btn waves-effect pink darken-4" id="btnRegistrarme" 
                                name="btnregistrarme">REGISTRARME</button> 
                                 
                            </div>
                            
                            <div class="col m4 s12 facebook">
                                <a class="btn waves-effect blue darken-4 tooltipped" data-position="top" data-delay="50" data-tooltip="Registrarme con facebook">FACEBOOK <i class="fa fa-facebook left" aria-hidden="true" ></i></a>
                                
                            </div>
                           
                           <a href="<?php echo $rutaGoogle;?>">
                               <div class="col l4 m4 s12 google">
                                    <a class="btn waves-effect red darken-4 tooltipped" data-position="top" data-delay="50" data-tooltip="Registrarme  con google"> GOOGLE+  <i class="fa fa-google left" aria-hidden="true"></i></i></a>
                                     <div class="divider"></div>
                                </div> 

                           </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 
<!-- FIN MODAL REGISTRO DE USUARIO  -->


