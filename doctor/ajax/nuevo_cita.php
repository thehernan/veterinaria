<?php
date_default_timezone_set('America/Lima');
	
		if ( empty($_POST['txtid']) || empty($_POST['txtf']) || empty($_POST['txtnota']) || empty($_POST['txtas'])  ){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtid']) && !empty($_POST['txtf']) && !empty($_POST['txtnota'])&& !empty($_POST['txtas']) 
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
            require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
            $nfecha = new DateTime($_POST["txtf"]);                                
            $nfecha->format('d-m-Y H:i:s');
				$cliente =strip_tags($_POST["txtid"],ENT_QUOTES); 
				$fecha = $nfecha->format('d-m-Y H:i:s');
				$nota = strip_tags($_POST["txtnota"],ENT_QUOTES); 
				$asunto = strip_tags($_POST["txtas"],ENT_QUOTES); 
				$tipom = strip_tags($_POST["optradio"],ENT_QUOTES); 
            
                                 if ($tipom ==1) {
                                     $sql="insert into cita(`id_cita`,`id_cliente`,`fecha`,`nota`,`asunto`)values(null,'".$cliente."','".$fecha."','".$nota."','".$asunto."')";
                                     $query_new_cita_insert = mysqli_query($conexion,$sql);
                                 }else
                                 if ($tipom ==2) {
                                     
                                     $fefinal = strip_tags($_POST["txtff"],ENT_QUOTES);
                                     
                                     $sql="insert into cita(id_cita,id_cliente,fecha,nota,asunto,fechafinal,tipocita)values(null,'".$cliente."','".$fecha."','".$nota."','".$asunto."','".$fefinal."','Reservado')";
                                   // echo $sql;
                                     $query_new_cita_insert = mysqli_query($conexion,$sql);
                                 }
				
                 //$sql = "call SP_insertar_cita('".$cliente."','".$fecha."','".$nota."','".$asunto."',0);";
				 
				 
            
            
                    // if user has been added successfully
                    if ($query_new_cita_insert) {
                        $messages[] = "Nueva Cita Registrada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                    
            
         }else {
            $errors[] = "Un error desconocido ocurrió.";
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

?>