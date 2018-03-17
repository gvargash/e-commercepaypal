<?php 
  $visitaPaises=ControladorVisitas::ctrMostrarPaises('cantidad');
  $visitaPersonas=ControladorVisitas::ctrMostrarPersonas('fecha');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de visitas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor de visitas</li>
      </ol>
    </section>
   <div class="row">
    <div class="col-sm-12 col-md-6">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">VISITA POR IP</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
               <table class="table table-bordered table-hover" id="tblDatatable">
              <thead>
                 <tr>
                   <th>IP</th>
                   <th>PAIS</th>
                   <th>VISITAS</th>
                   <th>FECHA</th>
                 </tr>
              </thead>
              <tbody>
            <?php 
                foreach($visitaPersonas as $key => $valuep) {
                  echo '<tr>
                           <td>'.$valuep['ip'].'</td>
                           <td>'.$valuep['pais'].'</td>
                           <td>'.$valuep['visitas'].'</td>
                           <td>'.date('d/m/Y h:i:s A',strtotime($valuep["fecha"]) ).'</td>
                       </tr>';
                }
             ?>
              </tbody>  
           </table>
            </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
   </div>
   <div class="col-sm-12 col-md-6">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">VISITA POR PAISES</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
                 <table class="table table-bordered table-hover" id="tblvisitapaises">
                  <thead>
                     <tr>
                       <th>PAIS</th>
                       <th>CODIGO</th>
                       <th>CANTIDAD</th>
                       <th>FECHA</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php 
                      foreach($visitaPaises as $key => $valuepa) {
                       echo '<tr>
                             <td>'.$valuepa['pais'].'</td>
                             <td>'.$valuepa['codigo'].'</td>
                             <td>'.$valuepa['cantidad'].'</td>
                             <td>'.date('d/m/Y h:i:s A',strtotime($valuepa["fecha"]) ).'</td>
                       </tr>';
                      }
                   ?>
              </tbody>  
           </table>
        </div>
    </div>

    </section>
    <!-- /.content -->
   </div>
  </div>
</div>
  <!-- /.content-wrapper -->