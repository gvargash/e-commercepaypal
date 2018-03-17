  <?php 
    $categorias = ControladorCategoria::ctrListarCategoria();
    $marcas=ControladorMarca::ctrListarMarca();
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agregar productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="productos"><i class="fa fa-dashboard"></i> Gestor de productos</a></li>
        <li class="active">Agregar productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">AGREGAR PRODUCTOS Campos obligatorios(*)</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <form action="" enctype="multipart/form-data" method="POST">
        <div class="box-body">
          <!--=====================================
          =            FORMULARIO ADD PRODUCTO =
          ======================================-->          
          <div class="box-body">
                 <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">DETALLE</a></li>
                    <li><a data-toggle="tab" href="#menu1">DESCRIPCIÓN</a></li>
                    <li><a data-toggle="tab" href="#menu2">CARACTERISTICAS</a></li>
                  </ul>

           <div class="tab-content">                   
            <!-- DETALLLE -->
             <div id="home" class="tab-pane fade in active">
               <div class="form-group col-md-6">
                  <label>NOMBRE(*)</label>
                  <input type="text" class="form-control" value="" id="nombreproducto" name="nombreproducto" placeholder="hp" required>
                </div>
                 <div class="form-group col-md-6">
                  <label>SKU</label>
                  <input type="text" class="form-control" value="" id="SKU" name="SKU" maxlength="10" placeholder="KR30000001">
                </div>
                <div class="form-group col-md-6">
                  <label>COLOR</label>
                  <input type="checkbox" class="form-control icheckbox_minimal-blue" name="color[]" value="Amarillo" id="color"> Amarrillo
                  <input type="checkbox" class="form-control icheckbox_minimal-blue" name="color[]" value="Cyan" id="color"> Cyan     
                  <input type="checkbox" class="form-control icheckbox_minimal-blue" name="color[]" value="Magenta" id="color"> Magenta    
                  <input type="checkbox" class="form-control icheckbox_minimal-blue" name="color[]" value="Negro" id="color">  Negro       
                </div>
                 <div class="form-group col-md-6">
                  <label>TECNOLOGIA DE IMPRESIÓN</label>
                    <input type="radio" class="form-control iradio_minimal-blue" value="Laser" id="tecnologiadeimpresion" name="tecnologiadeimpresion[]" checked > Láser  
                    <input type="radio" class="form-control iradio_minimal-blue" value="LED" id="tecnologiadeimpresion" name="tecnologiadeimpresion[]"> LED   
                </div>
                <div class="form-group col-md-6">
                  <label>PESO (*)</label>
                  <input type="text" class="form-control" value="" id="peso" name="peso" placeholder="" required>
                </div>
                 <div class="form-group col-md-6">
                  <label>GARANTIA DE PRODUCTO</label>
                  <input type="text" class="form-control" value="" id="garantideproducto" name="garantideproducto">
                </div>
                 <div class="form-group col-md-6">
                  <label>PRECIO ORIGINAL</label>
                  <input type="text" class="form-control" value="" id="preciooriginal" name="preciooriginal">
                </div>
                 <div class="form-group col-md-6">
                  <label>PRECIO KAYR3 (*)</label>
                  <input type="text" class="form-control" value="" id="preciokayre" name="preciokayre" required>
                </div>
                <div class="form-group col-md-6">
                  <label>STOCK (*)</label>
                  <input type="number" class="form-control" value="" id="STOCK" name="STOCK" min="0" required>
                </div>
               <div class="form-group col-md-6">
                  <input type="hidden" class="form-control iradio_minimal-green" value="1" id="estado"  name="estado">Activo
                </div>
                <div class="form-group col-md-6">
                  <label>TIPO DE CARTUCHO</label>
                  <input type="radio" class="form-control iradio_minimal-green" value="láser" id="tipodecartucho[]"  name="tipodecartucho">Láser
                  <input type="radio" class="form-control iradio_minimal-green" value="inyección " id="tipodecartucho[]"  name="tipodecartucho"> Inyección
                </div>
                 <div class="form-group col-md-6">
                  <label>NUEVO</label>
                   <input type="checkbox" class="form-control" value="0" id="nuevo[]" name="nuevo">No
                    <input type="checkbox" class="form-control" value="1" id="nuevo[]" name="nuevo">Si
                  </div>
                 <div class="form-group col-md-6">
                  <label>IMAGEN (*)</label>
                  <input type="file" class="form-control" value="" id="imagen" name="imagen" required>
                </div>
            </div>

            <!-- DESCRIPCION -->
              <div id="menu1" class="tab-pane fade">
                <div class="form-group col-md-6">
                  <label>DESCRIPCIÓN CORTA</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="5"  class="form-control"></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>COMPATIBILIDAD</label>
                  <textarea name="compatibilidad" id="compatibilidad" cols="30" rows="5" class="form-control"></textarea>
                </div>
           </div>
           
           <!-- CARACTERISTICAS -->
           

             <div id="menu2" class="tab-pane fade">
                <div class="form-group col-md-6">
                  <label>MODELO (*)</label>
                  <input type="text" class="form-control" value="" id="modelo" name="modelo" required>
                </div>
                 <div class="form-group col-md-6">
                  <label>RENDIMIENTO</label>
                  <input type="text" class="form-control" value="" id="rendimiento" name="rendimiento">
                </div>

                 <div class="form-group col-md-6">
                  <label>CATEGORIA (*)</label>
                  <select name="idcategoria" id="idcategoria" class="form-control" required>
                     <?php 
                      foreach ($categorias as $key => $valuec) {
                       echo '<option value="'.$valuec['idCategoria'].'">'.$valuec["NameCategoria"].'</option>';
                      }
                      ?>
                  </select>
                </div>

                 <div class="form-group col-md-6">
                  <label>Marcas (*)</label>
                  <select name="idmarca" id="idmarca" class="form-control" required>
                     <?php 
                      foreach ($marcas as $key => $valuem) {
                       echo '<option value="'.$valuem['idMarca'].'">'.$valuem["NameMarca"].'</option>';
                      }
                      ?>
                  </select>
                </div>
            </div>
          

            <!-- OFERTA -->
         </div>
        </div>
       </div>
              <!-- /.box-body -->
              <?php 
                $registrarproducto=new ControladorProductos();
                $registrarproducto->ctrAgregarProducto();
               ?>

            <div class="box-footer">
              <button type="submit" id="btneditarProducto"  class="btn btn-primary">GUARDAR</button>
              <a href="productos" id="btnCancelar" class="btn btn-primary">CANCELAR</a>
            </div>


        <!--=====================================
      =        END    FORMULARIO ADD PRODUCTO =
      ======================================-->  
    </div>
    </form>
        
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