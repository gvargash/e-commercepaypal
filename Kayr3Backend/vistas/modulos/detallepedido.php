<?php 
$item="ruta";
$valor = $_GET["ruta"];

global $detallepedido;
$detallepedido = ControladorVentas::crtPedidoDetalle($item, $valor);
global $datosBancarios;
$datosBancarios=ControladorVentas::crtDatosBancarios();
global $detallepedidoSecundario;
$detallepedidoSecundario=ControladorVentas::crtPedidoDetalleSecundario($valor);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" id="imprimirCabecera">
      <h1>
        Gestor pedidos
      </h1>
      <ol class="breadcrumb">
        <li><a href="pedidos"><i class="fa fa-dashboard"></i> Pedido</a></li>
        <li class="active">Gestor pedidos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" id="ocultar">
          <h3 class="box-title">
				<form method="POST">
					<input type="hidden" name="PYE" value="send">
					<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="rigth"  data-original-title="enviar una copia al correo de: <?php echo $detallepedido['Cliente'];?> "><i class="fa fa-envelope"></i></button>
				</form>
          	</h3>

          <div class="box-tools pull-right">
            <button onclick="window.print();" target="_blanck" class="btn btn-primary"><i class="fa fa-print"></i></button>
          </div>
        </div>
        <div class="box-body">
			<div class="container" id="mostrar">
				<div class="row" style="border:1px solid #FF5ADE;">
					<div class="col-sm-12 col-lg-12 panel-body text-center">
						<img src="vistas/img/plantilla/icono.jpg" alt="kayre SAC" style="border-radius: 5px solid #fff;margin:2px; width:50px; height:50px; margin-top: 10px;">
					</div>
					

					<div class="col-sm-12 text-center">
						<h6 class="panel-title">GRACIAS POR TU PEDIDO</h6>
					</div>

					<div class="col-sm-12 panel-body table-responsive">
						<h6><strong>NUESTROS DETALLES BANCARIOS</strong> </h6>
			           	<table class="table table-bordered">
					        <thead>
					          <tr>
					              <th><strong>Banco</strong></th>
					              <th><strong>Propietario</strong></th>
					              <th><strong>Número de cuenta</strong></th>
					          </tr>
					        </thead>
					        <tbody>
					     		<?php 
					     			foreach ($datosBancarios as $key => $valueB) {
								  echo '<tr>
							            <td>'.$valueB["Banco"].'</td>
							            <td>'.$valueB["PropietarioCU"].'</td>
							            <td>'.$valueB["NumeroDeCuenta"].'</td>
					                 </tr>';
					       		 }

					     		 ?>
					  </tbody>
					    </table>
			  			</div>

					<div class="col-sm-12">
						<h6><strong>CODIGO DE PEDIDO:</strong><?php echo $detallepedido['NumeroPedido']?></h6>
						<h6><strong>CLIENTE: </strong><?php echo $detallepedido["Cliente"]?></h6>
					</div>


					<div class="col-sm-12 panel-body table-responsive">
						<table class="table table-bordered">
					        <thead>
					          <tr>
					              <th><strong>Producto<strong></th>
					              <th><strong>Cantidad<strong></th>
					              <th><strong>Preci<strong>o</th>
					          </tr>
					        </thead>

					        <tbody>
					        	<?php 
					    	 foreach ($detallepedidoSecundario as $key => $row) {
								echo '<tr>
							            <td>'.$row["NombreProducto"].'</td>
							            <td>'.$row["cantidad"].'</td>
							            <td>S/. '.$row["Precio"].'</td>
					                 </tr>';
					       			 }
					       		?>
					       		</tbody>
					    </table>
					</div>		
				


					<div class="col-sm-12 panel-body pull-right table-responsive">
						<table class="table table-bordered">
					    	<tbody>
					    		<tr>
					    			<td><strong>Subtotal: </strong> S/.<?php echo $detallepedido['SubTotal']?></td>
					    			<td></td>
					    		</tr>
					    		<tr>
					    			<td><strong>Envio: </strong> S/.<?php echo $detallepedido['CostoEnvio']?></td>
					    			<td></td>
					    		</tr>
					    		<tr>
					    			<td><strong>IGV: </strong> S/.<?php echo $detallepedido['IGV']?></td>
					    			<td></td>
					    		</tr>
					    		<tr>
					    			<td><strong>Total: </strong> S/.<?php echo $detallepedido['total']?></td>
					    			<td></td>
					    		</tr>
					    	</tbody>
					    </table>
					</div>


						<div class="col-sm-12 panel-body pull-right table-responsive">
						<div class="panel-title"><h6><strong>DATOS PARA ENTREGA</strong> </h6></div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>CELULAR</th>
									<th>TELEFONO</th>
									<th>DIRECCION</th>
									<th>REFERENCIA</th>
									<th>DEPARTAMENTO</th>
									<th>PROVINCIA</th>
									<th>DISTRITO</th>
								</tr>
							</thead>
					    	<tbody>
					    		<tr>
					    			<td><?php echo $detallepedido["CelularClie"]; ?></td>
					    			<td><?php echo $detallepedido["Telefono"]; ?></td>
					    			<td><?php echo $detallepedido["Direccion"]; ?></td>
					    			<td><?php echo $detallepedido["Referencia"]; ?></td>
					    			<td><?php echo $detallepedido["Departamento"]; ?></td>
					    			<td><?php echo $detallepedido["Provincia"]; ?></td>
					    			<td><?php echo $detallepedido["Distrito"]; ?></td>
					    		</tr>
					    	</tbody>
					    </table>
					</div>

				</div>
			</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
         	<p>Kayr3 SAC -2018 | Gracias por elegirnos | www.kayr3.com | Hecho en PE con <i class="fa fa-heart text-red"></i>
         	</p>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<?php 
if (isset($_POST["PYE"])) {
						date_default_timezone_set("America/Lima");
						$mail=new PHPMailer;
						$mail->CharSet='UTF-8';
						$mail->isMail();
						$mail->setFrom('gvargash2@gmail.com','KAYR3 S.A.C');
						$mail->addReplyTo('gvargash2@gmail.com','KAYR3 S.A.C');
						$mail->Subject="BOLETA DE PEDIDO";
						$mail->addAddress($detallepedido['CorreoUsu']);
						$hmltfact1='<div><div class="box-body">
						<div class="container" id="mostrar">
							<div class="row" style="border:1px solid #FF5ADE;">
								<div class="col-sm-12 col-lg-12 panel-body text-center">
									<img src="vistas/img/plantilla/icono.jpg" alt="kayre SAC" style="border-radius: 5px solid #fff;margin:2px; width:50px; height:50px; margin-top: 10px;">
								</div>
								

								<div class="col-sm-12 text-center">
									<h6 class="panel-title">GRACIAS POR TU PEDIDO</h6>
								</div>

								<div class="col-sm-12 panel-body">
									<h6><strong>NUESTROS DETALLES BANCARIOS</strong> </h6>
						           	<table class="table table-bordered">
								        <thead>
								          <tr>
								              <th><strong>Banco</strong></th>
								              <th><strong>Propietario</strong></th>
								              <th><strong>Número de cuenta</strong></th>
								          </tr>
								        </thead>
								        <tbody>';
								     		 
								   foreach ($datosBancarios as $key => $valueB) {
									$hmltfact2='<tr>
										            <td>'.$valueB["Banco"].'</td>
										            <td>'.$valueB["PropietarioCU"].'</td>
										            <td>'.$valueB["NumeroDeCuenta"].'</td>
								                 </tr>';
								       		 }

							
							$hmltfact3 ='</tbody>
								    </table>
						  			</div>

								<div class="col-sm-12">
									<h6><strong>CODIGO DE PEDIDO:</strong>'.$detallepedido['NumeroPedido'].'</h6>
									<h6><strong>CLIENTE: </strong>'. $detallepedido["Cliente"].'</h6>
								</div>


								<div class="col-sm-12 panel-body">
									<table class="table table-bordered">
								        <thead>
								          <tr>
								              <th><strong>Producto<strong></th>
								              <th><strong>Cantidad<strong></th>
								              <th><strong>Preci<strong>o</th>
								          </tr>
								        </thead>

								        <tbody>
								        	<?php';
								    	 foreach ($detallepedidoSecundario as $key => $row) {
											$hmltfact4='<tr>
										            <td>'.$row["NombreProducto"].'</td>
										            <td>'.$row["cantidad"].'</td>
										            <td>S/. '.$row["Precio"].'</td>
								                 </tr>';
								       			 }
								       		
								 $hmltfact5='</tbody>
								    </table>
								</div>		
							


								<div class="col-sm-12 panel-body pull-right">
									<table class="table table-bordered">
								    	<tbody>
								    		<tr>
								    			<td><strong>Subtotal: </strong> S/.'.$detallepedido['SubTotal'].'</td>
								    			<td></td>
								    		</tr>
								    		<tr>
								    			<td><strong>Envio: </strong> S/.'. $detallepedido['CostoEnvio'].'</td>
								    			<td></td>
								    		</tr>
								    		<tr>
								    			<td><strong>IGV: </strong> S/.'.$detallepedido['IGV'].'</td>
								    			<td></td>
								    		</tr>
								    		<tr>
								    			<td><strong>Total: </strong> S/.'. $detallepedido['total'].'</td>
								    			<td></td>
								    		</tr>
								    	</tbody>
								    </table>
								</div>


									<div class="col-sm-12 panel-body pull-right">
									<div class="panel-title"><h6><strong>DATOS PARA ENTREGA</strong> </h6></div>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>CELULAR</th>
												<th>TELEFONO</th>
												<th>DIRECCION</th>
												<th>REFERENCIA</th>
												<th>DEPARTAMENTO</th>
												<th>PROVINCIA</th>
												<th>DISTRITO</th>
											</tr>
										</thead>
								    	<tbody>
								    		<tr>
								    			<td>'. $detallepedido["CelularClie"].'</td>
								    			<td>'. $detallepedido["Telefono"].'</td>
								    			<td>'. $detallepedido["Direccion"].'</td>
								    			<td>'. $detallepedido["Referencia"].'</td>
								    			<td>'. $detallepedido["Departamento"].'</td>
								    			<td>'. $detallepedido["Provincia"].'</td>
								    			<td>'. $detallepedido["Distrito"].'</td>
								    		</tr>
								    	</tbody>
								    </table>
								</div>

							</div>
						</div>
			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer text-center">
			         	<p>Kayr3 SAC -2018 | Gracias por elegirnos | www.kayr3.com | Hecho en PE con <i class="fa fa-heart text-red"></i></p>
			        </div>
			        <!-- /.box-footer-->
			      </div>';
			 $htmlsms=$hmltfact1.$hmltfact2.$hmltfact3.$hmltfact4.$hmltfact5;
			$mail->msgHTML($htmlsms);
			$envio=$mail->send();

			if(!$envio){

						echo '<script> 
								swal({
									title: "Error!",
									text: "¡Correo no se pudo enviar!",
									type: "error",
									showConfirmButton: true,
									confirmButtonColor: "#C407C6",
									confirmButtonText: "Ok!"
								}).then((result) => {
									if (result.value) {
										history.back();
									}
								})
							</script>';

					}else{

						echo '<script> 
								swal({
									title: "Bien!",
									text: "¡Correo enviado correctamente!",
									type: "success",
									showConfirmButton: true,
									confirmButtonColor: "#C407C6",
									confirmButtonText: "Ok!"
								}).then((result) => {
									if (result.value) {
										history.back();
									}
								})
						</script>';

					}
		}
?>