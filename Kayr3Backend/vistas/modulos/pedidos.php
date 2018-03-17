<?php 
  $item="FechaPedido";
   $pedidos=ControladorVentas::ctrListarPedidos($item);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor pedidos 
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor pedidos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-primary">

        <div class="box-header with-border">
           <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          
          </div>
        </div>
        <div class="box-body table-responsive " id="pedido">
           <table class="table table-bordered table-hover  text-center" id="tblDatatable">
               <thead>
                        <tr> 
                           <th>OPCIONES</th>
                            <th>NUMERO PEDIDO</th>
                            <th>FECHA</th>
                            <th>ESTADO</th>
                            <th>CLEIENTE</th>
                             <th>TOTAL</th>
                             <th>ACCION</th>
                        </tr>
                      </thead>

                      <tbody>
            <?php 
               foreach ($pedidos as $key => $valuec) {
                   echo '<tr>
                         <td><button class="btnaceptarpe btn btn-primary" data-toggle="tooltip" data-placement="left" title="" data-original-title="aceptar" idPedido="'.$valuec['idPedido'].'"><i class="fa fa-check"></i></button>
                          <button class="btnanularpe btn btn-primary" data-toggle="tooltip" data-placement="left" title="" data-original-title="anular" idPedido="'.$valuec['idPedido'].'"><i class="fa fa-close"></i></button>
                          <button class="btncompletar btn btn-primary" data-toggle="tooltip" data-placement="top"  data-original-title="Completado con exito" idPedido="'.$valuec['idPedido'].'"><i class="fa fa-money"></i></button></td>
                          <td>'.$valuec['NumeroPedido'].'</td>';
                          $fechapedido=date_create($valuec['FechaPedido']);
                          $fechapedido=date_format($fechapedido,'d-m-Y');

                          echo '<td>'.$fechapedido.'</td>';
                          if ($valuec['envio']==0) {
                            echo '<td><span class="description-percentage text-purple">En espera</span></td>';
                          }else if ($valuec['envio']==1) {
                            echo '<td><span class="description-percentage text-yellow">Aceptado</span></td>';
                          }else if ($valuec['envio']==2) {
                            echo '<td><span class="description-percentage text-red">Anulado</span></td>';
                          }else if ($valuec['envio']==3){
                            echo '<td><span class="description-percentage text-green">Completado</span></td>';
                          }

                       echo'<td>'.$valuec['cliente'].'</td>
                          <td>S/. '.$valuec['total'].'</td>
                          <td><a href="'.$valuec['ruta'].'" class="btn bnt-primary"><i class="fa fa-eye"></i></a></td>
                        </tr>';
                  }
             ?>
              </tbody>  
           </table>
        </div>
         <div class="box-footer">
           
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>