<?php 
  $item="ruta";
   $ruta=$_GET["ruta"];
  $productos=ControladorProductos::crtProductoEditar($item,$valor);

   $categorias = ControladorCategoria::ctrListarCategoria();
    $marcas=ControladorMarca::ctrListarMarca();
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Editar producto
      </h1>
      <ol class="breadcrumb">
        <li><a href="productos"><i class="fa fa-dashboard"></i> Gestor de productos</a></li>
        <li class="active">Editando: <?php echo $productos["NombreProducto"]?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
     	<div class="box-body">

      <form method="POST" enctype="multipart/form-data">
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
                  <label>NOMBRE (*)</label>
                  <input type="hidden" name="idProducto" value="<?php echo $productos["idProducto"] ?>">
                  <input type="text" class="form-control" value="<?php echo $productos["NombreProducto"]?>" id="nombreproducto" name="nombreproducto" required>
                </div>
                 <div class="form-group col-md-6">
                  <label>SKU </label>
                  <input type="text" class="form-control" value="<?php echo $productos["SKU"]?>" id="SKU" name="SKU">
                </div>
                <div class="form-group col-md-6">
                  <label>COLOR - Cyaan, Magenta, Amarrillo y/o negroi</label>
                  <input type="text" class="form-control " value="<?php echo $productos["Color"]?>" id="color" name="color">   
                </div>
                 <div class="form-group col-md-6">
                  <label>TECNOLOGIA DE IMPRESIÓN  </label>
                    <input type="text" class="form-control iradio_minimal-blue" value="<?php echo $productos["TecnologiaImpresion"]?>" id="tecnologiadeimpresion" name="tecnologiadeimpresion"> 
                </div>
                 

                  <div class="form-group col-md-6">
                  <label>TIPO DE CARTUCHO  </label>
                    <input type="text" class="form-control iradio_minimal-blue" value="<?php echo $productos["TipoCartucho"]?>" id="tipodecartucho" name="tipodecartucho"> 
                </div>
                <div class="form-group col-md-6">
                  <label>PESO (*)</label>
                  <input type="text" class="form-control" value="<?php echo $productos["Peso"]?>" id="peso" name="peso" required>
                </div>
                 <div class="form-group col-md-6">
                  <label>GARANTIA DE PRODUCTO</label>
                  <input type="text" class="form-control" value="<?php echo $productos["GarantíadeProducto"]?>" id="garantideproducto" name="garantideproducto">
                </div>
                 <div class="form-group col-md-6">
                  <label>PRECIO ORIGINAL</label>
                  <input type="text" class="form-control" value="<?php echo $productos["PrecioOriginal"]?>" id="preciooriginal" name="preciooriginal">
                </div>
                 <div class="form-group col-md-6">
                  <label>PRECIO KAYR3 (*)</label>
                  <input type="text" class="form-control" value="<?php echo $productos["PrecioKayre"]?>" id="preciokayre" name="preciokayre" required>
                </div>
                <div class="form-group col-md-6">
                  <label>STOCK</label>
                  <input type="number" class="form-control" value="<?php echo $productos["Stock"]?>" id="STOCK" name="STOCK" min="0">
                </div>
                 <div class="form-group col-md-6">
                  <label>RUTA (*)</label>
                  <input type="text" class="form-control" value="<?php echo $productos["ruta"]?>" id="ruta" name="ruta" required>
                </div>
                <div class="form-group col-md-6">
                  <label>IMAGEN</label>
                  <input type="file" class="form-control" value="" id="imagen" name="imagen">
                  <input type="hidden" name="imgactual" value="<?php echo $productos["imagen"]?>" />
                </div>
               <div class="form-group col-md-6">
                  <input type="hidden" class="form-control iradio_minimal-green" value="1" id="estado"  name="estado">
                </div>
            </div>

            <!-- DESCRIPCION -->
              <div id="menu1" class="tab-pane fade">
                <div class="form-group col-md-6">
                  <label>DESCRIPCIÓN CORTA</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="5"  class="form-control">
                    <?php echo $productos["Descripcion"]?>
                  </textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>COMPATIBILIDAD</label>
                  <textarea name="compatibilidad" id="compatibilidad" cols="30" rows="5" class="form-control">
                    <?php echo $productos["Compatibilidad"]?>
                  </textarea>
                </div>
           </div>
           
           <!-- CARACTERISTICAS -->
           

             <div id="menu2" class="tab-pane fade">
                <div class="form-group col-md-6">
                  <label>MODELO</label>
                  <input type="text" class="form-control" value="<?php echo $productos["Modelo"]?>" id="modelo" name="modelo">
                </div>
                 <div class="form-group col-md-6">
                  <label>RENDIMIENTO</label>
                  <input type="text" class="form-control" value="<?php echo $productos["Rendimiento"]?>" id="rendimiento" name="rendimiento">
                </div>

               <div class="form-group col-md-6">
                  <label>CATEGORIA</label>
                  <select name="idcategoria" id="idcategoria" class="form-control" required>
                     <?php 
                      foreach ($categorias as $key => $valuec) {
                       echo '<option value="'.$valuec['idCategoria'].'">'.$valuec["NameCategoria"].'</option>';
                      }
                      ?>
                  </select>
                </div>

                 <div class="form-group col-md-6">
                  <label>Marcas</label>
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

            <div id="menu3" class="tab-pane fade">
                <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" value="0" id="nuevo" name="nuevo">
                </div>
               <div class="form-group col-md-6">
                 <div class="form-group col-md-6">
                  <input type="hidden" class="form-control" value="0" id="ofertadoporcategoria" name="ofertadoporcategoria">
                </div>

                 <div class="form-group col-md-6">
                  <input type="hidden" class="form-control" value="0" id="ofertadopormarca" name="ofertadopormarca">
                </div>

                 <div class="form-group col-md-6">
                  <input type="hidden" class="form-control" value="0" id="preciooferta" name="preciooferta" placeholder="marcas-hp-kayre">
                </div>
                 <div class="form-group col-md-6">
                  <input type="hidden" class="form-control" value="" id="finoferta" name="finoferta" class="form-control">
                </div>
                 <div class="form-group col-md-6">
                  <input type="number" class="form-control" value="0" id="descuentooferta" min="0" name="descuentooferta" placeholder="%">
                </div>
                <div class="form-group col-md-6">
                  <input type="hidden" class="form-control" value="" id="imagenoferta" name="imagenoferta" placeholder="marcas-hp-kayre">
                </div>
            </div>
          </div>
        </div>
                

            </div>
              <!-- /.box-body -->
                <!-- /.box-body -->
              <?php 
                $editarProducto=new ControladorProductos();
                $editarProducto->ctrEditarproductoSeleccionado();
               ?>

            <div class="box-footer">
              <button type="submit" id="btnEditarProducto"  class="btn btn-primary">GUARDAR</button>
              <a href="productos" id="btnCancelar" class="btn btn-primary">CANCELAR</a>
            </div>


       </form>     
       <!--=====================================
          =        END    FORMULARIO ADD PRODUCTO =
          ======================================-->  
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