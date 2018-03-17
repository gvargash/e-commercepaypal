<!--=====================================
BARRA PRODUCTOS
======================================-->
<div class="contenedor-catproducto" style="margin-top: 20px;">
	<div class="row">
	    <!-- filtro general -->
	    <div class="col s12 m3  accent-3 hide-on-med-and-down">
	        <ul class="collection with-header">
	            <ul class="collapsible " data-collapsible="accordion">
	                <li>
	                    <div class="collapsible-header purple accent-3"><i class="material-icons">clear_all</i>MARCAS</div>
	                </li>
	                <div class="collection listar-marcas">
	                    <!-- aqui se listan las marcas -->
	                    <a href="#!" class="collection-item">HP</a>
				        <a href="#!" class="collection-item">LEXMARK</a>
				        <a href="#!" class="collection-item">SAMSUNG</a>
				        <a href="#!" class="collection-item">CANON</a>
	                </div>
	            </ul>
	       </ul>
	    </div>
	    <!-- filtro movil -->
	    <div class="col s12 m3  hide-on-med-and-up">
	        <ul class="collapsible" data-collapsible="accordion">
	            <li>
	                <div class="collapsible-header  purple accent-3"><i class="fa fa-chevron-down"></i>FILTROS</div>
	                <div class="collapsible-body">
	                    <ul class="collection with-header">
	                        <ul class="collapsible" data-collapsible="accordion">
	                            <li>
	                                <div class="collapsible-header purple accent-3"><i class="material-icons">clear_all</i>MARCAS</div>
	                            </li>
	                            <div class="collection listar-marcas">
	                            	<a href="#!" class="collection-item">Alvin</a>
							        <a href="#!" class="collection-item">Alvin</a>
							        <a href="#!" class="collection-item">Alvin</a>
							        <a href="#!" class="collection-item">Alvin</a>
	                            </div>
	                        </ul>
	                        <div class="col s12">
	                            <div class="row">
	                                <div class="input-field col s12">
	                                    <i class="material-icons prefix">search</i>
	                                    <input type="search" id="autocomplete-input" class="autocomplete">
	                                    <label for="autocomplete-input">Buscar</label>
	                                </div>
	                            </div>
	                        </div>
	                    </ul>
	                </div>
	            </li>
	        </ul>
	    </div>
	    <!-- Fin de los filtros moviles -->
	    <!-- Lista de productos -->
	    <div class="col s12 m9 ">
	        <div class="row listar-tinta">
	            <!--=====================================
	            =            BARRRA DE PRODUCTOS          =
	            ======================================-->
				<div class="barraProductos">
					<div class="container">
						<div class="row">
							<div class="col s12 m6">
							
								<a class='dropdown-button btn barraSuperior' href='#' data-activates='dropdownfl'>Ordenar Producto <i class="material-icons right">keyboard_arrow_down</i></a>

								  <!-- Dropdown Structure -->
								  <ul id='dropdownfl' class='dropdown-content'>
								  	<?php  
						 echo' <li><a href="'.$url.$rutas[0].'/1/recientes/'.$rutas[3].'">Más recientes</a></li>
							   <li><a href="'.$url.$rutas[0].'/1/antiguos/'.$rutas[3].'">Más Antiguos</a></li>'
								    ?>
								 </ul>

							</div>
							<div class="col s12 m6  organizarProductos">

								<div class="right-align">

									 <button type="button" class="btn barraSuperior btnGrid" id="btnGrid0">
									 	
										<i class="fa fa-th" aria-hidden="true"></i>  

										<span class="col s0 pull-right left"> GRID</span>

									 </button>

									 <button type="button" class="btn barraSuperior btnList" id="btnList0">
									 	
										<i class="fa fa-list" aria-hidden="true"></i> 

										<span class="col s0 pull-right left"> LIST</span>

									 </button>
									
								</div>		

							</div>

						</div>
					</div>
				</div>
<!--=====================================
LISTAR PRODUCTOS
======================================-->
<div class="productos">
	
	<div class="container">
    <!-- Breadcrumbs -->
      
                <div class="col s12 fondoBreadcrumb">
                    <a href="<?php echo $url?>" style="color:#1F87DF;">INICIO</a><span> / </span>
                    <a href="#" style="color:#880e4f;" class="active pagActiva" > <?php echo $rutas[0];;?></a>
                </div>

	           
			<?php 
				/*=====================================
	            = LLAMADO DE PAGINACIO =
	            ======================================*/
	            if (isset($rutas[1])) {
	            	//$_SESSION["ordenar"]="DESC";
	            	if(isset($rutas[2]))
	            	{
	            		if ($rutas[2]=="antiguos") {
	            			$modo="ASC";
	            			$_SESSION["ordenar"]=$modo;
	            		}else{
	            			$modo="DESC";
	            			$_SESSION["ordenar"]=$modo;
	            		}

	            	}else
	            	{
	            		$modo=$_SESSION["ordenar"];

	            	}
	            		$base=($rutas[1]-1)*12;
						$tope=12;
	            	}else{
	            		$rutas[1]=1;
	            		$base=0;
						$tope=12;
						$modo="DESC";
	            	}
					/*=============================================
					=LLAMADO DE PRODUCTO PARA BUSCADOR
					=============================================*/
					$productos=null;
					$listaProductos=null;

					$ordenar="idProducto";
				if(isset($rutas[3])){

					$busqueda = $rutas[3];

					$productos=ControladorProductos::ctrBuscarProductos($busqueda,$ordenar,$modo,$base,$tope);
					$listaProductos=ControladorProductos::ctrListarProductosBusqueda($busqueda);
				}




	if (!$productos) {
		echo '<div class="col xs12 s12 m12 l12 center-align error404">
			<div class="row">
					<h1 id="errorText">Oops!</h1>
			<h2 id="errorText">Aun no tenemos productos en estas sección</h2>
			</div>
		 </div>';
	}else
	{
		echo '<div class="row">
				<div class="grid0">';
		foreach ($productos as $key => $value) {
		echo '<!-- producto1 -->
		     <div class="card contenedorCard sticky-action col l3 m6 s12 center">
			    <a href="'.$url.$value["ruta"].'"><div class="card-image waves-effect waves-block waves-light">
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
			    	<button type="button" class="btn btnProductoPerzonalizado btn-xs deseos tooltipped"  data-position="top" idProducto="'.$value["idProducto"].'" data-delay="50" data-tooltip="Agregar a mi lista de deseos">
						<i class="fa fa-heart" aria-hidden="true"></i>
					</button>

					<a href="'.$url.$value["ruta"].'" class="pixelProducto">
						<button type="bottom" class="btn btnProductoPerzonalizado tooltipped" data-position="top" data-delay="50" data-tooltip="Ver producto">
							
							<i class="fa fa-eye" aria-hidden="true"></i>
						</button>	
					</a>
			    </div>
			  </div>';
	}

	echo '</div>
			<div class="list0" style="display:none">';
			foreach ($productos as $key => $value) {
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
                                    <button type="button" class="btn btnProductoPerzonalizado tooltipped deseos"  idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos tooltipped" idProducto="470" data-position="top" data-delay="50" data-tooltip="Agregar a mi lista de deseos">

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

			echo '</div>';
		}
?>
<!--=====================================
    =           PRODUCTO-CONTAINER       =
 ======================================-->
		</div>
	</div>


<!--=====================================
   = CIERRE GENERAL DE SECCION PRODUCTO         =
 ======================================-->

</div>

		<!-- Fin lista de producto -->

	       <!--=====================================
	       =           PAGINACION           =
	       ======================================-->

	       
			<?php if (count($listaProductos)!=0) {
				
				$pagProductos=ceil(count($listaProductos)/12);
				if ($pagProductos>4) {
				/*=====================================
	       =  BOTONES DE LAS 4 PRIMERAS PAGINAS         =
	       ======================================*/
					if($rutas[1]==1){
					echo '<ul class="pagination  center">';
						for ($i=1; $i <4; $i++) { 
						echo '<li class="waves-effect" id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[3].'">'.$i.'</a></li>';
						}
					echo '<li class="disabled waves-effect"><a href="#!">...</a></li>
						<li class="waves-effect" id="item'.$i.'">
							<a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[3].'">'.$pagProductos.'</a></li>
							<li class="waves-effect">
							<a href="'.$url.$rutas[0].'/2/'.$rutas[2].'/'.$rutas[3].'"><i class="material-icons">chevron_right</i></a></li>
						</ul>';
					}
			
			       /*==================================
	      				LOS BOTONES DE LAMITAD DE LA PAGINA HACIA ABAJO
	      			======================================*/
		      		else if($rutas[1]!=$pagProductos && 
			      			$rutas[1]!=1 && 
			      			$rutas[1]<($pagProductos/2)&&
		      				$rutas[1]<($pagProductos-3))
		      		{
		      			$numPagActual=$rutas[1];
		      		echo '<ul class="pagination  center">
		      		<a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="material-icons">chevron_left</i></a>';

						for ($i=$numPagActual; $i <=($numPagActual+3); $i++) { 
						echo '<li id="item'.$i.'" class="waves-effect">
							<a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';
						}

		      		echo '<li class="disabled waves-effect"><a href="#!">...</a></li>
						<li class="waves-effect" id="item'.$i.'">
							<a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
							<li class="waves-effect">
							<a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="material-icons">chevron_right</i></a></li>
						</ul>';
					}
				 /*==================================
	      				LOS BOTONES DE LAMITAD DE LA PAGINA HACIA ARRIBA
	      			======================================*/
		      		else if($rutas[1]!=$pagProductos && 
			      			$rutas[1]!=1 && 
			      			$rutas[1]>=($pagProductos/2)&&
		      				$rutas[1]<($pagProductos-3))
		      		{
		      			$numPagActual=$rutas[1];

		      				echo '<ul class="pagination  center">
			       			<li class=""><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="material-icons">chevron_left</i></a>
			       			</li>
			       			<li class="waves-effect" id="item'.$i.'">
							<a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
			       				<li class="disabled waves-effect"><a href="#!">...</a></li>';

							for ($i=$numPagActual; $i <=($numPagActual+3); $i++) { 
								echo '<li id="item'.$i.'" class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';
							}
					echo '  <li class="waves-effect">
						<a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'">
						<i class="material-icons">chevron_right</i>
						</i></a></li>
				</ul>';
		      		}
		      			/*==================================
					BOTONES DE LAS ULTIMAS 4 PAGINAS Y LA PRIMERA PAGINA        =
	       			======================================*/
			       else
			       {
			       		$numPagActual=$rutas[1];
			       		echo '<ul  class="pagination  center">
			       		<li class=""><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="material-icons">chevron_left</i></a>
			       				</li>
			       			<li id="item'.$i.'" class="waves-effect">
							<a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
			       			<li class="disabled waves-effect"><a href="#!">...</a></li>';

						for ($i=($pagProductos-3); $i <$pagProductos; $i++) { 
							echo '<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';
						}
					 	echo '</ul>';
			       }

				}else
					{
						echo '<ul class="pagination  center">';
							for ($i=1; $i <$pagProductos; $i++) { 
								echo '<li class="waves-effect" id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';
							}
						echo '
						</ul>';
					}
	}
		?>
	         <!--end paginacion -->
	    </div>
	    <!-- end articulos -->
	</div>
</div>