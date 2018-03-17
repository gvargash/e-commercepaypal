<?php 

class ControladorDireccion
{
	
	public function ctrPedidoDireccion(){

			if (isset($_POST["celular_di"])) {
				#datos tabla a
			$datos = array(
				"Celular"=>$_POST["celular_di"],
				"Telefono"=>$_POST["telefono_di"],
				"Direccion"=>$_POST["direccion_di"],
				"Referencia"=>$_POST["referencia_di"],
				"Departamento"=>$_POST["departamento_di"],
				"Provincia"=>$_POST["provincia_di"],
				"Distrito"=>$_POST["distrito_di"],
				"Estado"=>1,
				"idUsuario"=>$_SESSION["idUsuario"]
				);
						
				$tabla = "direcciondeentrega";

				$respuesta = ModeloPedido::mdlRegistrarDireccionPedido($tabla,$datos);	

				if ($respuesta=="ok") {
					echo'<script>

							swal({
								  title: "¡Bien!",
								  text: "¡Dirección de entrega registrado con exito!",
								  type: "success",
								  confirmButtonText: "Ok",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location="detallebancarios";
									  } 
							});

							</script>';
				}else{
					echo'<script>

							swal({
								  title: "¡Intentalo nuevamente!",
								  text: "¡Estamso teniendo un inconveniente en conectar con el servidor.Intentalo nuevamente, por favor!",
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


   static public function ctrUpdateDireccion($datos){

   		$tabla="direcciondeentrega";
   		
   		$respuesta=DireccionDeEntrega::mdlUpdateDireccionPedido($tabla,$datos);

   		return $respuesta;
   }
}