  <?php 
    $url = Ruta::ctrRuta(); 
     $servidor=Ruta::ctrRutaServidor();
     ?>
 <!-- comprar-->
        <div id="alquilar" class="col s12" style="margin-top: 20px;">
            <div class="container">
                <div class="row center-align contenedor-carrito">
                    <div class="row cabeceraCarrito center">
                        <!--=====================================
                            CARRITO cabezota
                           ======================================-->
                        <div class="col l2 m2 s12">
                            
                        </div>
                        <div class="col l2 m2 s12">
                           
                        </div>
                        <div class="col l2 m2 s12">
                            <h6>PRODUCTO</h6>
                        </div>
                        <div class="col l2 m2 s12">
                            <h6>PRECIO</h6>
                        </div>
                        <div class="col l2 m2 s12">
                            <h6>CANTIDAD</h6>
                        </div>
                        <div class="col l2 m2 s12">
                            <h6>SUBTOTAL</h6>   
                        </div>
                    </div>
                    <div class="row  cuerpoCarrito center">
                        <!--=====================================
                            CARRITO DE COMPRAS CUERPO
                           ======================================-->
                        

                    </div>

                    <!--=====================================
                   SUMA DEL TOTAL DE PRODUCTOS
                   ======================================-->
                <div class="row col s12 l12 sumaCarrito offset-l8 offset-m8 " >
                    <div class="col l4 m4 s12" style="border-radius: 3px;background: #D7CBD7; height: 50px; line-height: 50px;">
                        <div class="col l6 m6 s6 ">
                           <h5>TOTAL:</h5>
                        </div>
                        <div class="col s6 m6 l6">
                            <h5 class="sumaSubTotal">
                            
                            </h5>
                        </div> 
                    </div>
                </div>
                 <!--=====================================
                   BOTON CHECKOUT
                   ======================================-->
                   <div class="row col l12 sumaCarrito offset-l8 offset-m8" >
                        
                         <?php 
                            if (isset($_SESSION["validarSession"])) {
                                if ($_SESSION["validarSession"]=="ok") {
                                    echo '<div class="col l6 m6 s12 center">
                                            <a href="#modalCheckout" id="btnCheckout" idUsuario="'.$_SESSION["idUsuario"].'" class="btn colorSecundario modal-trigger">REALIZAR PEDIDO</a>
                                            </div>';
                                }
                            }else{
                                    echo '<div class="col l6 m6 s12">
                                    <a class="btn colorSecundario modal-trigger" href="#Iniciar-session">REALIZAR PEDIDO</a>
                                    </div>';
                                }
                          ?>
                     </div>
                </div>
                <!-- page carrito bacio  -->
                    <ul class="collection with-header center contenedor-basio" style="color: #999999; z-index:-1;display: none;"> 
                        <li class="collection-item center"> 
                         <i class="fa fa-cart-arrow-down fa-5x" aria-hidden="true"></i> 
                        <h3 class="encabezado">NO TIENES PRODUCTOS EN TU CARRITO. </h3> 
                         <h6 class="encabezado">Ve a nuestra seccion productos y elige,el producto que decea.</h6> 
                        </li> 
                    </ul>
            </div>
            <!-- end compras -->



                  <!-- MODAL CHECKOUT -->
        <div id="modalCheckout" class="modal modal-fixed-footer" style=" height: 1000px !important ;">
          
            <div class="modal-content contenidoCheckout center" >
                    <h3 class="encabezado center">PRODUCTOS EN CESTA</h3>   
                        <br>
                        <br>

                    
                          <?php
                            $respuesta=ControladorCarrito::ctrMostrarTarifas(); 
                     echo '<input type="hidden" name="" id="tasaImpuesto" value="'.$respuesta["impuesto"].'">
                           <input type="hidden" name="" id="envioNacional" value="'.$respuesta["envioNacional"].'">
                           <input type="hidden" name="" id="envioInternacional" value="'.$respuesta["envioInternacional"].'">
                           <input type="hidden" name="" id="tasaMinimaNal" value="'.$respuesta["tasaMinimaNal"].'">
                           <input type="hidden" name="" id="tasaMinimaInt" value="'.$respuesta["tasaMinimaInt"].'">
                           <input type="hidden" name="" id="tasaPais" value="'.$respuesta["pais"].'">';
                         ?>
                    <form method="POST" >  

                            <input type="hidden" name="subtotalco" id="subtotal_De" value="" readonly> 
                            <input type="hidden" name="costoEnvioco" id="costoEnvio_De" value="" readonly>
                            <input type="hidden" name="igvco" id="igv_De" value="" readonly>
                            <input type="hidden" name="totalco" id="total_De" value="" readonly> 

                        <div class="listaProductos row">
                            <div class="col s12 m12 l12">
                                <table class="table tablaProductos bordered highlight centered responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>                     
                         <div class="row col s12 m12 l12">
                            <div class="col s12 m4 l4 offset-m8 offset-l8 ">
                                <table class="tablaTasas striped highlight responsive-table ">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td><span class="cambiarDivisa">PEN</span>
                                             <span class="simboloDivisa">S/ </span>
                                              <span class="valorSubtotal" valor="0"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Envio</td>
                                            <td><span class="cambiarDivisa">PEN</span>
                                             <span class="simboloDivisa">S/ </span>
                                              <span class="valorTotalEnvio" valor=""></span></td>
                                        </tr>
                                        <tr>
                                            <td>Impuesto</td>
                                            <td><span class="cambiarDivisa">PEN</span> 
                                             <span class="simboloDivisa">S/ </span>
                                             <span class="valorTotalImpuesto" valor="0">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td><strong><span class="cambiarDivisa">PEN</span>
                                             <span class="simboloDivisa">S/ </span>
                                             <span class="valorTotalCompra" valor="0">0</span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                            </div>
                         </div>
                      <?php
                           $registroPedido = new ControladorPedidos();
                           $registroPedido -> ctrPedidoProducto();
                      ?>                       

                     <button type="submit" class="btn colorSecundario">FINALIZAR PEDIDO</button>
                </form>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
            </div>
        </div>
        <!-- END MODAL CHECKOUT-->
      
  </div>
       
                            
                     