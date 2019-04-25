<?php
date_default_timezone_set('America/Lima');
	
		if ( empty($_POST['txtape']) || empty($_POST['txtnom']) || empty($_POST['txtdomi']) || empty($_POST['txtdni']) || empty($_POST['txtce']) || empty($_POST['txtpro']) || empty($_POST['txtid'])  ){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtape']) && !empty($_POST['txtnom']) && !empty($_POST['txtdomi'])&& !empty($_POST['txtdni']) && !empty($_POST['txtce']) && !empty($_POST['txtpro']) && !empty($_POST['txtid']) 
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
			
			
                                $iddoc =strip_tags($_POST["txtid"],ENT_QUOTES); 
				$ape =strip_tags($_POST["txtape"],ENT_QUOTES); 
				$nom = strip_tags($_POST["txtnom"],ENT_QUOTES);
				$domi = strip_tags($_POST["txtdomi"],ENT_QUOTES); 
				$dni = strip_tags($_POST["txtdni"],ENT_QUOTES); 
				$cel = strip_tags($_POST["txtce"],ENT_QUOTES); 
				$pro = strip_tags($_POST["txtpro"],ENT_QUOTES); 
				
            
				$Fecharegistro=date("Y-m-d H:i:s");
				//$registro=$_SESSION['user_id'];
				
                
                 $sql = "UPDATE doctor SET nombre='".$nom."',apellidos='".$ape."',direccion='".$domi."',dni='".$dni."',celular='".$cel."',profesion='".$pro."' WHERE iddoctor='".$iddoc."';";
                    //echo $sql;
                    $query_new_apoderado_insert = mysqli_query($conexion,$sql);
            
            
                    // if user has been added successfully
                    if ($query_new_apoderado_insert) {
                        $messages[] = "Doctor Modificado con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                    
            
        } else {
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