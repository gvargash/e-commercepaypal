<?php 
require_once "conexion.php";

class ModeloPedido
{

	/*=============================================
		NUEVO PEDIO 
	=============================================*/

	static public function mdlRegistrarPedido($NumeroPedido,$ruta,$envio,$idUsuario,$SubTotal,$CostoEnvio,$IGV,$total,$metodo,$cantidad,$precio,$idProducto){
			try {

	
				$cn=Conexion::conectar();
				$cn->beginTransaction(); 
				$stmt=$cn->prepare("INSERT INTO pedido(FechaPedido,NumeroPedido,ruta,envio, idUsuario, SubTotal, CostoEnvio, IGV, total,metodo)
					VALUES(NOW(),:NumeroPedido,:ruta,:envio,:idUsuario,:SubTotal,:CostoEnvio,:IGV, :total,:metodo)"); 
			
				$stmt->bindParam(":NumeroPedido",$NumeroPedido,PDO::PARAM_STR);
				$stmt->bindParam(":ruta",$ruta,PDO::PARAM_STR);
				$stmt->bindParam(":envio", $envio,PDO::PARAM_INT);
				$stmt->bindParam(":idUsuario",$idUsuario,PDO::PARAM_INT);
				$stmt->bindParam(":SubTotal",$SubTotal,PDO::PARAM_STR);
				$stmt->bindParam(":CostoEnvio",$CostoEnvio,PDO::PARAM_STR);
				$stmt->bindParam(":IGV",$IGV,PDO::PARAM_STR);
				$stmt->bindParam(":total",$total,PDO::PARAM_STR);
				$stmt->bindParam(":metodo",$metodo,PDO::PARAM_STR);			
				$stmt->execute();
			    $lastId = $cn->lastInsertId();
				$stmt=$cn->prepare("INSERT INTO detallepedido(cantidad, Precio, idPedido, idProducto) 
										VALUES(:cantidad,:Precio,:idPedido,:idProducto)"); 	

				for ($i=0; $i <sizeof($cantidad) ; $i++) { 
					$stmt->execute(array(':cantidad'=>$cantidad[$i],':Precio'=>$precio[$i],':idPedido'=>$lastId,':idProducto'=>$idProducto[$i]));
		
					
				}
				
				if ($cn->commit()){
					
					return "ok";
				}else{

					return "error";
				}
				

			} catch (PDOException $e) {
				$cn->rollBack();
				 echo "ERRO ::" .$e->getMessage();
			}
				
	}
	
	
	/*=============================================
	DIRECCION DE ENTREGA
	=============================================*/

	static public function mdlRegistrarDireccionPedido($tabla,$datos){



	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CelularClie,Telefono,direccion,Referencia,Departamento,Provincia,Distrito,Estado,idUsuario)
											VALUES(:CelularClie,:Telefono,:Direccion,:Referencia,:Departamento,:Provincia,:Distrito,:Estado,:idUsuario)");
		
		$stmt->bindParam(":CelularClie", $datos["Celular"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":Provincia", $datos["Provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":Distrito",$datos["Distrito"],PDO::PARAM_STR);
		$stmt->bindParam(":Estado",$datos["Estado"],PDO::PARAM_STR);
		$stmt->bindParam(":idUsuario",$datos["idUsuario"],PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}




	/*=============================================
	MOSTRAR DETALLE PEDIDO
	=============================================*/

	static public function mdlDetallePedido($item,$valor){
				$stmt = Conexion::conectar()->prepare("SELECT idPedido,ruta,NumeroPedido,FechaPedido,SubTotal,CostoEnvio,IGV,total FROM pedido where $item=:$item");
		
					$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

					$stmt->execute();

					return $stmt -> fetch();
			$stmt->close();
			$stmt=null; 
	}

	/*=============================================
	MOSTRAR DETALLE PEDIDO secundario
	=============================================*/
    static public function mdlDetallePedidoSecundario($valor){

    	$stmt=Conexion::conectar()->prepare("CALL detallePedido(?)");

    	$stmt->bindParam(1,$valor);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
    }


	/*=============================================
	MOSTRAR datos bancarios
	=============================================*/
	public function mdlDatosBancarios(){
		$stmt=Conexion::conectar()->prepare("SELECT Banco,NumeroDeCuenta,PropietarioCU FROM comercio");

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt=null;
	}

}