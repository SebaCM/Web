<?php
$id=$_POST["id"];
$user=$_POST["user"];
$ip=$_POST["ip"];
session_start();
$_SESSION["id_user"]=$id;
$_SESSION["user_name"]=$user;
$_SESSION["ip_host"]=$ip;
?>