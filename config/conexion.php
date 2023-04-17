<?php 

    /* Inicializando la sesion del usuario */
    session_start();

    /* Iniciamos clase Conectar */
    class Conectar{
        protected $dbh;
        /* funcion protegida de la cadena de conexion */
        protected function Conexion(){
            try{
                /* cadena de conexion */
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=certificados_diplomas_dl","root","");
                return $conectar;
            }catch(Exception $e){
                /* en caso de que hubiera un error en la  cadena de conexion */
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        /* para impedir que tengamos porblemas con las ñ o tildes */
        protected function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
        /* ruta principal del proyecto */
        public static function ruta(){
            return "http://localhost/proyectos/ProyectoCertificadosDiplomas/";
        }
    }
?>