<?php 
    $url = Ruta::ctrRuta(); 
     $servidor=Ruta::ctrRutaServidor();
    

    if (isset($_SESSION["validarSession"])) {
    	if ($_SESSION["validarSession"]=="ok") {
    		echo '<div class="container">
		   <!--FORMULARIO-DIRECCION START-->
				<h3 class="encabezado center">DATOS DE ENTREGA</h3>  
			<div class="col s12 center">
			        <form method="POST">
			        	<div class="row">
			            <div class="input-field col s6">
			              <input id="Celular" type="text" required name="celular_di" value="" >
			              <label for="Celular">Celular *</label>
			            </div>
			            <div class="input-field col s6">
			              <input id="telefono" type="text" required name="telefono_di" value="" >
			              <label for="Telefono">Telefono</label>
			            </div>
			        </div>
			        <div class="row">
			            <div class="input-field col s6">
			              <input id="direccion" type="text" required name="direccion_di" value="" >
			              <label for="direccion">Direccion *</label>
			            </div>
			            <div class="input-field col s6">
			              <input id="regferencia" type="text" required name="referencia_di" value="" >
			              <label for="regferencia">Referencia *</label>
			            </div>
			         </div>
			    
			         <div class="row">
			            <div class="input-field col s6">
			              <input id="Departamento" type="text" required name="departamento_di"  value="Lima" readonly>
			              <label for="Departamento">Departamento</label>
			            </div>
			            <div class="input-field col s6">
			              <input id="Provincia" type="text" required name="provincia_di"  value="Lima" readonly>
			              <label for="Provincia">Provincia</label>
			            </div>
			        </div>
			        <div class="row">
			            <div class="input-field col s12">
			              <input type="text" id="autocomplete-input" name="distrito_di" required class="autocomplete" value="">
			              <label for="autocomplete-input">Distrito *</label>
			            </div>
			          
			        </div>';

				 
				        $registrarDireccion=new ControladorDireccion();
				        $registrarDireccion->ctrPedidoDireccion();
				       
		   
					 echo '<div class="col s12 l6" style="margin-bottom: 30px;">
			        	 	<button type="submit" class="colorSecundario btn">REGISTRAR DIRECCION</button>
			        	</div>
			        </form>
		    	</div>
      		<!--FORMULARIO-DIRECCION END-->
		</div>';
    	}
    }
		
