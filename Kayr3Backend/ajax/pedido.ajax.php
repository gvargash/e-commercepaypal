<?php 
require_once "../controladores/pedidos.controldaro.php";
require_once "../modelos/pedido.modelo.php";

class AjaxPedido{

public $idPedido;
public $envio;
	/*=============================================
ADD MARCA
=============================================*/	
	public function ajaxAceptarPedido(){

		$datos = array("idPedido"=>$this->idPedido,
					    "envio"=>$this->envio);

		$respuesta = ControladorVentas::ctrAceptarPedido($datos);

		echo $respuesta;

	}

		/*=============================================
	UPDATE MARCA
	=============================================*/	


	public function ajaxAnularPedido(){

			$datos = array("idPedido"=>$this->idPedido,
						    "envio"=>$this->envio);

			$respuesta = ControladorVentas::ctrAnularPedido($datos);

			echo $respuesta;

		}


	public function ajaxCompletarPedido(){
		$datos = array("idPedido"=>$this->idPedido,
						    "envio"=>$this->envio);

			$respuesta = ControladorVentas::ctrCompletarPedido($datos);

			echo $respuesta;
	}
}



/*=============================================
ACEPTAR PEDIDO
=============================================*/	

if(isset($_POST["envio"])){

	$pedidoace = new AjaxPedido();
	$pedidoace -> idPedido = $_POST["idPedido"];
	$pedidoace -> envio = $_POST["envio"];
	$pedidoace -> ajaxAceptarPedido();

}



/*=============================================
ANULAR PEDIDO
=============================================*/	

if(isset($_POST["envio"])){

	$pedidoanu = new AjaxPedido();
	$pedidoanu -> idPedido = $_POST["idPedido"];	
	$pedidoanu -> envio = $_POST["envio"];
	$pedidoanu -> ajaxAnularPedido();
}


/*=============================================
ANULAR COMPLETAR
=============================================*/	

if(isset($_POST["envio"])){

	$pedidoanu = new AjaxPedido();
	$pedidoanu -> idPedido = $_POST["idPedido"];	
	$pedidoanu -> envio = $_POST["envio"];
	$pedidoanu -> ajaxCompletarPedido();
}