<?php

class ControladorUsuarios{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	public function ctrRegistroUsuario(){

		if(isset($_POST["regNombre"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regNombre"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellido"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["regClave"])){

			   	$encriptar = crypt($_POST["regClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	$encriptarEmail = md5($_POST["regEmail"]);

	$datos = array("NombreUsu"=>$_POST["regNombre"],
				   "ApellidoUsu"=>$_POST["regApellido"],
				   "DNI"=>"",
				   "CorreoUsu"=>$_POST["regEmail"],
				   "claveUsu"=>$encriptar,
				   "fotoUsu"=>"",
				   "EstadoUsu"=> 1,
				   "idTipo"=>"UKA02",
				   "verificacion"=>1,
				   "modo"=>"directo",
				   "emailEncriptado"=>$encriptarEmail);

				$tabla = "usuario";

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla,$datos);
				
				if ($respuesta=="ok") {
					/*=============================================
					VERIFICAR CORREO ELECTRONICO
					=============================================*/
					date_default_timezone_set("America/Lima");
					$url = Ruta::ctrRuta();	
					$mail=new PHPMailer;
					$mail->CharSet='UTF-8';
					$mail->isMail();
					$mail->setFrom('gvargash2@gmail.com','KAYR3 S.A.C');
					$mail->addReplyTo('gvargash2@gmail.com','KAYR3 S.A.C');
					$mail->Subject="Por favor verifique su dirección de correo electronico";
					$mail->addAddress($_POST["regEmail"]);
					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
										<center>
											
											<img style="https://scontent.flim5-3.fna.fbcdn.net/v/t1.0-9/24312367_123439348439965_9045541530429996528_n.jpg?oh=20617705950c07b466c989b35dbce257&oe=5A8F2035">

										</center>

										<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
										
											<center>
											
											<img style="padding:20px; width:15%" src="https://cdn4.iconfinder.com/data/icons/ikooni-outline-seo-web/128/seo-44-128.png">

											<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

											<hr style="border:1px solid #ccc; width:80%">

											<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de KAYR3 S.A.C, debe confirmar su dirección de correo electrónico</h4>

											<a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration:none">

											<div style="line-height:60px; background:#e040fb; width:60%; color:white">Verifique su dirección de correo electrónico</div>

											</a>

											<br>

											<hr style="border:1px solid #ccc; width:80%">

											<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

											</center>

										</div>

									</div>');
					$envio = $mail->Send();

					if(!$envio){

						echo '<script> 
								swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
									  type:"error",
									  confirmButtonText: "OK",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});
								</script>';
				}else{
					echo '<script> 

							swal({
								  title: "¡BIEN!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
								  type:"success",
								  confirmButtonText: "Ok",
								   confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';	
				}
			}
		}else{
			echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';
		}
	}
}

		/*=============================================
		MOSTRAR USUARIOS
		=============================================*/
		
	static	public function ctrMostrarUsuario($item,$valor)
		{
			$tabla="usuario";
			$respuesta=ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

			return $respuesta;
		}
	
	/*=============================================
		actualizar USUARIOS
		=============================================*/
	 static public function ctrActualizarUsuario($idUsuario,$item,$valor)
		{
			$tabla="usuario";
			$respuesta=ModeloUsuarios::mdlActualizarUsuario($tabla,$idUsuario,$item,$valor);

			return $respuesta;
		}
		
	/*=============================================
	=            INGRESO USUARIO           =
	=============================================*/

	public function ctrIngresoUsuario()
	{
		if (isset($_POST["ingEmail"])) {
			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingClave"])){

				$encriptar = crypt($_POST["ingClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$tabla="usuario";
				$item="CorreoUsu";
				$valor=$_POST["ingEmail"];
				$respuesta=ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

				if ($respuesta["CorreoUsu"]==$_POST["ingEmail"] && $respuesta["claveUsu"]==$encriptar) {
					
					if ($respuesta["verificacion"]==1) {
						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["CorreoUsu"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  confirmButtonColor: "#e040fb",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';
					}else{

						$_SESSION["validarSession"]="ok";
						$_SESSION["idUsuario"]=$respuesta["idUsuario"];
						$_SESSION["nombre"]=$respuesta["NombreUsu"];
						$_SESSION["apellido"]=$respuesta["ApellidoUsu"];
						$_SESSION["foto"]=$respuesta["fotoUsu"];
						$_SESSION["email"]=$respuesta["CorreoUsu"];
						$_SESSION["dni"]=$respuesta["DNI"];
						$_SESSION["clavePE"]=$respuesta["claveUsu"];
						$_SESSION["modo"]=$respuesta["modo"];

						echo '<script>
							window.location=localStorage.getItem("rutaActual");
							</script>';

					}
				}else{
					echo '<script> 

						swal({
							  title: "¡ERROR AL INGRESAR!",
							  text: "¡Por favor revisa que el email exista o la contraseña coincida con la registrada!",
							  type:"error",
							  confirmButtonText: "Ok",
							  confirmButtonColor: "#e040fb",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

						</script>';
				}


			}else{
				echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										window.location=localStorage.getItem("rutaActual");
									}
							});

							</script>';
			}
		}
	}

		/*=============================================
			OLVIDE CONTRASEÑA
		=============================================*/
		
		public function ctrOlvidoPassword()
		{
			if (isset($_POST["passEmail"])){

				if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){


				/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/
				 function generarPassword($longitud)
					{
							$key="";

							$pattern="1234567890abcdefghijklmnopqrstuvwxyz";

							$max=strlen($pattern)-1;

							for ($i=0; $i < $longitud; $i++) { 
								$key.=$pattern{mt_rand(0,$max)};
							}

							return $key;
					}

				$nuevaPassword = generarPassword(11);

				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuario";

				$item1 = "CorreoUsu";
				$valor1 = $_POST["passEmail"];

				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);
						if ($respuesta1) {
							$idUsuario=$respuesta1["idUsuario"];
							$item2="claveUsu";
							$valor2=$encriptar;
							$respuesta2=ModeloUsuarios::mdlActualizarUsuario($tabla,$idUsuario,$item2,$valor2);
								if ($respuesta2=="ok") {
										/*=============================================
										CAMBIO DE CONTRASEÑA
										=============================================*/
										date_default_timezone_set("America/Lima");
										$url = Ruta::ctrRuta();	
										$mail=new PHPMailer;
										$mail->CharSet='UTF-8';
										$mail->isMail();
										$mail->setFrom('gvargash2@gmail.com','KAYR3 S.A.C');
										$mail->addReplyTo('gvargash2@gmail.com','KAYR3 S.A.C');
										$mail->Subject="Solicitud de nueva contraseña";
										$mail->addAddress($_POST["passEmail"]);
										$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
												<center>
													
													<img style="padding:20px; width:10%" src="https://scontent.flim5-3.fna.fbcdn.net/v/t1.0-9/24312367_123439348439965_9045541530429996528_n.jpg?oh=20617705950c07b466c989b35dbce257&oe=5A8F2035">

												</center>

												<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
												
													<center>
													
													<img style="padding:20px; width:15%" src="https://cdn1.iconfinder.com/data/icons/e-commerce-online-shopping-4-1/64/x-11-2-128.png">

													<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

													<hr style="border:1px solid #ccc; width:80%">

													<h4 style="font-weight:100; color:#999; padding:0 20px">
													<strong>Su nueva contraseña: </strong>'.$nuevaPassword.'</h4>

													<a href="'.$url.'" target="_blank" style="text-decoration:none">

													<div style="line-height:60px; background:#e040fb; width:60%; color:white">Ingrese nuevamente al sitio</div>

													</a>

													<br>

													<hr style="border:1px solid #ccc; width:80%">

													<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

													</center>

												</div>

											</div>');
										$envio = $mail->Send();

									if(!$envio){

										echo '<script> 
												swal({
													  title: "¡ERROR!",
													  text: "¡Ha ocurrido un problema enviando cambio de contraseña '.$_POST["passEmail"].$mail->ErrorInfo.'!",
													  type:"error",
													  confirmButtonText: "OK",
													  confirmButtonColor:"#e040fb",
													  closeOnConfirm: false
													},

													function(isConfirm){

														if(isConfirm){
															history.back();
														}
												});
												</script>';
								}else{
									echo '<script> 

											swal({
												  title: "¡BIEN!",
												  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["passEmail"].' para verificar su cambio de contraseña!",
												  type:"success",
												  confirmButtonText: "Ok",
												   confirmButtonColor:"#e040fb",
												  closeOnConfirm: false
												},

												function(isConfirm){

													if(isConfirm){
														history.back();
													}
											});

										</script>';	
								}
							}

						}else{
							echo '<script> 

									swal({
										  title: "¡ERROR!",
										  text: "¡El correo no existe en el sistema!",
										  type:"error",
										  confirmButtonText: "Ok",
										  confirmButtonColor:"#e040fb",
										  closeOnConfirm: false
										},

										function(isConfirm){

											if(isConfirm){
												window.location=localStorage.getItem("rutaActual");
											}
									});

									</script>';
						}

				}else{
					echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Error al enviar el correo electronico, esta mal escrito!",
								  type:"error",
								  confirmButtonText: "Ok",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										window.location=localStorage.getItem("rutaActual");
									}
							});

							</script>';
				}

		}
	}



	/*=============================================
		REGISTRO CON REDES SOCIALES
	=============================================*/
	
	static public function ctrRegistroRedesSociales($datos)
	{
		$tabla="usuario";
		
		$item="CorreoUsu";

		$valor=$datos["CorreoUsu"];

		$emailRepetido=false;

		$respuesta0=ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

		if ($respuesta0) {
				if ($respuesta0["modo"]!=$datos["modo"]) {
					echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡El correo electronico '.$datos["CorreoUsu"].', ya está registrado en el sistema con un método diferente  a Google!",
								  type:"error",
								  confirmButtonText: "Ok",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

							</script>';
							$emailRepetido=false;
				}
				$emailRepetido = true;
		}else{

			$respuesta1 = ModeloUsuarios::mdlRegistroUsuario($tabla,$datos);
		}


		if ($emailRepetido || $respuesta1=="ok") {
			
			$respuesta2=ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

			if($respuesta2["modo"]=="facebook")
			{
				session_start();

				$_SESSION["validarSession"]="ok";
				$_SESSION["idUsuario"]=$respuesta2["idUsuario"];
				$_SESSION["nombre"]=$respuesta2["NombreUsu"];
				$_SESSION["foto"]=$respuesta2["fotoUsu"];
				$_SESSION["email"]=$respuesta2["CorreoUsu"];
				$_SESSION["clave"]=$respuesta2["claveUsu"];
				$_SESSION["modo"]=$respuesta2["modo"];
				
				echo "ok";

			}else if($respuesta2["modo"]=="google")
			{
				$_SESSION["validarSession"]="ok";
				$_SESSION["idUsuario"]=$respuesta2["idUsuario"];
				$_SESSION["nombre"]=$respuesta2["NombreUsu"];
				$_SESSION["foto"]=$respuesta2["fotoUsu"];
				$_SESSION["email"]=$respuesta2["CorreoUsu"];
				$_SESSION["clave"]=$respuesta2["claveUsu"];
				$_SESSION["modo"]=$respuesta2["modo"];
				
				echo "<span style='display:none;'>ok</span>";

			}

			else{
				echo "";
			}
		}
	}

	/*=============================================
		ACTUALIZAR PERFIL
	=============================================*/
	public function ctrActualizarPerfil()
	{

		if (isset($_POST["editarNombre"])) {

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/
			if (isset($_FILES["datosImagen"]["tmp_name"])) 
				{
					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["idUsuario"];

					if(!empty($_POST["Foto"])){

						unlink($_POST["Foto"]);
					
					}else{

						mkdir($directorio, 0755);

					}
					/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$aleatorio = mt_rand(100, 999);

				$ruta = "vistas/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".jpg";


				/*=============================================
				MOFICAMOS TAMAÑO DE LA FOTO
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);


				}


			if ($_POST["editarClave"]=="") {
					$clave=$_POST["claveusuario"];
				}else{
					$clave=crypt($_POST["editarClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				}

			$datos=array('NombreUsu' =>$_POST["editarNombre"] , 
						'ApellidoUsu' =>$_POST["editarApellido"] , 
						'DNI' => $_POST["editarDni"], 
						'CorreoUsu'=>$_POST["editarEmail"],
						'claveUsu'=>$clave,
						'fotoUsu'=>$ruta,
						'idUsuario'=>$_POST["idUsuario"]);
			$tabla="usuario";
			$respuesta=ModeloUsuarios::mdlActualizarPerfil($tabla,$datos);
			if ($respuesta=="ok") {
				$_SESSION["validarSession"]="ok";
				$_SESSION["idUsuario"]=$datos["idUsuario"];
				$_SESSION["nombre"]=$datos["NombreUsu"];
				$_SESSION["apellido"]=$datos["ApellidoUsu"];
				$_SESSION["foto"]=$datos["fotoUsu"];
				$_SESSION["email"]=$datos["CorreoUsu"];
				$_SESSION["dni"]=$datos["DNI"];
				$_SESSION["clavePE"]=$datos["claveUsu"];
				$_SESSION["modo"]=$_POST["modoUsuario"];

				echo '<script> 

							swal({
								  title: "¡BIEN!",
								  text: "¡Su cuenta ha sido actualizada correctamente!",
								  type:"success",
								  confirmButtonText: "Ok",
								  confirmButtonColor:"#e040fb",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

							</script>';
			}
		}
	}

	/*=============================================
	=           MOSTRAR COMPARAS           =
	=============================================*/
   static	public function ctrMostrarCompras($item,$valor)
		{
			$tabla="pedido";
			$respuesta=ModeloUsuarios::mdlMostrarCompras($tabla,$item,$valor);

			return $respuesta;
		}


	/*=============================================
	AGREGAR A LISTA DE DESEOS
	=============================================*/

	static public function ctrAgregarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlAgregarDeseo($tabla, $datos);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR LISTA DE DESEOS
	=============================================*/

	static public function ctrMostrarDeseos($item){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlMostrarDeseos($tabla, $item);

		return $respuesta;

	}
	
	/*=============================================
	QUITAR PRODUCTO DE LISTA DE DESEOS
	=============================================*/
	static public function ctrQuitarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlQuitarDeseo($tabla, $datos);

		return $respuesta;

	}

	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	public function ctrEliminarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla1 = "usuario";		
			$tabla2 = "pedido";
			$tabla3 = "deseos";

			$idUsuario = $_GET["idUsuario"];

			if($_GET["fotoUsu"]!= ""){

				unlink($_GET["fotoUsu"]);
				rmdir('vistas/img/usuarios/'.$_GET["idUsuario"]);

			}

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla1, $idUsuario);

						ModeloUsuarios::mdlEliminarCompras($tabla2, $idUsuario);

						ModeloUsuarios::mdlEliminarListaDeseos($tabla3, $idUsuario);

			if($respuesta == "ok"){

		    	$url = Ruta::ctrRuta();

		    	echo'<script>

						swal({
							  title: "¡SU CUENTA HA SIDO BORRADA!",
							  text: "¡Debe registrarse nuevamente si desea ingresar!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  confirmButtonColor:"#C407C6",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								   window.location = "'.$url.'salir";
								  } 
						});

					  </script>';

		    }

		}

	}


	static public function ctrMostrarDireccion(){

		$tabla="direcciondeentrega";

		$respuesta=ModeloUsuarios::mdlDireccionDeentrega($tabla);
		
		return  $respuesta;

	}

	
}