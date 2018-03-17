 <?php
$categorias = ControladorCategoria::ctrListarCategoria();
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor  categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor  categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title"></h3><a href="agregarcategoria" class="btn btn-primary">Agregar nueva categoria <i class="fa fa-plus"></i> </a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive" id="categoria">
           <table class="table table-bordered table-hover table-responsive" id="tblDatatable">
              <thead>
                 <tr>
                   <th>NOMBRE</th>
                   <th>DESCRIPCIÓN</th>
                   <th>RUTA</th>
                   <th>ACCIÓN</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                foreach ($categorias as $key => $value) {
                  echo '<tr><td>'.$value['NameCategoria'].'</td>
                       <td>'.$value['Descripcion'].'</td>
                       <td>'.$value['ruta'].'</td>
                       <td><a href="'.$value['ruta'].'" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="editar"><i class="fa fa-edit"></i></a>
                       <button class="eliminarCat btn btn-primary" codCategoria="'.$value["idCategoria"].'"  data-toggle="tooltip" data-placement="left" title="eliminar"><i class="fa fa-trash"></i></button></td>
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
