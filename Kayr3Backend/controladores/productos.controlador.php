<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR TOTAL PRODUCTOS
	=============================================*/

	static public function ctrMostrarTotalProductos($orden){

		$tabla = "producto";

		$respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "producto";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}



			static public function ctrAgregarProducto(){

				if (isset($_POST["nombreproducto"])) {

					$tech=$_POST["tecnologiadeimpresion"];
					$TecnologiaImpresion=implode("",$tech);
					$nombreproducto=htmlentities($_POST["nombreproducto"]);

					$nombreproductourl=str_replace(' ', '-', $nombreproducto);

					$color=$_POST["color"];

					$colorproducto=implode("-",$color);
				

					$modeloproducto=htmlentities($_POST["modelo"]);

					$SKUURL=htmlentities($_POST["SKU"]);

				
					$rutaparaimg="";


					$categoria=htmlentities($_POST["idcategoria"]);
					if ($categoria=="1") {
						$rutaparaimg="vistas/img/productos/tinta/";
					}else if ($categoria=="2") {
						$rutaparaimg="vistas/img/productos/toner/";
					}else if ($categoria=="3") {
						$rutaparaimg="vistas/img/productos/repuestos7";
					}else if ($categoria=="4"){
						$rutaparaimg="vistas/img/productos/accesorios/";
					}else{
						$rutaparaimg="vistas/img/productos/otrascategorias/";
					}



					    $nombre_img = $_FILES['imagen']['name'];
				        $directorio =$rutaparaimg;
				        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

				        $imgdb=$directorio.$nombre_img;

				        $rutaproducto=$nombreproductourl.'-'.$colorproducto.'-'.$modeloproducto.'-'.$SKUURL;
				 $datos=array(
				 	"NombreProducto"=>$_POST["nombreproducto"],
				 	"Color"=>$colorproducto,
					"Rendimiento"=>htmlentities($_POST["rendimiento"]),
					"TipoCartucho"=>htmlentities($_POST["tipodecartucho"]),
					"SKU"=>htmlentities($_POST["SKU"]),
					"Modelo"=>htmlentities($_POST["modelo"]),
					"Peso"=>htmlentities($_POST["peso"]),
					"GarantiadeProducto"=>htmlentities($_POST["garantideproducto"]),
					"Compatibilidad"=>htmlentities($_POST["compatibilidad"]),
					"TecnologiaImpresion"=>htmlentities($TecnologiaImpresion),
					"PrecioOriginal"=>htmlentities($_POST["preciooriginal"]),
					"PrecioKayre"=>htmlentities($_POST["preciokayre"]),
					"Stock"=>htmlentities($_POST["STOCK"]),
					"Estado"=>0,
					"Descripcion"=>htmlentities($_POST["descripcion"]),
					"ruta"=>$rutaproducto,
					"vistas"=>0,
					"ventas"=>0,
					"oferta"=>0,
					"nuevo"=>$_POST["nuevo"],
					"precioOfferta"=>0,
					"imagenOfferta"=>"",
					"finOferta"=>"",
					"descuentoOferta"=>0,
					"imagen"=>$imgdb,
					"ofertaPorCategoria"=>0,
					"ofertaPorMarca"=>0,
					"idCategoria"=>$categoria,
					"idMarca"=>htmlentities($_POST["idmarca"]),
					"fecha"=>"",
				);

				 var_dump($respuesta);

				$respuesta=ModeloProductos::mdlAgregarProductos($datos);


				if ($respuesta=="ok") {
					echo '<script> 

							swal({
								  title: "¡BIEN!",
								  text: "¡Producto  guardado!!",
								  type:"success",
								  confirmButtonText: "Ok",
								   confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
				}else{
					echo 'swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema al registrar el producto!",
									  type:"error",
									  confirmButtonText: "OK",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});
								</script>';
				}
			}
		}


		static public function crtProductoEditar($item,$valor){
			$tabla="producto";

			$respuesta=ModeloProductos::mdlmostrarParaEditar($tabla,$item,$valor);

			return $respuesta;
		}




		static public function ctrEditarproductoSeleccionado(){

					if (isset($_POST["nombreproducto"])) {

					$nombreproducto=htmlentities($_POST["nombreproducto"]);

					$nombreproductourl=str_replace(' ', '-', $nombreproducto);

					$colorproducto=$_POST["color"];
				

					$modeloproducto=htmlentities($_POST["modelo"]);

					$SKUURL=htmlentities($_POST["SKU"]);

				
					$rutaparaimg="";


					if ($_FILES["imagen"]=="") {
						$rutaparaimg=$_POST["imgactual"];
					}else{
						$categoria=htmlentities($_POST["idcategoria"]);
						if ($categoria=="1") {
							$rutaparaimg="vistas/img/productos/tinta/";
						}else if ($categoria=="2") {
							$rutaparaimg="vistas/img/productos/toner/";
						}else if ($categoria=="3") {
							$rutaparaimg="vistas/img/productos/repuestos7";
						}else if ($categoria=="4"){
							$rutaparaimg="vistas/img/productos/accesorios/";
						}else{
							$rutaparaimg="vistas/img/productos/otrascategorias/";
						}
					}



					    $nombre_img = $_FILES['imagen']['name'];
				        $directorio =$rutaparaimg;
				        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

				        $imgdb=$directorio.$nombre_img;

				        $rutaproducto=$nombreproductourl.'-'.$colorproducto.'-'.$modeloproducto.'-'.$SKUURL;
				 $datos=array(
				 	"NombreProducto"=>$_POST["nombreproducto"],
				 	"Color"=>$colorproducto,
					"Rendimiento"=>htmlentities($_POST["rendimiento"]),
					"TipoCartucho"=>htmlentities($_POST["tipodecartucho"]),
					"SKU"=>htmlentities($_POST["SKU"]),
					"Modelo"=>htmlentities($_POST["modelo"]),
					"Peso"=>htmlentities($_POST["peso"]),
					"GarantiadeProducto"=>htmlentities($_POST["garantideproducto"]),
					"Compatibilidad"=>htmlentities($_POST["compatibilidad"]),
					"TecnologiaImpresion"=>htmlentities($_POST["tecnologiadeimpresion"]),
					"PrecioOriginal"=>htmlentities($_POST["preciooriginal"]),
					"PrecioKayre"=>htmlentities($_POST["preciokayre"]),
					"Stock"=>htmlentities($_POST["STOCK"]),
					"Estado"=>0,
					"Descripcion"=>htmlentities($_POST["descripcion"]),
					"ruta"=>$rutaproducto,
					"vistas"=>0,
					"ventas"=>0,
					"oferta"=>0,
					"nuevo"=>$_POST["nuevo"],
					"precioOfferta"=>0,
					"imagenOfferta"=>"",
					"finOferta"=>"",
					"descuentoOferta"=>0,
					"imagen"=>$imgdb,
					"ofertaPorCategoria"=>0,
					"ofertaPorMarca"=>0,
					"idCategoria"=>$categoria,
					"idMarca"=>htmlentities($_POST["idmarca"]),
					"idProducto"=>htmlentities($_POST["idProducto"])
				);

				 var_dump($datos);

				$respuesta=ModeloProductos::mdleditarProductoseleccionado($datos);

				var_dump($respuesta);

				if ($respuesta=="ok") {
					echo '<script> 

							swal({
								  title: "¡BIEN!",
								  text: "¡Producto  guardado!!",
								  type:"success",
								  confirmButtonText: "Ok",
								   confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
				}else{
					echo 'swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema al registrar el producto!",
									  type:"error",
									  confirmButtonText: "OK",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});
								</script>';
				}
			}

		}


}