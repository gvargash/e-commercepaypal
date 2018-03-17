<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

?>

        <!-- /Productos detalle -->
        <div class="container imprimir-detalle">
            <!-- Breadcrumbs -->
              <div class="col s12 fondoBreadcrumb" style="margin-top: 20px;">
                    <a href="<?php echo $url?>" style="color:#1F87DF;">INICIO</a><span> / </span>
                    <a href="#" style="color:#880e4f;" class="active pagActiva" > <?php echo $rutas[0];?></a>
                </div>
            <?php 
                $item =  "ruta";
                $valor = $rutas[0];
                $infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
            if ($infoproducto!=null) {    
                echo '
                <!--======================================
                       COMPARTIR EN TWITER
              ========================================-->
                        <meta name="twitter:card" content="summary" />
                        <meta name="twitter:site" content="@capsula22" />
                        <meta name="twitter:title" content="'.$infoproducto["NombreProducto"].'" />
                        <meta name="twitter:description" content="'.$infoproducto["Descripcion"].'" />
                        <meta name="twitter:image" content="'.$servidor.$infoproducto["imagen"].'" />





              <!-- detalle -->
             <!--======================================
                        cabezerad detallle
              ========================================-->
                    <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col s3"><a  class="active" href="#test-swipe-1">Detalle</a></li>
                        <li class="tab col s3"><a href="#test-swipe-2">Descripción</a></li>
                        <li class="tab col s3"><a href="#test-swipe-3">Caracteristicas</a></li>
                        <li class="tab col s3"><a href="#test-swipe-4">Entrega de producto</a></li>
                    </ul>
                  <!--========================================
                        DETALLE
               ========================================-->
                    <div id="test-swipe-1" class="col s12">
                        <div class="row">
                            <h3 class="encabezado center">
                                    '.$infoproducto["NombreProducto"].'
                            </h3>
                            <div class="col l4 m4 sm12">
                                <img class="materialboxed" width="300" src="'.$servidor.$infoproducto["imagen"].'" alt=""/>
                            </div>
                            <div class="col l4 m4 sm12">
                                <ul class="collection">
                                    <li class="collection-item"><strong>Color: </strong>'.$infoproducto["Color"].'</li>
                                    <li class="collection-item"><strong>Tecnología de impresion:</strong> '.$infoproducto["TecnologiaImpresion"].'</li>
                                    <li class="collection-item"><strong>Tipo de Tinta: </strong> '.$infoproducto["TipoCartucho"].'</li>
                                    <li class="collection-item"><strong>Rendimiento: </strong> '.$infoproducto["Rendimiento"].'</li>
                                    <li class="collection-item"><strong>Marca: </strong> '.$infoproducto["NameMarca"].'</li>';
                                         if ($infoproducto['Stock']==0) {
                                         echo '<li class="collection-item"><span style="color:red;"><strong>Stock: </strong> <span>Stock agotado</span></li>';
                                      }else if ($infoproducto['Stock']<=5) {
                                        echo '<li class="collection-item">strong>Stock: </strong> <span  style="color:orange;"> Actualize su stock</span></li>';
                                      }else{
                                        echo '<li class="collection-item"><strong>Stock: </strong><span  style="color:green;"> Hay existencias </span></li>';
                                      }

                                echo '</ul>
                            </div>
                            <div class="col l4 m4 sm12">
                                <h2 class="right-left">
                                    <small>
                                        <strong class="oferta">PEN S/ '.$infoproducto["PrecioOriginal"].'</strong>
                                    </small>  
                                    <small style="font-size:18px">S/ '.$infoproducto["PrecioKayre"].'</small>
                                </h2>
                                <h4>                    
                                    <small class="center">';
                                    if ($infoproducto["nuevo"]!=0)
                                    {
                                        echo '<span class="chip light-green accent-3">Nuevo</span>';
                                    }
                                    if ($infoproducto["oferta"]!=0) {
                                            echo '<span class="chip blue darken-1">'.$infoproducto["descuentoOferta"].'% OFF</span>';
                                        }   
                                    echo '                  
                                    </small>
                                </h4>
                                      <button type="button" class="waves-effect waves-light btn pink darken-4 agregarCarrito" 
                                      idProducto="'.$infoproducto["idProducto"].'"
                                      NombreProducto="'.$infoproducto["NombreProducto"].'"
                                      imagen="'.$servidor.$infoproducto["imagen"].'"
                                      PrecioKayre="'.$infoproducto["PrecioKayre"].'"
                                      Peso="'.$infoproducto["Peso"].'"">AGREGAR AL CARRITO</button>
                                    <div class="">
                                    <h5>Compartir</h5>
                                   <div class="sharethis-inline-share-buttons">
                                   </div>
                                </div>
                                <br>
                                <small>
                                    
                                    <span class="chip deep-purple lighten-5"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> '.$infoproducto["ventas"].' ventas</span>
                                    <i class="fa fa-eye" style="margin:0px 5px"></i>
                                    Visto por
                                    <span class="vistas chip deep-purple lighten-5" tipo="'.$infoproducto["PrecioKayre"].'">
                                    '.$infoproducto["vistas"].'</span> personas
                                </small>
                            </div>
                        </div>
                    </div>

                  <!--=======================================
                        DESCRIPCION
                =======================================-->

                    <div id="test-swipe-2" class="col s12">
                        <div class="row col12">
                            <div class="col s12 m10 offset-m2">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row valign-wrapper">
                                        <div class="col s12 l12 m12">
                                            <h5>DESCRIPCION</h5>
                                            <blockquote>
                                                '.$infoproducto["Descripcion"].'
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m10 offset-m2">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row valign-wrapper">
                                        <div class="col s12 l12 m12">
                                            <h5>COMPATIBILIDAD</h5>
                                            <blockquote>
                                                '.$infoproducto["Compatibilidad"].'
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!--=========================================
                        CARACTERISTICAS
                 =========================================-->
                    <div id="test-swipe-3" class="col s12">
                        <div class="row l12">
                            <div class="collection">
                                <a href="#!" class="collection-item"><strong>Modelo:</strong> '.$infoproducto["Modelo"].'</a>
                                <a href="#!" class="collection-item "><strong>SKU:</strong> '.$infoproducto["SKU"].'</a>
                                <a href="#!" class="collection-item"><strong>Peso:</strong>  '.$infoproducto["Peso"].'</a>
                                <a href="#!" class="collection-item"><strong>Garantia:</strong>  '.$infoproducto["GarantíadeProducto"].' </a>
                            </div>
                        </div>
                    </div>
                    
                     <div id="test-swipe-4" class="col s12">
                        <div class="row l12">
                            <div class="collection">
                                <a href="#!" class="collection-item">Entrega: 5 horas a Lima Metropolitana</a>
                                <a href="#!" class="collection-item">Entrega: (Lima) Distritos cerca a Breña  1h o 2h max.</a>
                            </div>
                        </div>
                    </div>
                  <!--=========================================
                        FIN CARCTERISTICAS
                  =========================================-->
            ';  
        }else
        {
        echo '<div class="col xs12 s12 m12 l12 center-align error404">
                    <div class="row">
                            <h1 id="errorText">Oops!</h1>
                    <h2 id="errorText">Debes seleccionar un productos para ver sus detalles</h2>
                </div>
            </div>';;
        }
             ?>
        </div>
        <!-- end articulos -->
    </div>
</div>



<!--=====================================
VITRINA DE PRODUCTOS RELACIONADO
======================================-->
<br>
<br>
<br>

<div class="productos">
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            
            <!--=====================================
            BARRA TÍTULO
            ======================================-->
                <hr>
            <div class="col s12 tituloDestacado" style="margin-top: 20px; margin-bottom: 0px;">
                
                <!--===============================================-->
                
                <div class="col s12 m6" >
                    
                    <h1><small>PRODUCTOS RELACIONADO</small></h1>

                </div>

                <!--===============================================-->

                <div class="col s12 m6" style="margin-bottom:30px;">
            <?php

                    $item = "idCategoria";
                    $valor = $infoproducto["idCategoria"];

                    $rutaArticulosDestacados = ControladorProductos::ctrMostrarCategorias($item, $valor);                    
                  echo '<a href="'.$url.$rutaArticulosDestacados["ruta"].'">
                        
                        <button class="btn  colorSecundario pull-right">
                            
                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>'
                    ?>

                </div>

                <!--=============================================== -->

            </div>
        </div>
    <hr>
<!--=====================================
=            LISTAR PRODUCTOS          =
======================================-->
   
<?php

            $ordenar = "";
            $item = "idCategoria";
            $valor = $infoproducto["idCategoria"];
            $base = 0;
            $tope = 4;
            $modo = "Rand()";

            $relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
            if(!$relacionados){

                echo '<div class="col-xs-12 error404">

                    <h1><small>¡Oops!</small></h1>

                    <h2>No hay productos relacionados</h2>

                </div>';

            }else{
                echo ' <div class="row">
                <div class="grid0">';
                foreach ($relacionados as $key => $value) {
                echo '
                <div class="card contenedorCard sticky-action col l3 m6 s12 center">
                        <a href="'.$value["ruta"].'"><div class="card-image waves-effect waves-block waves-light">
                         <img class="imgproducto" src="'.$servidor.$value["imagen"].'">
                        </div></a>
                        <div class="card-content car-content-personalizado">
                          <span class="card-title  grey-text text-darken-4">
                                <p class="truncate">
                                    '.$value["NombreProducto"].'
                                </p>
                            </span>
                            <h4>                    
                                <small>';
                                if ($value["nuevo"]!=0)
                                {
                                    echo '<span class="chip light-green accent-3">Nuevo</span>';
                                }
                                if ($value["oferta"]!=0) {
                                        echo '<span class="chip blue darken-1">'.$value["descuentoOferta"].'% OFF</span>';
                                    }   
                                echo '                  
                                 </small>
                                </h4>
                            </div>
                            <div class="card-action enlaces center">
                                <button type="button" class="btn btnProductoPerzonalizado btn-xs deseos tooltipped" idProducto="'.$value["idProducto"].'" data-position="top" data-delay="50" data-tooltip="Agregar a mi lista de deseos">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>

                                <a href="'.$value["ruta"].'" class="pixelProducto">
                                    <button type="bottom" class="btn btnProductoPerzonalizado tooltipped" data-position="top" data-delay="50" data-tooltip="Ver producto">
                                        
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>   
                                </a>
                            </div>
                          </div>';
    }
  echo  '</div>
    </div>';
}
?>
</div>



<!--=======================================
  PRODUCTOS datos enrequecidos
=======================================-->

<?php  
 foreach ($infoproducto as $key => $value) {

    echo '<script type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "Product",
          "name": "'.$infoproducto['NombreProducto'].'",
          "image":"'.$servidor.$infoproducto["imagen"].'",
          "brand":"'.$infoproducto["Descripcion"].'"
        }
        </script>';
 } ?>

