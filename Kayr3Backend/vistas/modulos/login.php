<div class="login-box">
  <div class="login-logo">
    <img src="vistas/img/plantilla/logo.jpg" class="img-responsive" alt="kayre.com" style="border-radius: 5px; padding: 10px 50px;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al sistema</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="email" name="ingEmail" class="form-control" placeholder="Correo" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="ingPassword" class="form-control" placeholder="contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 ">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      
      <?php

        $login = new ControladorAdministradores();
        $login -> ctrIngresoAdministrador();

      ?>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->