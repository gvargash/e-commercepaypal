<?php 
   $marcas=ControladorMarca::ctrListarMarca();
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor marcas de productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor marcas de productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-primary">

        <div class="box-header with-border">
           <h3 class="box-title"></h3><a href="agregarmarca" class="btn btn-primary">Agregar nueva categoria <i class="fa fa-plus"></i> </a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          
          </div>
        </div>
        <div class="box-body table-responsive" id="marca">
           <table class="table table-bordered table-hover" id="tblDatatable">
              <thead>
                 <tr>
                   <th>NOMBRE</th>
                   <th>RUTA</th>
                   <th>ACCION</th>
                 </tr>
              </thead>
              <tbody> 
            <?php 
                foreach ($marcas as $key => $value) {
                  echo '<tr><td>'.$value['NameMarca'].'</td>
                       <td>'.$value['ruta'].'</td>
                       <td><a href="'.$value['ruta'].'" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="editar"><i class="fa fa-edit"></i></a>
                       <button class="eliminarMar btn btn-primary" codMarca="'.$value["idMarca"].'" data-toggle="tooltip" data-placement="left" title="eliminar"><i class="fa fa-trash"></i></button>
                       </td>
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
