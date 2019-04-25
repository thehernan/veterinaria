<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insertarea
 *
 * @author HERNAN
 */
require_once ("../controller/areacontroller.php");
require_once ("../model/area.php");

$daoarea = new areadao();
$area = new area();
$descripcion = utf8_decode($_POST["txtdescripcion"]);
$observacion = "";
if(!empty($_POST["txtobservacion"])){
    $observacion = $_POST["txtobservacion"];
}

$fila = 0;
$area->setDescripcion($descripcion);
$area->setObservacion($observacion);
$fila =$daoarea->insertar($area);

if ($fila !=0) 
{
      $messages[] = "Nueva Area Registrada con éxito.";
} else {
      $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                
}

if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}











