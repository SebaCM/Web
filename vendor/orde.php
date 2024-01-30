<?php
include_once '../conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar(); 

$ID=(isset($_POST['Id'])) ? $_POST["Id"]: " ";
$Usuario=(isset($_POST['Usuario'])) ? $_POST["Usuario"]: " ";
$Contraseña=(isset($_POST['Contraseña'])) ? $_POST["Contraseña"]: " ";
$ip=(isset($_POST['IP'])) ? $_POST["IP"]: " ";
$Opcion=(isset($_POST["Opcion"])) ? $_POST["Opcion"]: " " ;
switch ($Opcion){
    case 1:
         $consulta="ALTER TABLE usuarios AUTO_INCREMENT=1";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         $consulta ="INSERT INTO usuarios (Usuario,Contraseña,IP) VALUES ('$Usuario',TO_BASE64('$Contraseña'),'$ip')";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         if(!file_exists("../clientes/$Usuario")){
          mkdir("../clientes/$Usuario",0777,true);
         }


         $consulta="SELECT * FROM usuarios ORDER BY ID DESC LIMIT 1";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         break;

    case 2:
         $consulta="UPDATE usuarios SET Usuario='$Usuario', Contraseña= TO_BASE64( '$Contraseña'), IP='$ip' WHERE id='$ID'";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         if(!file_exists("../clientes/$Usuario")){
          mkdir("../clientes/$Usuario",0777,true);
         }

         $consulta="SELECT * FROM usuarios";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         break;

    case 3:
         rmdir("../clientes/$Usuario");
         $consulta="DELETE FROM usuarios WHERE id= '$ID'";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         rmdir("../clientes/$Usuario");
         $consulta="SELECT * FROM usuarios ";
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         rmdir("../clientes/$Usuario");
         break;
    case 4:
        $consulta="SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
};
//ENVIAR el array final en jsona nuestro ajax
print json_encode($data,JSON_UNESCAPED_UNICODE);
$conexion=NULL;

?>