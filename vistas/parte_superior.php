<?php
    session_start();
if(!isset($_SESSION["user_name"]) || $_SESSION["user_name"]!="ADMIN_RACOM"){
  header("Location: login/logout.php");
}

$nombre=$_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="es">
<link rel="shortcut icon" href="./Icon.png" />
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>RACOM MQTT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="vendor/BootDatatables/datatables.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="vendor/paho-mqtt.js"  type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
   
</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
              <div id="logo">    
              <br>  
               <img src="descarga (3).png" alt="Logo de RACOM" width="95%" max-height="auto" class="fluid-image">
               <br>
               <hr class="sidebar-divider my-0">  
            </div>
            </a>

            <!-- Divider -->
            

            <!-- Nav Item - Dashboard -->
            <br>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Estado del servidor</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="comunicacion.php">
                    <i class="fas fa-solid fa-paper-plane"></i>
                    <span>Comunicación</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Clientes
            </div>
            <?php
    $path="clientes/";
    $directorio=opendir($path);
    while($archivo=readdir($directorio)){
        $nombreArch=ucwords($archivo);
        if($nombreArch=='.' or $nombreArch=='..' or $nombreArch=="ADMIN_RACOM" or $nombreArch=="Archivos.php"or $nombreArch=="Index.php"or $nombreArch=="Parte_superior.php"or $nombreArch=="Parte_inferior.php"or $nombreArch=="Tabla.php"){
            continue;
        }
       echo "<li class='nav-item'>";
       echo "  <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapse$nombreArch'";
       echo   '  aria-expanded="true" aria-controls="collapseTwo">';
       echo     '<i class="fas fa-solid fa-user"></i>';
       echo     "<span>$nombreArch</span>";
       echo'  </a>';
       echo "  <div id='collapse$nombreArch' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>";
       echo       '  <div class="bg-white py-2 collapse-inner rounded">';
       echo         '  <h6 class="collapse-header">Componentes:</h6>';
       echo         "  <a class='collapse-item' href='archivos.php?nombre=$nombreArch'>Archivos</a>";
       echo         "  <a class='collapse-item' href='personalizado.php?nombre=$nombreArch'>Tabla de mqtt</a>";
       echo     '    </div>';
       echo '  </div>';
       echo' </li>';
    }
    closedir($directorio);
    ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administración
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="ADMIN.php">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Administrador de Usuarios</span></a>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                             <!--Dropdown - User Information -->
                           <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="login/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>