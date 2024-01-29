<?php
                function solicitar(){
                $user=$_SESSION["user_name"];
                $ip=$_SESSION["ip_host"];
                 $output=shell_exec("cd C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard && npx cypress run --env HOST=$ip/sys/history.html,FOLDER=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/ --config downloadsFolder=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/");
                echo "--config downloadsFolder=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/";
                }
?>
<?php require_once "parte_superior.php" ?>
<!-- INICIO CONTENIDO -->
<div id='lista' class="container" >
<h1><?php echo $_SESSION["user_name"]?></h1>
    <?php
    echo "<table>\n";
    $user=$_SESSION["user_name"];
    $path="./$user/";
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
<?php require_once "parte_inferior.php" ?>