<br>
<?php
$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$item="ruta";
$valor = $rutas[0];

$detallepedido = ControladorPedidos::crtPedidoDetalle($item, $valor);
$datosBancarios=ControladorPedidos::crtDatosBancarios();
 

$detallepedidoSecundario=ControladorPedidos::crtPedidoDetalleSecundario($valor);

if (isset($_SESSION["validarSession"])) {
	if ($_SESSION["validarSession"]=="ok") {
		echo '
<div class="container mostrar" id="imprimir">
	<div class="row" style="border:1px solid #FF5ADE;">
		<div class="col s12 center">
			<img src="'.$servidor.'vistas/img/plantilla/icono.jpg" alt="kayre SAC" style="border-radius: 5px solid #fff;width:50px; height:50px;">
		</div>
		

		<div class="col s12 center">
			<h6>GRACIAS POR TU PEDIDO</h6>
		</div>

		<div class="col s12 center">
			<h6><strong>NUESTROS DETALLES BANCARIOS</strong> </h6>
           	<table class="centered bordered">
		        <thead>
		          <tr>
		              <th><strong>Banco</strong></th>
		              <th><strong>Propietario</strong></th>
		              <th><strong>Número de cuenta</strong></th>
		          </tr>
		        </thead>
		        <tbody>';
		     		foreach ($datosBancarios as $key => $valueB) {
					  echo '<tr>
				            <td>'.$valueB["Banco"].'</td>
				            <td>'.$valueB["PropietarioCU"].'</td>
				            <td>'.$valueB["NumeroDeCuenta"].'</td>
		                 </tr>';
		       		 }
		   echo '</tbody>
		    </table>';
   echo '</div>

		<div class="col s12">
			<h6><strong>CODIGO DE PEDIDO:</strong> '.$detallepedido['NumeroPedido'].'</h6>
		</div>


		<div class="col s12 center">
			<table class="bordered centered striped">
		        <thead>
		          <tr>
		              <th><strong>Producto<strong></th>
		              <th><strong>Cantidad<strong></th>
		              <th><strong>Preci<strong>o</th>
		          </tr>
		        </thead>

		        <tbody>';
		    	 foreach ($detallepedidoSecundario as $key => $row) {
					echo '<tr>
				            <td>'.$row["NombreProducto"].'</td>
				            <td>'.$row["cantidad"].'</td>
				            <td>S/. '.$row["Precio"].'</td>
		                 </tr>';
		       			 }
		   echo '</tbody>
		    </table>
		</div>';
		



		echo '<div class="col s12">
			<table class="center">
		    	<tbody>
		    		<tr>
		    			<td><strong>Subtotal:</strong>S/.  '.$detallepedido['SubTotal'].'</td>
		    			<td></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Envio:</strong>S/.  '.$detallepedido['CostoEnvio'].'</td>
		    			<td></td>
		    		</tr>
		    		<tr>
		    			<td><strong>IGV:</strong>S/.  '.$detallepedido['IGV'].'</td>
		    			<td></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Total:</strong>S/.  '.$detallepedido['total'].'</td>
		    			<td></td>
		    		</tr>
		    	</tbody>
		    </table>
		</div>

	</div>
</div>

<div class="center ocultar" style="margin-bottom:60px;">
	<button onclick="window.print();" target="_blanck" class="btn colorSecundario"><i class="fa fa-print"></i></button>
</div>';
	}
}


