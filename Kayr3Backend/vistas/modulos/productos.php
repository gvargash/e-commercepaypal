 <?php
$productos = ControladorProductos::ctrMostrarTotalProductos("fecha");
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title"><a href="agregarproductos" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar nuevo producto</a></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          
          </div>
        </div>
        <div class="box-body table-responsive ">
          <table class="table table-bordered table-hover table-striped" id="tblDatatable">
              <thead>
                 <tr>
                   <th><i class="fa fa-image"></i></th>
                   <th>NOMBRE</th>
                   <th>COLOR</th>
                   <th>MODELO</th>
                   <th>PRECIO ORIGINAL</th>
                   <th>PRECIO KAYR3</th>
                   <th>VISITAS</th>
                   <th>PEDIDOS</th>
                   <th>STOCK</th>
                 </tr>
              </thead>
              
              <tbody>
                <?php 
                  foreach ($productos as $key => $value) {
                    echo '<tr>
                    <td><img src="'.$value["imagen"].'" alt="Product Image" class="img-thumbnail" height="40"  width="40"></td>
                       <td>'.$value['NombreProducto'].'</td>
                       <td>'.$value['Color'].'</td>
                       <td>'.$value['Modelo'].'</td>
                       <td>S/. '.$value['PrecioOriginal'].'</td>
                       <td>S/. '.$value['PrecioKayre'].'</td>
                       <td>'.$value['vistas'].'</td>
                       <td>'.$value['ventas'].'</td>';
                      if ($value['Stock']==0) {
                         echo '<td><span class="text-red">Stock agotado</span></td>';
                      }else if ($value['Stock']<=5) {
                        echo '<td><span class="text-orange">Actualize su stock</span></td>';
                      }else{
                        echo '<td><span class="text-green">Hay existencias </span></td>';;
                      }
                       echo'                  
                       </tr>';
                  }

                 ?>
              </tbody>  
           </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->