<?php 
session_start();
include_once '../conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$usuario=(!empty($_POST['usuario'])) ? $_POST['usuario']:'';
$password=(!empty($_POST['password'])) ? $_POST['password']:'';
$pass=base64_encode($password);
$consulta="SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Contraseña = '$pass'";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"]=$usuario;
}else{
    $_SESSION["s_usuario"]=null;
    $data=0;
}
print json_encode($data);
$conexion=null;
?>

