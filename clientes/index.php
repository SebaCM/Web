<?php require_once "parte_superior.php" ?>
<?php
                function solicitar(){
                $user=$_SESSION["user_name"];
                $ip=$_SESSION["ip_host"];
                 $output=shell_exec("cd C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard && npx cypress run --env HOST=$ip/sys/history.html,FOLDER=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/ --config downloadsFolder=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/");
                echo "--config downloadsFolder=C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/$user/";
                }
?>

<?php require_once "parte_inferior.php" ?>