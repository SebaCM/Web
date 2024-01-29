<?php
include_once './conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$consulta="SELECt * FROM datospaginaweb";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
echo $datos["ID"];
 ?>
