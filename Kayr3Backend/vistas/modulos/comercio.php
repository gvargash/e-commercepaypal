<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor comercio
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestor comercio</li>
    
    </ol>

  </section>

  <section class="content">

   <div class="row">
     <div class="col-md-6">
       

    <?php
     /*=====================================
        ADMINISTRAR logotipo
        ======================================*/

       include"comercio/logotipo.php"; 
     /*=====================================
        ADMINISTRAR logotipo
        ======================================*/

        include "comercio/colores.php";
        
         /*=====================================
        ADMINISTRAR REDES SOCIALES
        ======================================*/
  
        include "comercio/redSocial.php";



     ?>
     </div>
      <div class="col-md-6">
        
      <!--=====================================
      BLOQUE 2
      ======================================-->

        <?php
        
       /*=====================================
        ADMINISTRAR CÓDIGOS
        ======================================*/
  
        include "comercio/codigos.php";

        /*=====================================
        ADMINISTRAR COMERCIO
        ======================================*/
  
        include "comercio/informacion.php";

        ?>
   
      </div>
   </div>
  </section>

</div>