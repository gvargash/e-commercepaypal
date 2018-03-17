<!--=====================================
BANNER
======================================-->
<?php 

$servidor = Ruta::ctrRutaServidor();

$ruta = "sin-categoria";

$banner = ControladorProductos::ctrMostrarBanner($ruta);

$titulo1 = json_decode($banner["titulo1"],true);
$titulo2 = json_decode($banner["titulo2"],true);
$titulo3 = json_decode($banner["titulo3"],true);

if($banner != null){

echo '<figure class="banner">

		<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">	

		<div class="textoBanner '.$banner["estilo"].'">
			
			<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

			<h2 style="color:'.$titulo2["color"].'"><strong>'.$titulo2["texto"].'</strong></h2>

			<h3 style="color:'.$titulo3["color"].'">'.$titulo3["texto"].'</h3>

		</div>

	</figure>';

}
$titulosModulos=array("LO MAS VENDIDO","LO MAS VISTO");

	$base=0;
	$tope=4;
	$rutaModulos=array("lo-mas-vendido","lo-mas-visto");
	if ($titulosModulos[0]=="LO MAS VENDIDO")
	 {
		$ordenar="ventas";
		$item=null;
		$valor=null;
		$modo="DESC";
		$ventas=ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor,$base,$tope,$modo);
	}
	if ($titulosModulos[1]=="LO MAS VISTO")
	 {
		$ordenar="vistas";
		$item=null;
		$valor=null;
		$modo="DESC";
		$vistas=ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor,$base,$tope,$modo);
	}
	$modulos=array($ventas,$vistas);
	for ($i=0; $i <count($titulosModulos) ; $i++)
	{
		echo '<div class="barraProductos">

	<div class="container hide-on-med-and-down">
		<hr>
		<div class="row">
			
			<div class="col s12 organizarProductos hide-on-med-and-down">

				<div class="right-align contenedorBotones">

					 <button type="button" class="btn barraSuperior btnGrid" id="btnGrid'.$i.'">
					 	
						<i class="fa fa-th" aria-hidden="true"></i>  

						<span class="col s0 pull-right left"> GRID</span>

					 </button>

					 <button type="button" class="btn barraSuperior btnList" id="btnList'.$i.'">
					 	
						<i class="fa fa-list" aria-hidden="true"></i> 

						<span class="col s0 pull-right left"> LIST</span>

					 </button>
					
				</div>		

			</div>

		</div>
		<hr>
	</div>
</div>


<!--=====================================
VITRINA DE PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="productos">
	
	<div class="container">
		
		<div class="row">
			
			<!--=====================================
			BARRA TÍTULO
			======================================-->

			<div class="col s12 tituloDestacado">
				
				<!--===============================================-->

				<div class="col s12 m6">
					
					<h1><small>'.$titulosModulos[$i].'</small></h1>

				</div>


				<!--===============================================-->

				<div class="col s12 m6" style="margin-bottom:30px;">
					
					<a href="'.$rutaModulos[$i].'">
						
						<button class="btn  colorSecundario pull-right">
							
							VER MÁS <span class="fa fa-chevron-right"></span>

						</button>

					</a>

				</div>


				<!--=============================================== -->

			</div>

			<div class="clearfix"></div>
		</div>

		<div class="row">
				<div class="grid'.$i.'">';
				foreach ($modulos[$i] as $key => $value) {
				echo '<!-- producto1 -->
				     <div class="card contenedorCard sticky-action col l3 m6 s12 center">
					    <a href="'.$value["ruta"].'" class="pixelProducto">
					    <div class="card-image waves-effect waves-block waves-light">
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
					    	<button type="button" class="pixelProducto btn btnProductoPerzonalizado btn-xs deseos tooltipped"  data-position="top" data-delay="50" idProducto="'.$value["idProducto"].'" data-tooltip="Agregar a mi lista de deseos">
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

	echo '</div>
			<div class="list'.$i.'" style="display:none">';
			foreach ($modulos[$i] as $key => $value) {
				echo '<div class="col s12 m12" >
                    <div class="card contenedorCardHorizontal horizontal">
                      <div class="card-image">
                        <a href="'.$value["ruta"].'" class="pixelProducto"><img class="responsive-img"
                         style="height:150px; width:150px;"  src="'.$servidor.$value["imagen"].'"></a>
                      </div>
                      	<div class="card-stacked">
                        <div class="card-content car-content-personalizadoVertical">
                        <h5 clas="card-title"><small><p>'.$value["NombreProducto"].'</p></small></h5>
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
                          <blockquote>'.$value["Descripcion"].'</blockquote>
                         <h2 class="right-align">
							<small>
								<strong class="oferta">PEN S/ '.$value["PrecioOriginal"].'</strong>
							</small>  
							<small style="font-size:18px">S/ '.$value["PrecioKayre"].'</small>
						</h2>
                        </div>
                        <div class="card-action enlaces">
                                    <button type="button" class="pixelProducto btn btnProductoPerzonalizado tooltipped deseos"  idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos tooltipped" idProducto="470" data-position="top" data-delay="50" data-tooltip="Agregar a mi lista de deseos">

										<i class="fa fa-heart" aria-hidden="true"></i>

									</button>

									<a href="'.$value["ruta"].'" class="pixelProducto">
										<button type="button" class="btn btnProductoPerzonalizado tooltipped" data-position="top" data-delay="50" data-tooltip="Ver producto">
									  		<i class="fa fa-eye" aria-hidden="true"></i>
									 </button>
								</a>                         
                          </div>
                      </div>
                    </div>
                  </div>';
			}

	echo '</div>
		</div>
	</div>';
	} 
 ?>
