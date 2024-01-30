<?php
session_start();
if(isset($_SESSION["user_name"])){
  if($_SESSION["user_name"]=="ADMIN_RACOM"){
    header("Location: ../index.php");
}else{
  header("Location: ../clientes/index.php");
}
}
?>
<!DOCTYPE html>
<html lang="es">
<link rel="shortcut icon" href="../Icon_pestaña.png" />
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
 
</head>
<body>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../img/racom.png"
          class="img-fluid" alt="Logo de RACOM">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form  id="formLogin" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <h2 class="text-center">Ingreso</h2>
          <div class="divider d-flex align-items-center my-4"></div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="usuario" id="usuario"type="text"class="form-control form-control-lg"
              placeholder="Usuario" />
            <label class="form-label" for="usuario">Usuario</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input  type="password" name="password" id="password" class="form-control form-control-lg"
              placeholder="Contraseña" />
            <label class="form-label"for="password">Contraseña</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <a href="#!" class="text-body" data-toggle="modal" data-target="#ContraseñaOlvidada">¿Olvidaste la contraseña?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="submit"  value="Ingresar" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"></input>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright &reg; RACOM Microelectronics SA de CV.                         
     </div>
    <!-- Copyright -->
    <div class="modal fade" id="ContraseñaOlvidada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Si no se acuerda de la contraseña:</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <div class="modal-body">Contacte a RACOM</div>
           <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
       </div>
   </div>
</div>

</section>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="codigo.js"></script>
</body>
</html> 
