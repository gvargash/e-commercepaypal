<?php 
  $item="ruta";
   $ruta=$_GET["ruta"];
  $marcas=ControladorMarca::ctrMostrarMarca($item,$valor);
 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar marca
      </h1>
      <ol class="breadcrumb">
        <li><a href="marcas"><i class="fa fa-dashboard"></i> Marcas</a></li>
        <li class="active">editando marca <?php echo $marcas['NameMarca']?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
           
               <input type="hidden" name="idMarca" value="<?php echo $marcas['idMarca']?>" id="idMarca">
              <div class="box-body">
                
                <div class="form-group col-md-6">
                  <label>NOMBRE</label>
                  <input type="text" class="form-control" value="<?php echo $marcas['NameMarca']?>" id="NameMarca" name="NameMarca">
                </div>
                <div class="form-group col-md-6">
                  <label>URL AMIGABLE</label>
                  <input type="text" class="form-control" value="<?php echo $marcas['ruta']?>" id="ruta" name="ruta">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="btnactualizarMa"  class="btn btn-primary">GUARDAR</button>
                <button type="submit" id="btnCancelar" class="btn btn-primary">CANCELAR</button>
              </div>
           

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