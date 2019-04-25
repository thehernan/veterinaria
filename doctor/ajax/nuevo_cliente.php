<?php
date_default_timezone_set('America/Lima');
	
		if (  empty($_POST['txtnom']) || empty($_POST['txtdomi']) || empty($_POST['txtdni']) || empty($_POST['txtema'])){   //empty($_POST['txtape']) ||
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtnom']) && !empty($_POST['txtdomi'])    // !empty($_POST['txtape']) &&
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
			
			
//				$ape =strip_tags($_POST["txtape"],ENT_QUOTES); 
				$nom = strip_tags($_POST["txtnom"],ENT_QUOTES);
				$domi = strip_tags($_POST["txtdomi"],ENT_QUOTES); 
				$dni = strip_tags($_POST["txtdni"],ENT_QUOTES); 
//				$ruc = strip_tags($_POST["txtruc"],ENT_QUOTES); 
				$t1 = strip_tags($_POST["txtt1"],ENT_QUOTES); 
				$t2 = strip_tags($_POST["txtt2"],ENT_QUOTES); 
				$ema = strip_tags($_POST["txtema"],ENT_QUOTES); 
				$web = strip_tags($_POST["txtpw"],ENT_QUOTES); 
                                
                                $tipodoc = strip_tags($_POST["idtipodoc"],ENT_QUOTES);
                                $clave = '123456';
				$Fecharegistro=date("Y-m-d H:i:s");
				$estado="0";
				//$registro=$_SESSION['user_id'];
					$compara="select * from cliente where dni='".$dni."'";
                    $exe=mysqli_query($conexion,$compara);
                    $bu=mysqli_fetch_assoc($exe);
                    $dnibs= $bu['dni'];
                if($dni==$dnibs){
                     $errors[] = "Cliente ya existe.";
                }else{
                 $sql = "INSERT INTO cliente (nombre, direccion,telf1,telf2,dni,email,activo,f_creacion,paginaweb,clave,nivel,id_tipo_documento)
       VALUES('".$nom."','".$domi."','".$t1."','".$t2."','".$dni."','".$ema."','".$estado."','".$Fecharegistro."','".$web."','".base64_encode($clave)."','2','".$tipodoc."');";
                    
                    $query_new_apoderado_insert = mysqli_query($conexion,$sql);
            
            
                    // if user has been added successfully
                    if ($query_new_apoderado_insert) {
                        $messages[] = "Nuevo Cliente Registrado con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
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