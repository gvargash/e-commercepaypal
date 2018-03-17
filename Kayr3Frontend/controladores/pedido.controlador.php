<?php 

class ControladorPedidos
{
	
	
		public function ctrPedidoProducto(){

			
			if (isset($_POST["subtotalco"])) {
				
							$NumeroPedido=null;
							$ruta=null;
							$envio=0;
							$idUsuario=$_SESSION["idUsuario"];
							$SubTotal=$_POST["subtotalco"];
							$CostoEnvio=$_POST["costoEnvioco"];
							$IGV=$_POST["igvco"];
							$total=$_POST["totalco"];
							$metodo="directo";
							
							$cantidad=$_POST['cantidadde'];
							$precio=$_POST['preciode'];
							$idProducto=$_POST['idproductode'];
				


				

				$respuesta=ModeloPedido::mdlRegistrarPedido($NumeroPedido,$ruta,$envio,$idUsuario,$SubTotal,$CostoEnvio,$IGV,$total,$metodo,$cantidad,$precio,$idProducto);

				if ($respuesta=="ok") {
					echo'<script>

							swal({
								  title: "¡Pedido realizado con exito!",
								  text: "¡Por favor Ingrese o atualize sus datos para la entrega del producto!",
								  type: "success",
								  confirmButtonText: "Ok",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    localStorage.removeItem("listaProductos");
									    localStorage.removeItem("cantidadCesta");
									    window.location="direccion";
									  } 
							});

							</script>';
				}else{
					echo'<script>

							swal({
								  title: "¡Intentalo nuevamente!",
								  text: "¡Estamso teniendo un inconveniente en conectar con el servidor. Intentalo nuevamente, por favor!",
								  type: "error",
								  confirmButtonText: "OK",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';
				}

			}
		}



		/*=============================================
		MOSTRAR DETALLE PEDIDO
		=============================================*/


		static public function crtPedidoDetalle($item, $valor){

				$respuesta = ModeloPedido::mdlDetallePedido($item, $valor);

				return $respuesta;
		}


		/*=============================================
		MOSTRAR DETALLE PEDIDO SECUNDARIO
		=============================================*/

		static public function crtPedidoDetalleSecundario($valor){

			$respuesta = ModeloPedido::mdlDetallePedidoSecundario($valor);

			return $respuesta;
		}



		/*=============================================
		DATOS BANCARIOS
		=============================================*/

		public function crtDatosBancarios(){
			$respuesta=ModeloPedido::mdlDatosBancarios();

			return $respuesta;
		}
}
