<?php
include_once 'conexion.php';
$objeto=new Conexion();
$conexion=$objeto->Conectar();
$consulta="SELECt * FROM datospaginaweb";
$resultado=$conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?> 
<?php require_once "./vistas/parte_superior.php" ?>
<br>
<br>
 <div class="conatiner">
    <div class="row">
            <div class="col-lg-12">
               <input name="Conectar" type="button" class="btn btn-success" value="Conectar" onClick="MQTTconnect()"> 
               <input type="button" name="Desconectar " class="btn btn-danger" value="Desconectar" onclick="disconnect()">
               <br>
               <br>
                <div id="estado"></div>

               <br>
               <form name="Mensajero"  class="d-block d-sm-block form-block p-2 ml-md-3 my-2 my-md-0 mw-100 border " >
                            <div class="input-group">
                               <input type="text" name="Dir" list="lista" class="form-control bg-white border border-dark " placeholder="Direccion..."
                                  aria-label="Search" aria-describedby="basic-addon2">
                                  <datalist id="lista">
                                  <?php
                    foreach($datos as $datos){
                    ?>
                       <option><?php echo $datos["Temas"] ?></option>
                    <?php
                    }
                    ?>
                                  </datalist >
                              <input type="text" name="Par" class="d-inline form-control bg-white border border-dark " placeholder="Enviar parametros..."
                                  aria-label="Search" aria-describedby="basic-addon2">
                          </div>
                          <br>
                          <center>
                          <button id="ENV" class="center btn btn-primary" type="submit" action onClick="send_message()">
                                      <i class="fas fa-paper-plane"></i>
                                  </button>
                          </center>
                  <br>
                  <br>
                  <div id="mensaje"> </div>   
                </form>

           </div>
     </div>  
 </div>
 <script type="text/javascript">

function MQTTconnect() {
    document.getElementById("estado").innerHTML ="";
	document.getElementById("estado").innerHTML='Conectando';
 	mqtt = new Paho.MQTT.Client("localhost",9000,"ADMIN_RACOM/WB");
 	var options = {
         timeout: 3,
 		cleanSession: true,
 		onSuccess: onConnect,
 		onFailure: onFailure,
      
    };
         mqtt.onConnectionLost = onConnectionLost;
    	 mqtt.onConnected = onConnected;

	mqtt.connect(options);
	return false;
  
 
	}
	function send_message(){
        document.getElementById("estado").innerHTML ="";
		if (connected_flag==0){
		out_msg="<b>No conectado no se puede enviar</b>"
		console.log(out_msg);
		document.getElementById("estado").innerHTML = out_msg;
		return false;
        }
	   var msg = document.forms["Mensajero"]["Par"].value;
       var topic = document.forms["Mensajero"]["Dir"].value;
       document.getElementById("mensaje").innerHTML="Enviando mensaje  "+msg;
 		message = new Paho.MQTT.Message(msg);
		message.destinationName = topic;
 		message.qos=0;
        mqtt.send(message);
		return false;
 	}
    


	function onConnectionLost(){
	document.getElementById("estado").innerHTML ="Conexion terminada";
	connected_flag=0;
	}
	function onFailure(message) {
		document.getElementById("estado").innerHTML = "Conexion Fallida ";
        setTimeout(MQTTconnect, reconnectTimeout);
        }

		
	function onConnected(recon,url){
	console.log(" in onConnected " +reconn);
	}
	function onConnect() {
	  // Once a connection has been made, make a subscription and send a message.
	document.getElementById("estado").innerHTML ="Conectado al servidor";
	connected_flag=1;

	  }
	  function disconnect()
	  {
		if (connected_flag==1)
			mqtt.disconnect();
	  }
 </script>
<?php require_once "./vistas/parte_inferior.php" ?>