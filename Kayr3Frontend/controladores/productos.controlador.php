<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

static public function ctrMostrarCategorias($item,$valor){

		$tabla = "categoria";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla,$item,$valor);

		return $respuesta;

	}

/*=============================================
MOSTRAR MARCAS
=============================================*/

static public function ctrMostrarMarcas($item,$valor){

		$tabla = "marca";

		$respuesta = ModeloProductos::mdlMostrarMarcas($tabla,$item,$valor);

		return $respuesta;

	}
/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($ordenar, $item, $valor,$base,$tope,$modo)
	{
		$tabla="producto";

		$respuesta=ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor,$base,$tope,$modo);
		return $respuesta;

	}
/*=============================================
	MOSTRAR INFOPRODUCTO
	=============================================*/

	static public function ctrMostrarInfoProducto($item, $valor){

		$tabla = "producto";

		$respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
	MOSTRAR MARCA PRODUCTOS
	=============================================
	static public function mdlMostrarMarcaProducto($item, $valor)
	{
		$tabla="marca";

		$respuesta=ModeloProductos::mdlMostrarInfoProductos($tabla,$item,$valor);
		return $respuesta;
	}*/

/*=============================================
	LISTAR PRODUCTOA
	=============================================*/
	static public function ctrListarProductos($ordenar,$item,$valor)
	{
		$tabla ="producto";
		$respuesta=ModeloProductos::mdlListarProductos($tabla,$ordenar,$item,$valor);
		return $respuesta;
	}


/*=============================================
	MOSTRAR BANNER
	=============================================*/

	static public function ctrMostrarBanner($ruta){

		$tabla = "banner";

		$respuesta = ModeloProductos::mdlMostrarBanner($tabla, $ruta);

		return $respuesta;

	}


	/*=============================================
		BUSCADOR
	=============================================*/
	static public function ctrBuscarProductos($busqueda,$ordenar,$modo,$base,$tope)
	{
		$tabla="producto";
		$respuesta=ModeloProductos::mdlBuscarProductos($tabla,$busqueda,$ordenar,$modo,$base,$tope);
		return $respuesta;
	}

/*=============================================
		BUSCADOR
	=============================================*/
	static public function ctrListarProductosBusqueda($busqueda)
	{
		$tabla="producto";
		$respuesta=ModeloProductos::mdlListarProductosBusqueda($tabla,$busqueda);
		return $respuesta;
	}


	/*=============================================
	ACTUALIZAR VISTA PRODUCTO
	=============================================*/

	static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2){

		$tabla = "producto";

		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}

}