<?php 
  /* Llamamos al archivo de conexion.php */
  require_once("../../config/conexion.php");
  if(isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Empresa::Home</title>
    <?php require_once("../html/MainHead.php");?>
  </head>

  <body>
    <?php require_once("../html/MainMenu.php");?>

    <?php require_once("../html/MainHeader.php");?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Inicio</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Inicio</h4>
        <p class="mg-b-0">Pantalla Inicio</p>
      </div>
      <!-- Contenido del proyecto -->
      <div class="br-pagebody mg-t-5 pd-x-30">
      <!-- Resumen de total de cursos -->
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-6">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total de Cursos</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="lbltotal"></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-6 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total de Cursos Terminados</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="lbltotal"></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->
        <!-- Resumen top 10 de cursos-->
        <div class="row row-sm mg-t-20">
          <div class="col-12">
            <div class="card pd-0 bd-0 shadow-base">
              <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Top Ultimos cursos</h6>
                    <p class="mg-b-0">Acá podra visualizar los ultimos 10 certificados...</p>
                  </div>
                </div>
              <div class="pd-x-15 pd-b-15">
                <div class="table-wrapper">
                  <table id="cursos_data" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Curso</th>
                        <th class="wd-15p">Fecha Inicio</th>
                        <th class="wd-20p">Fecha Fin</th>
                        <th class="wd-15p">Instructor</th>
                        <th class="wd-10p">Generar</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php require_once("../html/MainJs.php");?>
    <script type="text/javascript" src="usuhome.js"></script>
  </body>
</html>
<?php
  }else{
    /* Si no se ha iniciado sesion de redireccionara a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
  }
?>

