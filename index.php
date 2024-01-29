<?php
include_once './conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$consulta="SELECt * FROM datospaginaweb";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once "./vistas/parte_superior.php" ?>
<!-- INICIO CONTENIDO -->
<div class="container">
        <div class="row">
            <div class="col-lg-12 ">
            <div class="table-responsive">
                <table id="TablaMqtt" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                  <th>ID</th>
                  <th>Tema</th>
                  <th>Datos</th>
                  <th>Cliente</th>
                  <th>Fecha</th>
                </thead>
                <tbody>
                    <?php
                    foreach($datos as $datos){
                    ?>
                    <tr>
                       <td><?php echo $datos["id"] ?></td>
                       <td><?php echo $datos["Temas"] ?></td>
                       <td><?php echo $datos["Datos"] ?></td>
                       <td><?php echo $datos["Cliente"] ?></td>
                       <td><?php echo $datos["Fecha"] ?></td>
                    </tr>
                    <?php
                    }
                    ?>

                </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    <script>
        // $(document).ready(function(){
        //     $('#TablaMqtt').DataTable();
        // });
    </script>
<!-- FIN DEL CONTENIDO -->
<?php require_once "./vistas/parte_inferior.php" ?>
