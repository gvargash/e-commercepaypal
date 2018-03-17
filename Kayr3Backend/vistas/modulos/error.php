<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
              <script>
		    	swal({
					  title: '404',
					  text: "¡Pagina no encontrada!",
					  width: 600,
					  padding: 100,
					  background: '#CECDCD url(vistas/img/plantilla/giphy.gif) no-repeat left',
					  showConfirmButton: true,
					  confirmButtonColor: "#ad1457",
					  confirmButtonText: 'Ok!',
					   backdrop: `rgba(0,0,123,0.4)`
					}).then((result) => {
					  if (result.value) {
					    history.back();
					  }
					})
		    </script>
</div>

