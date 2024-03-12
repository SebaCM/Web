
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

    
</div>
<!-- FIN DEL CONTENIDO -->
<?php require_once "parte_inferior.php" ?>
