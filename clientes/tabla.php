<?php require_once "parte_superior.php" ?>
<?php
include_once '../../conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$consulta="SELECt * FROM datospaginaweb WHERE Temas LIKE '%$nombre/%'";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- INICIO CONTENIDO -->
<div class="container">
    <h1>Tabla de Comunicaciones MQTT</h1>
</div>
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
        $(document).ready(function(){
            $('#TablaMqtt').DataTable();
        });
    </script>
<!-- FIN DEL CONTENIDO -->
<?php require_once "parte_inferior.php" ?>