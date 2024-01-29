<?php
                function solicitar(){
                $user=$_SESSION["user_name"];
                $ip=$_SESSION["ip_host"];
                 $output=shell_exec("cd C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard && npx cypress run --env HOST=$ip/sys/history.html,FOLDER=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user --config downloadsFolder=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user");
                echo $output;
                }
                $usuario=$_GET["nombre"];
?>
<?php require_once "./vistas/parte_superior.php" ?>
<!-- INICIO CONTENIDO -->
<div id='lista' class="container" >
    <h1><?php echo $usuario ?></h1>
    <?php
    echo "<table>\n";
    $usuario=$_GET["nombre"];
    $path="./clientes/$usuario/";
    $directorio=opendir($path);
    while($archivo=readdir($directorio)){
        $nombreArch=ucwords($archivo);
        if($nombreArch=='.' or $nombreArch=='..'){
            continue;
        }
        echo "<tr>\n<td>\n<a href='$path$nombreArch'>\n";
        echo "<b>&nbsp;$nombreArch</b></a></td>\n";
        echo "\n</tr>\n";
    }
    closedir($directorio);
    echo "</table>\n";
    ?>
<script>
    alert("<?php echo solicitar(); ?>")
</script>
    
</div>
<!-- FIN DEL CONTENIDO -->
<?php require_once "./vistas/parte_inferior.php" ?>
