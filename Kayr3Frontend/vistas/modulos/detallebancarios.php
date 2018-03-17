<?php 
    $url = Ruta::ctrRuta(); 
     $servidor=Ruta::ctrRutaServidor();
    
$datosBancarios=ControladorPedidos::crtDatosBancarios();

if (isset($_SESSION["validarSession"])) {

if ($_SESSION["validarSession"]=="ok"){
			
echo '<div class="container center" >
			   	<div class="col s12 m12">
				    <div class="card horizontal">
				      <div class="card-stacked">
				        <div class="card-content center">
				        	<strong>TRANSFERENSIA BANCARIA</strong>
				          <p>Por favor realiza tu pago directamente en nuestra cuenta bancaria.Finalmente envianos el boucher al Whatsapp 
				          <strong>+51 986 946 349</strong>. Tu pedido no será enviado hasta que el importe haya sido recibido en nuestra cuenta.</p>
				        </div>
				      </div>
				    </div>
				 </div>

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
		    </table>


			<a href="perfil" class="waves-effect waves-light btn colorSecundario" >De acuerdo</a>
	   </div>';

	}
}


?>
<div class="divider" style="margin-bottom:100px;" ></div>
