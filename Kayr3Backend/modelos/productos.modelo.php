<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR EL TOTAL DE VENTAS
	=============================================*/	

	static public function mdlMostrarTotalProductos($tabla, $orden){
	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}



	static public function mdlAgregarProductos($datos){
		$stmt=Conexion::conectar()->prepare("CALL STP_INSERTARPRODUCTO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

			$stmt->bindParam(1,$datos["NombreProducto"],PDO::PARAM_STR); 
			$stmt->bindParam(2,$datos["Color"],PDO::PARAM_STR); 
			$stmt->bindParam(3,$datos["Rendimiento"],PDO::PARAM_STR); 
			$stmt->bindParam(4,$datos["TipoCartucho"],PDO::PARAM_STR); 
			$stmt->bindParam(5,$datos["SKU"],PDO::PARAM_STR); 
			$stmt->bindParam(6,$datos["Modelo"],PDO::PARAM_STR); 
			$stmt->bindParam(7,$datos["Peso"],PDO::PARAM_STR);
			$stmt->bindParam(8,$datos["GarantiadeProducto"],PDO::PARAM_STR); 
			$stmt->bindParam(9,$datos["Compatibilidad"],PDO::PARAM_STR); 
			$stmt->bindParam(10,$datos["TecnologiaImpresion"],PDO::PARAM_STR); 
			$stmt->bindParam(11,$datos["PrecioOriginal"],PDO::PARAM_STR); 
			$stmt->bindParam(12,$datos["PrecioKayre"],PDO::PARAM_STR); 
			$stmt->bindParam(13,$datos["Stock"],PDO::PARAM_INT); 
			$stmt->bindParam(14,$datos["Estado"],PDO::PARAM_INT); 
			$stmt->bindParam(15,$datos["Descripcion"],PDO::PARAM_STR); 
			$stmt->bindParam(16,$datos["ruta"],PDO::PARAM_STR); 
			$stmt->bindParam(17,$datos["vistas"],PDO::PARAM_INT); 
			$stmt->bindParam(18,$datos["ventas"],PDO::PARAM_INT); 
			$stmt->bindParam(19,$datos["oferta"],PDO::PARAM_INT); 
			$stmt->bindParam(20,$datos["nuevo"],PDO::PARAM_INT); 
			$stmt->bindParam(21,$datos["precioOfferta"],PDO::PARAM_STR); 
			$stmt->bindParam(22,$datos["imagenOfferta"],PDO::PARAM_STR); 
			$stmt->bindParam(23,$datos["finOferta"],PDO::PARAM_STR); 
			$stmt->bindParam(24,$datos["descuentoOferta"],PDO::PARAM_STR);
			$stmt->bindParam(25,$datos["imagen"],PDO::PARAM_STR); 
			$stmt->bindParam(26,$datos["ofertaPorCategoria"],PDO::PARAM_STR); 
			$stmt->bindParam(27,$datos["ofertaPorMarca"],PDO::PARAM_STR); 
			$stmt->bindParam(28,$datos["idCategoria"],PDO::PARAM_STR); 
			$stmt->bindParam(29,$datos["idMarca"],PDO::PARAM_STR); 
			$stmt->bindParam(30,$datos["fecha"],PDO::PARAM_STR);	

			if($stmt->execute()){

			return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;
				
		}





		static public function mdlmostrarParaEditar($tabla,$item,$valor){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

			$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;
		}



		static public function mdleditarProductoseleccionado($datos){

				$stmt=Conexion::conectar()->prepare("CALL STP_ACTUALIZARARPRODUCTO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
			$stmt->bindParam(30,$datos["idProducto"],PDO::PARAM_STR); 
			$stmt->bindParam(1,$datos["NombreProducto"],PDO::PARAM_STR); 
			$stmt->bindParam(2,$datos["Color"],PDO::PARAM_STR); 
			$stmt->bindParam(3,$datos["Rendimiento"],PDO::PARAM_STR); 
			$stmt->bindParam(4,$datos["TipoCartucho"],PDO::PARAM_STR); 
			$stmt->bindParam(5,$datos["SKU"],PDO::PARAM_STR); 
			$stmt->bindParam(6,$datos["Modelo"],PDO::PARAM_STR); 
			$stmt->bindParam(7,$datos["Peso"],PDO::PARAM_STR);
			$stmt->bindParam(8,$datos["GarantiadeProducto"],PDO::PARAM_STR); 
			$stmt->bindParam(9,$datos["Compatibilidad"],PDO::PARAM_STR); 
			$stmt->bindParam(10,$datos["TecnologiaImpresion"],PDO::PARAM_STR); 
			$stmt->bindParam(11,$datos["PrecioOriginal"],PDO::PARAM_STR); 
			$stmt->bindParam(12,$datos["PrecioKayre"],PDO::PARAM_STR); 
			$stmt->bindParam(13,$datos["Stock"],PDO::PARAM_INT); 
			$stmt->bindParam(14,$datos["Estado"],PDO::PARAM_INT); 
			$stmt->bindParam(15,$datos["Descripcion"],PDO::PARAM_STR); 
			$stmt->bindParam(16,$datos["ruta"],PDO::PARAM_STR); 
			$stmt->bindParam(17,$datos["vistas"],PDO::PARAM_INT); 
			$stmt->bindParam(18,$datos["ventas"],PDO::PARAM_INT); 
			$stmt->bindParam(19,$datos["oferta"],PDO::PARAM_INT); 
			$stmt->bindParam(20,$datos["nuevo"],PDO::PARAM_INT); 
			$stmt->bindParam(21,$datos["precioOfferta"],PDO::PARAM_STR); 
			$stmt->bindParam(22,$datos["imagenOfferta"],PDO::PARAM_STR); 
			$stmt->bindParam(23,$datos["finOferta"],PDO::PARAM_STR); 
			$stmt->bindParam(24,$datos["descuentoOferta"],PDO::PARAM_STR);
			$stmt->bindParam(25,$datos["imagen"],PDO::PARAM_STR); 
			$stmt->bindParam(26,$datos["ofertaPorCategoria"],PDO::PARAM_STR); 
			$stmt->bindParam(27,$datos["ofertaPorMarca"],PDO::PARAM_STR); 
			$stmt->bindParam(28,$datos["idCategoria"],PDO::PARAM_STR); 
			$stmt->bindParam(29,$datos["idMarca"],PDO::PARAM_STR); 
		

			if($stmt->execute()){

			return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}
	
}


