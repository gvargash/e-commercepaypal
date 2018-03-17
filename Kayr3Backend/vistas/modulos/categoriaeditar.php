<?php 
  $item="ruta";
   $ruta=$_GET["ruta"];
  $categorias=ControladorCategoria::ctrMostrarCategoria($item,$valor);
 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="categorias"><i class="fa fa-dashboard"></i> Categoria</a></li>
        <li class="active">editando <?php echo $categorias['NameCategoria']?></li>
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
           
               <input type="hidden" name="idCategoria" value="<?php echo $categorias['idCategoria']?>" id="idCategoria">
              <div class="box-body">
                
                <div class="form-group col-md-6">
                  <label>NOMBRE</label>
                  <input type="text" class="form-control" value="<?php echo $categorias['NameCategoria']?>" id="NameCategoria" name="NameCategoria">
                </div>
                <div class="form-group col-md-6">
                  <label>RUTA</label>
                  <input type="text" class="form-control" value="<?php echo $categorias['ruta']?>" id="ruta" name="ruta">
                </div>
                
                <div class="form-group col-md-6 ">
                  <label>DESCRIPCION</label>
                  <textarea  class="form-control" name="Descripcion" id="Descripcion">
                    <?php echo $categorias['Descripcion']?>
                  </textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="btnactualizarCa"  class="btn btn-primary">GUARDAR</button>
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