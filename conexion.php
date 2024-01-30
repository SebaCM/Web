<?php
class Conexion{
    public static function Conectar(){
        define('servidor','racom-lab.com');
        define('nombre_bd','wwraco_mqtt_data');
        define('usuario','wwraco_mqtt_root');
        define('password','Iwf5Lp1_aYFV');
        $opciones=array(
            PDO::ATTR_EMULATE_PREPARES=>FALSE,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
        try{
            $conexion=new PDO("mysql:host=".servidor."; dbname=".nombre_bd,usuario,password,
            $opciones);
            return $conexion;
        }catch (Exception $e){
            die("El error de conexion es: ".$e->getMessage());
        }
    }
}