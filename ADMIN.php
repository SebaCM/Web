<?php
include_once './conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$consulta="SELECt * FROM usuarios";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?> 
<title>Administrador de Usuarios</title>
<?php require_once "./vistas/parte_superior.php" ?>
<div class="conatiner">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-info">Nuevo Cliente</button>
                <button type="button" class="btn btn-info" id="btnDecode"> Decodificar</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
            <div class="table-responsive">
                <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Contraseña </th>
                                <th>IP</th>
                                <th>Modificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            <form id="formPersonas">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Usuario" class="col-form-label">Usuario:</label>
                        <input type="text" class="form-control" id="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="Contraseña" class="col-form-label">Contraseña:</label>
                        <input type="text" class="form-control" id="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="IP" class="col-form-label">IP:</label>
                        <input type="text" class="form-control" id="IP">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar"class="btn btn-dark">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<?php require_once "./vistas/parte_inferior.php" ?>