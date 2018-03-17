 <?php
$usuarios = ControladorUsuarios::ctrMostrarTotalUsuarios("fecha");
$url = Ruta::ctrRuta();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">USUARIOS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
           <table class="table table-bordered table-hover " id="tblDatatable">
               <thead>
                        <tr> 
                            <th><i class="fa fa-image"></i></th>
                            <th>USUARIO</th>
                            <th>CORREO</th>
                            <th>MODO</th>
                             <th>ACCION</th>
                        </tr>
                      </thead>

                      <tbody>
            <?php 
               foreach ($usuarios as $key => $valuec) {
                echo '<tr>';
                          if ($valuec["fotoUsu"] != "") {
                             echo '<td><img src="'.$valuec["fotoUsu"].'" alt="User Image" class="thumbnail" width="50" height="50"></td>';
                          }else{
                             echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="thumbnail"alt="User Image"  width="50" height="50"></td>';
                          }
                          echo '<td>'.$valuec['NombreUsu'].$valuec['ApellidoUsu'].'</td>
                          <td>'.$valuec['CorreoUsu'].'</td>';
                          if ($valuec["modo"]=="directo") {
                             echo ' <td><i class="glyphicon glyphicon-globe text-purple"></i></td>';
                          }else if ($valuec["modo"]=="facebook") {
                             echo ' <td><i class="fa fa-facebook-square text-blue"></i></td>';
                          }else{
                             echo ' <td><i class="fa fa-google-plus-square text-red"></i></td>';
                          }
              echo '</tr>';
                  }
             ?>
              </tbody>  
           </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->