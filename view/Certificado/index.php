<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
    <?php require_once("../html/MainHead.php");?>
    <title>Empresa::Certificado</title>
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">
          <canvas id="canvas" height="785px" width="1115px" class="img-fluid" alt="Responsive image"></canvas>
          <!-- <img src="../../public/certificado.png" class="img-fluid" alt="Responsive image">  -->
        </h1>
         
        <br>
        
        <p class="tx-16 mg-b-30 text-justify" id="cur_descripcion">

        </p>
        <div class="form-layout-footer">
              <button class="btn btn-outline-info" id="btnpng" ><i class="fa fa-send mg-r-10"></i>Descargar en PNG</button>
              <button class="btn btn-outline-success" id="btnpdf"><i class="fa fa-send mg-r-10"></i>Descargar en PDF</button>
        </div><!-- form-layout-footer -->
      </div>
    </div><!-- ht-100v -->

    <?php require_once("../html/MainJs.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript" src="certificado.js"></script>
  </body>
</html>
