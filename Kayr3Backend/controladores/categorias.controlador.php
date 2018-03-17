<?php 
class ControladorCategoria{
    

	static public function ctrListarCategoria(){
		$tabla="categoria";


		$respuesta=ModeloCategoria::mdlListarCategoria($tabla);

		return $respuesta;
	}



	static public function ctrMostrarCategoria($item,$valor){
		$tabla="categoria";
		$respuesta=ModeloCategoria::mdlMostraCategoria($tabla,$item,$valor);

		return $respuesta;
	}


	static public function ctrActualizarCategoria($datos){
		$tabla="categoria";

		$respuesta=ModeloCategoria::mdlActualizarCategoria($tabla,$datos);

		return $respuesta;
	}



	static public function ctrAgregarCategoria($datos){

		$tabla="categoria";

		$respuesta=ModeloCategoria::mdlAgregarCategoria($tabla,$datos);

		return $respuesta;

	}


	static public function ctrEliminaCategoria($datos){
		$tabla="categoria";

		$respuesta=ModeloCategoria::mdlEliminarCategoria($tabla,$datos);

		return $respuesta;
	}
}