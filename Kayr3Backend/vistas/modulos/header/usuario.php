<!--=====================================
USUARIOS
======================================-->	

<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
		<img src="vistas/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
		
		<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
	
	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="user-header">
		
			<img src="vistas/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

			<p>
				<?php 
					echo $_SESSION["nombre"];
				 ?>
			</p>
		
		</li>

		<li class="user-footer">
		
	
			<div class="pull-right">
			
				<a href="salir" class="btn btn-default btn-flat">Salir</a>
			
			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->