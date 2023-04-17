<?php 
     class Usuario extends Conectar {
        /* funcion para login de acceso de usuario */
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                if(empty($correo) and empty($pass)){
                    /* En caso de que ambos campos esten vacios devolver al index con mensaje "2" */
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1,$correo);
                    $stmt->bindValue(2,$pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if(is_array($resultado)and count($resultado)>0){
                        $_SESSION["usu_id"]     =$resultado["usu_id"];
                        $_SESSION["usu_nom"]    =$resultado["usu_nom"];
                        $_SESSION["usu_ape"]    =$resultado["usu_ape"];
                        $_SESSION["usu_correo"] =$resultado["usu_correo"];
                        /* Si todo esta correcto redirigir a Home */
                        header("Location:".conectar::ruta()."view/UsuHome/");
                        exit();
                    }else{
                        /* En caso de que no coincida el usuario o la contraseña */
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        /* Funcion para mostrar todos los cursos en los cuales esta inscrito un usuario */
        public function get_cursos_x_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="  SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descripcion,
                    tm_curso.cur_fecinicio,
                    tm_curso.cur_fecfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nomb,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                    FROM ((`td_curso_usuario` INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id) INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id) INNER JOIN tm_instructor on tm_curso.inst_id = tm_instructor.inst_id
                    WHERE 
                    td_curso_usuario.usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* Funcion para mostrar todos los datos de un curso al que esta inscrito un usuario */
        public function get_curso_x_id_detalle($curd_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="  SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descripcion,
                    tm_curso.cur_fecinicio,
                    tm_curso.cur_fecfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nomb,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                    FROM ((`td_curso_usuario` INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id) INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id) INNER JOIN tm_instructor on tm_curso.inst_id = tm_instructor.inst_id
                    WHERE 
                    td_curso_usuario.curd_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $curd_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        
        /* Funcion para mostrar todos los cursos en los cuales esta inscrito un usuario TOP 10 */
        public function get_cursos_x_usuario_top10($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="  SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descripcion,
                    tm_curso.cur_fecinicio,
                    tm_curso.cur_fecfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nomb,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                    FROM ((`td_curso_usuario` INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id) INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id) INNER JOIN tm_instructor on tm_curso.inst_id = tm_instructor.inst_id
                    WHERE 
                    td_curso_usuario.usu_id = ?
                    LIMIT 10";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* Cantidad de cursos por usuario */
        public function get_total_cursos_x_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="  SELECT count(*) as total from td_curso_usuario WHERE usu_id = ? limit 10";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
     }
?>

