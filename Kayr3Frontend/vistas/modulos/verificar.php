<!--=====================================
VERIFICAR
======================================-->

<?php

	$usuarioVerificado = false;
	
	$item = "emailEncriptado";
	$valor =  $rutas[1];

	$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	if($valor == $respuesta["emailEncriptado"]){

		$idUsuario = $respuesta["idUsuario"];
		$item2 = "verificacion";
		$valor2 = 0;

		$respuesta2 = ControladorUsuarios::ctrActualizarUsuario($idUsuario, $item2, $valor2);

		if($respuesta2 == "ok"){

			$usuarioVerificado = true;

		}

	}
		

?>


<div class="container">
	
	<div class="row">
	 
		<div class="col s12 center verificar">
			
			<?php

				if($usuarioVerificado){

					echo '<h2>Gracias</h2>
						<h4><small>¡Hemos verificado su correo electrónico, ya puede ingresar al sistema!</small></h4>

						<br>

						<a  class="modal-trigger" href="#Iniciar-session"><button class="btn colorSecundario backColor">INGRESAR</button></a>';
				

				}else{

					echo '<h3>Error</h3>

					<h4><small>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</small></h4>

					<br>

					<a href="#Registro-de-usuario" class="modal-trigger"><button class="btn colorSecundario">REGISTRO</button></a>';


				}

			?>

		</div>

	</div>

</div>