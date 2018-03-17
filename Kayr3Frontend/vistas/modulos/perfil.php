<!--=====================================
VALIDAR SESIÓN
======================================-->
<?php
$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();
$ruta = $rutas[0];

if(!isset($_SESSION["validarSession"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

?>

<!--=====================================
=            PERFIL DE USUARIO          =
======================================-->
 <div class="container">
  	<div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a class="active" href="#Mis-compras">Mis pedidos</a></li>
              <li class="tab col s3"><a href="#Mi-lista-de-deseos">Mi Lista de deseos</a></li>
              <li class="tab col s3"><a href="#Mi-direccion">Mi Direccion </a></li>
              <li class="tab col s3"><a   href="#Mi-perfil">Editar perfil</a></li>
            </ul>
          </div>

          <!--=====================================
			=            SECCION MIS PEDIDOS          =
			======================================-->
          <div id="Mis-compras" class="row col s12">
          	<?php 
          		$item="idUsuario";
          		$valor=$_SESSION["idUsuario"];

          		$compras=ControladorUsuarios::ctrMostrarCompras($item,$valor);
          		if (!$compras) {
          			echo '<div class="container center">
								<div class="row ">
									<div class="col xs12 s12 m12 l12 center-align error404">
										<div class="row">
											<h1 id="errorText">¡Oops!</h1>
										<h2 id="errorText">Aún  no tienes compras realizadas en esta tienda</h2>
										</div>
									</div>
								</div>
							</div>';
          		}else{
          			foreach ($compras as $key => $valuec) {
          				 echo '<div class="col s12 m12" >
							     <table  class="centered responsive-table bordered">
							        <thead>
							          <tr>
							              <th>NUMERO PEDIDO</th>
							              <th>FECHA</th>
							              <th>ESTADO</th>
							              <th>CORREO</th>
							               <th>TOTAL</th>
							               <th>ACCION</th>
							          </tr>
							        </thead>

							        <tbody>
							          <tr>
							            <td>'.$valuec['NumeroPedido'].'</td>';
							            $fechapedido=date_create($valuec['FechaPedido']);
							            $fechapedido=date_format($fechapedido,'d-m-Y');

							            echo '<td>'.$fechapedido.'</td>';
							            if ($valuec['envio']==0) {
							            	echo '<td>En espera</td>';
							            }else if ($valuec['envio']==1) {
							            	echo '<td>Aceptado</td>';
							            }else{
							            	echo '<td>Completado</td>';
							            }

							         echo'<td>'.$valuec['CorreoUsu'].'</td>
							            <td>'.$valuec['total'].'</td>
							            <td><a href="'.$valuec['ruta'].'" style="color:#880e4f"><i class="fa fa-eye"></i></a></td>
							          </tr>
							        </tbody>
							      </table>
							      <br>
							      <br>
							      <br>
							  </div>
							  ';
          				}
          			}
          	 ?>
          </div>

          <!--=====================================
			=            SECCION LISTA DE DESEOS         =
			======================================-->

          <div id="Mi-lista-de-deseos" class="col s12 m12 l12">
          	<?php 
          	$item=$_SESSION["idUsuario"];

          	$deseos=ControladorUsuarios::ctrMostrarDeseos($item);

          		if (!$deseos) {
          			echo '<div class="container center">
								<div class="row ">
									<div class="col xs12 s12 m12 l12 center-align error404">
										<div class="row">
											<h1 id="errorText">¡Oops!</h1>
										<h2 id="errorText">Aún  no tienes productos en su lista de deseos</h2>
										</div>
									</div>
								</div>
							</div>';
          		}else{
          			foreach ($deseos as $key => $valueDeseos) {

          				$ordenar="idProducto";
          				$valor=$valueDeseos["idProducto"];
          				$item="idProducto";
          				$productos=ControladorProductos::ctrListarProductos($ordenar,$item,$valor);
          				
							foreach ($productos as $key => $value) {
							echo '<div class="card contenedorCard sticky-action col l3 m6 s12 center">
								    <a href="'.$value["ruta"].'"><div class="card-image waves-effect waves-block waves-light">
								     <img class="imgproducto" src="'.$servidor.$value["imagen"].'">
								    </div></a>
								    <div class="card-content car-content-personalizado">
								      <span class="card-title  grey-text text-darken-4">
											<p class="truncate">
												'.$value["NombreProducto"].'
											</p>
								      	</span>
								      	<h4>					
											<small>';
											if ($value["nuevo"]!=0)
											{
												echo '<span class="chip light-green accent-3">Nuevo</span>';
											}
											if ($value["oferta"]!=0) {
													echo '<span class="chip blue darken-1">'.$value["descuentoOferta"].'% OFF</span>';
												}	
											echo '					
											</small>
										</h4>
										<small>S/. '.$value["PrecioKayre"].'</small>
								    </div>
									<div class="card-action enlaces center">
								    	<button type="button" class="btn btn-danger btn-xs quitarDeseo tooltipped"  data-position="top" idDeseo="'.$valueDeseos["id"].'" data-delay="50" data-tooltip="Quitar de mi lista de deseos">
											<i class="fa fa-heart" aria-hidden="true"></i>
										</button>

										<a href="'.$value["ruta"].'" class="pixelProducto">
											<button type="bottom" class="btn btnProductoPerzonalizado tooltipped" data-position="top" data-delay="50" data-tooltip="Ver producto">
												
												<i class="fa fa-eye" aria-hidden="true"></i>
											</button>	
										</a>
								    </div>
								  </div>';
						}
          			}
          		}
          	 ?>

          </div>

                   <!--=====================================
			=            SECCION DIRECCION         =
			======================================-->

          <div id="Mi-direccion" class="col s12 m12 l12">
          	<?php 
          	$direccion=ControladorUsuarios::ctrMostrarDireccion();
			echo '<div class="container">
						   <!--FORMULARIO-DIRECCION START-->
								<h3 class="encabezado center">DATOS DE ENTREGA</h3>  
							<div class="col s12 center">
							        	<div class="row">
							            <div class="input-field col s6">
							              <input id="Celular" type="text" required name="Celular" value="'.$direccion["CelularClie"].'" >
							              <label for="Celular">Celular *</label>
							            </div>
							            <div class="input-field col s6">
							              <input id="telefono" type="text" required name="telefono" value="'.$direccion['Telefono'].'" >
							              <label for="Telefono">Telefono</label>
							            </div>
							        </div>
							        <div class="row">
							            <div class="input-field col s6">
							              <input id="direccion" type="text" required name="direccion" value="'.$direccion['Direccion'].'" >
							              <label for="direccion">Direccion *</label>
							            </div>
							            <div class="input-field col s6">
							              <input id="referencia" type="text" required name="referencia" value="'.$direccion['Referencia'].'" >
							              <label for="regferencia">Referencia *</label>
							            </div>
							         </div>
							    
							         <div class="row">
							            <div class="input-field col s6">
							              <input id="Departamento" type="text" required name="departamento"  value="'.$direccion['Departamento'].'" readonly>
							              <label for="Departamento">Departamento</label>
							            </div>
							            <div class="input-field col s6">
							              <input id="Provincia" type="text" required name="provincia"  value="'.$direccion['Provincia'].'" readonly>
							              <label for="Provincia">Provincia</label>
							            </div>
							        </div>
							        <div class="row">
							            <div class="input-field col s12">
							              <input type="text"  id="Distrito" name="distrito" required class="autocomplete" value="'.$direccion['Distrito'].'">
							              <label for="Distrito">Distrito *</label>

							              <input type="hidden" id="codUsuario" name="codUsuario" value="'.$direccion['idUsuario'].'">
							            </div>
							          
							        </div>
							        <div class="col s12 l6 center" style="margin-bottom: 30px;">
							        	 	<button type="submit" class="colorSecundario btn" id="btnatualizar">ACTUALIZAR DIRECCION</button>
							        </div>
						    	</div>
				      		<!--FORMULARIO-DIRECCION END-->
						</div>';
          		
          	 ?>

          </div>
            <!--=====================================
		=            SECCION DATOS USUARIO          =
		======================================-->
		 
          <div id="Mi-perfil" class="col s12">
       		<div class="row">
			    <form class="col s12" method="POST" enctype="multipart/form-data">
			      <div class="row">
			      	<div class="center" id="perfil">
			         	<?php 
			         		if ($_SESSION["modo"]=="directo") {
			         		echo '<input type="hidden" name="idUsuario" id="idUsuario" value="'.$_SESSION["idUsuario"].'">
			         		  <input type="hidden" name="claveusuario" value="'.$_SESSION["clavePE"].'">
			         		  <input type="hidden" id="fotoUsuario" name="Foto" value="'.$_SESSION["foto"].'">
			         		  <input type="hidden" name="Apellido" value="'.$_SESSION["apellido"].'">
			         		  <input type="hidden" name="Nombre" value="'.$_SESSION["nombre"].'">
			         		  <input type="hidden" name="Dni" value="'.$_SESSION["dni"].'">
			         		  <input type="hidden" id="modoUsuario" name="modoUsuario" value="'.$_SESSION["modo"].'">';
			         		}else{
			         			echo '<input type="hidden" id="idUsuario" name="idUsuario" value="'.$_SESSION["idUsuario"].'">
			         		  <input type="hidden" id="fotoUsuario" name="Foto" value="'.$_SESSION["foto"].'">
			         		  <input type="hidden" name="Nombre" value="'.$_SESSION["nombre"].'">
			         		  <input type="hidden" id="modoUsuario" name="modoUsuario" value="'.$_SESSION["modo"].'">';
			         		}




			         		if ($_SESSION["modo"]=="directo") {
			         			if ($_SESSION["foto"]!="") {
			         				echo '
								              <img class="responsive-img" id="imgPerfil" name="editarFoto" src="'.$url.$_SESSION["foto"].'">';
			         			}else{
			         				echo '
								              <img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png"  name="editarFoto" class="responsive-img" id="imgPerfil">
								         ';
			         				}
			         		}else{
			         			echo '
							            <img class="responsive-img" id="imgPerfil" src="'.$_SESSION["foto"].'">
							         ';
			         		}

			         	 ?>
			         	 <br>
			         	 <?php 
			         	 	if ($_SESSION["modo"]=="directo") {
			         	 		echo '<button type="button" class="btn colorSecundario" id="btnCambiarFoto">Cambiar foto de perfil</button>';
			         	 	}
			         	  ?>
							<div id="subirImagen">
						     	<input type="file" name="datosImagen" id="datosImagen">
						     	<br>
						     	<img  class="previsualizar">
					    	</div>
			          </div>

			        <div class="row">
			        	<?php 
			        		if ($_SESSION["modo"]=="directo") {
						        	echo '<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-user"></i>
						        		<input  class="uppercase" id="Nombre"  name="editarNombre" type="text"  value="'.$_SESSION["nombre"].'">
			          					<label for="first_name">Cambiar Nombre</label>
						        	</div>
						        	<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-user-circle"></i>
						        		<input  id="apellidos" type="text"  name="editarApellido" value="'.$_SESSION["apellido"].'">
			          					<label for="first_name">Cambiar Apellidos</label>
						        	</div>
						        	<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-envelope-o"></i>
						        		<input  id="email" type="text"  name="editarEmail" value="'.$_SESSION["email"].'">
			          					<label for="first_name">Cambiar Correo Electronico</label>
						        	</div>
						        	<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-id-card-o"></i>
						        		<input  id="dni" type="text"  name="editarDni" value="'.$_SESSION["dni"].'">
			          					<label for="first_name">Cambiar DNI</label>
						        	</div>
						        	<div class="input-field col s12 m12 l12">
						        		<i class="fa fa-lock"></i>
						        		<input  id="clave" type="text"  name="editarClave"  value="" placeholder="Ingrese nueva contraseña">
			          					<label for="first_name">Cambiar Contraseña</label>
						        	</div>
						        	<div class="input-field col s12 m12 l12 center">
						        		<button class="btn colorSecundario" id="btnActualizar">Actualizar datos</button>
						        	</div>'
						        	;
						        }else{
			        			echo '<div class="input-field col s12 m6 l6">
			        			 		<i class="fa fa-user"></i>
						        		<input placeholder="Placeholder" id="Nombre" type="text" readonly value="'.$_SESSION["nombre"].'">
			          					<label for="first_name">Nombre y Apellidos</label>
						        	</div>
									 
						        	<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-envelope-o"></i>
						        		<input  id="gmail" type="text"  value="'.$_SESSION["email"].'" readonly>
			          					<label for="first_name">Correo Electronico</label>
						        	</div>
						        	<div class="input-field col s12 m6 l6">
						        		<i class="fa fa-'.$_SESSION["modo"].'"></i>
						        		<input  id="modo" type="text"  value="'.$_SESSION["modo"].'" readonly>
			          					<label for="first_name">Modo de registro en el sistema</label>
						        	</div>';
			        		}
			        	 ?>
			        </div>
			        <?php 
			        	$actualizarPerfil=new ControladorUsuarios();
			        	$actualizarPerfil->ctrActualizarPerfil();
			         ?>
			    </div>
			    </form>
			    <button class="btn right-align" id="eliminarUsuario" style="background: red; color: #fff;">Eliminar cuenta</button>
			    <?php 
			    	$borrar=new ControladorUsuarios();
			        $borrar->ctrEliminarUsuario();
			     ?>
			</div>
          </div>
      </div> 	
  </div>




