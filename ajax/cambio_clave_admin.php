<?php
date_default_timezone_set('America/Lima');
	
		if ( empty($_POST['nclave']) || empty($_POST['id'])){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['nclave']) && !empty($_POST['id'])) 
         {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
            require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
			
			
				$id =strip_tags($_POST["id"],ENT_QUOTES); 
				$clave = base64_encode(strip_tags($_POST["nclave"],ENT_QUOTES)); 
			
				            
				$Fecharegistro=date("Y-m-d H:i:s");
				$estado="1";
				//$registro=$_SESSION['user_id'];
			
                 $sql = "UPDATE  admin SET clave ='".$clave.
                       "' where id_admin ='".$id."'";
                    
                    $query_new_apoderado_insert = mysqli_query($conexion,$sql);
            
            
                    // if user has been added successfully
                    if ($query_new_apoderado_insert) {
                        $messages[] = "Se Modifico con éxito.";
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
