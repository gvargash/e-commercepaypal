<?php

class ControladorVentas{

	/*=============================================
	MOSTRAR PEDIDOS
	=============================================*/

  public function ctrListarPedidos($item){

  	$tabla="pedido";

  	$respuesta=ModeloVentas::mdlListarPedidos($tabla,$item);

  	return $respuesta;
  }


	/*=============================================
	MOSTRAR TOTAL VENTAS
	=============================================*/

	public function ctrMostrarTotalVentas(){

		$tabla = "pedido";

		$respuesta = ModeloVentas::mdlMostrarTotalVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	public function ctrMostrarVentas(){

		$tabla = "pedido";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla);

		return $respuesta;

	}



	/*=============================================
		MOSTRAR DETALLE PEDIDO
		=============================================*/


		static public function crtPedidoDetalle($item, $valor){

				$respuesta = ModeloVentas::mdlDetallePedido($item, $valor);

				return $respuesta;
		}


		/*=============================================
		MOSTRAR DETALLE PEDIDO SECUNDARIO
		=============================================*/

		static public function crtPedidoDetalleSecundario($valor){

			$respuesta = ModeloVentas::mdlDetallePedidoSecundario($valor);

			return $respuesta;
		}



		/*=============================================
		DATOS BANCARIOS
		=============================================*/

		public function crtDatosBancarios(){
			$respuesta=ModeloVentas::mdlDatosBancarios();

			return $respuesta;
		}




	static public function ctrAnularPedido($datos){
		$tabla="pedido";

		$respuesta=ModeloVentas::mdlAnulaPedido($tabla,$datos);

		return $respuesta;
	}


	static public function ctrAceptarPedido($datos){
		$tabla="pedido";

		$respuesta=ModeloVentas::mdlAceptarPedido($tabla,$datos);

		return $respuesta;
		
	}



		static public function ctrCompletarPedido($datos){
		$tabla="pedido";

		$respuesta=ModeloVentas::mdlCompletarPedido($tabla,$datos);

		return $respuesta;
	}
}