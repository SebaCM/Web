<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingreso</title>  
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos.css">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="./node_modules/ajax/lib/ajax.js"></script> -->
</head>
<body>
    <div id="login">
        <h3 class="text-center display-4">Ingreso</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-light text-dark form-group container">
                       <form id="formLogin" class="form" action="" method="post">
                         <h3 class="text-center text-dark">Iniciar Sesión</h3>
                           <div class="form-group">
                             <label for="usuario" class="text-dark">Usuario</label>
                             <input type="text" name="usuario" id="usuario" class="form-control">
                           </div>
                           <div class="form-group">
                             <label for="password" class="text-dark">Contraseña</label>
                             <input type="password" name="password" id="password" class="form-control">
                           </div>
                           <div class="form-group btn d-grid gap-2 col-6 mx-auto ">
                             <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Conectar">
                           </div>
                       </form >
                    </div>
                </div> 
            </div>
        </div>
    
    </div>  

    <script src="codigo.js"></script>
   

</body>
</html>