<?php 
class ControladorMarca{
    

	static public function ctrListarMarca(){
		$tabla="marca";


		$respuesta=ModeloMarcas::mdlListarMarcas($tabla);

		return $respuesta;
	}


	static public function ctrMostrarMarca($item,$valor){
		$tabla="marca";
		$respuesta=ModeloMarcas::mdlMostraMarca($tabla,$item,$valor);

		return $respuesta;
	}


	static public function ctrActualizarMarca($datos){
		$tabla="marca";

		$respuesta=ModeloMarcas::mdlActualizarMarca($tabla,$datos);

		return $respuesta;
	}



	static public function ctrAgregarMarca($datos){

		$tabla="marca";

		$respuesta=ModeloMarcas::mdlAgregarMarca($tabla,$datos);

		return $respuesta;

	}


	static public function ctrEliminarMarca($datos){
		$tabla="marca";

		$respuesta=ModeloMarcas::mdlEliminarMarca($tabla,$datos);

		return $respuesta;
	}

}