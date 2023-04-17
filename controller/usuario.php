<?php 
    /* llamando a la cadena de conexion */
    require_once("../config/conexion.php");

   /*  llamando a la clase */
    require_once("../models/Usuario.php");
    /* inicializando la clase */
    $usuario = new Usuario();

    /* opcion de solicitud de controller */
    switch($_GET["op"]){
        /* Microservicio para poderm mostrar el listado de los cursos de un usuario con certificado */
        case "listar_cursos":
            $datos=$usuario->get_cursos_x_usuario($_POST["usu_id"]);
            $data=Array();
            foreach( $datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fecinicio"];
                $sub_array[] = $row["cur_fecfin"];
                $sub_array[] = $row["inst_nomb"]. " " .$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"> <div> <i class="fa fa-id-card-o"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

       /*  Microservicio para mostrar informacion del certificado con el curd_id */
        case "mostrar_curso_detalle":
            $datos=$usuario->get_curso_x_id_detalle($_POST["curd_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach( $datos as $row){
                    $output["curd_id"]          = $row["curd_id"];
                    $output["cur_id"]           = $row["cur_id"];
                    $output["cur_nom"]          = $row["cur_nom"];
                    $output["cur_descripcion"]  = $row["cur_descripcion"];
                    $output["cur_fecinicio"]    = $row["cur_fecinicio"];    
                    $output["cur_fecfin"]       = $row["cur_fecfin"];
                    $output["usu_id"]           = $row["usu_id"];
                    $output["usu_nom"]         = $row["usu_nom"];
                    $output["usu_apep"]         = $row["usu_apep"];
                    $output["usu_apem"]         = $row["usu_apem"];
                    $output["inst_id"]          = $row["inst_id"];
                    $output["inst_nomb"]         = $row["inst_nomb"];
                    $output["inst_apep"]        = $row["inst_apep"];
                    $output["inst_apem"]        = $row["inst_apem"];
                }
                echo json_encode($output);
            }
            break;
        /* Microservicio para mostrar el total de cursos por usuario en el Dashboard */
        case "total":
            $datos=$usuario->get_total_cursos_x_usuario($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach( $datos as $row){
                    $output["total"]          = $row["total"];
                }
                echo json_encode($output);
            }
            break;

        /* Microservicio para poderm mostrar el listado de los cursos de un usuario con certificado TOP 10 */
        case "listar_cursos_top10":
            $datos=$usuario->get_cursos_x_usuario_top10($_POST["usu_id"]);
            $data=Array();
            foreach( $datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fecinicio"];
                $sub_array[] = $row["cur_fecfin"];
                $sub_array[] = $row["inst_nomb"]. " " .$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"> <div> <i class="fa fa-id-card-o"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;
    }
?>