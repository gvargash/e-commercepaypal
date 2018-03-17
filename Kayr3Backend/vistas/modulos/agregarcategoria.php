<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agregar categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="categorias"><i class="fa fa-dashboard"></i>Gestor Categoria</a></li>
        <li class="active">Agregar categoria</li>
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
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="box-body">
                <div class="form-group col-md-6">
                  <label>NOMBRE</label>
                  <input type="text" class="form-control" value="" id="NameCategoria" name="NameCategoria">
                </div>
                <div class="form-group col-md-6">
                  <label>RUTA</label>
                  <input type="text" class="form-control" value="" id="ruta" name="ruta">
                </div>
                
                <div class="form-group col-md-6 ">
                  <label>DESCRIPCION</label>
                  <textarea  class="form-control" name="Descripcion" id="Descripcion">
                    
                  </textarea>
                </div>
            </div>
              <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" id="btnAgregarCategoria"  class="btn btn-primary">GUARDAR</button>
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