<?php
date_default_timezone_set('America/Lima');
	
		if ( empty($_POST['txtid']) || empty($_POST['txtnom']) || empty($_POST['txtdomi'])   ){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtid']) && !empty($_POST['txtnom']) && !empty($_POST['txtdomi']) 
        ) {
         
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/proveedorcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");
        $controlc = new proveedorcontroller();
        $proveedor = new proveedor();
        $fila = 0;
			
			
				$id =strip_tags($_POST["txtid"],ENT_QUOTES); 
//				$ape =strip_tags($_POST["txtape"],ENT_QUOTES); 
				$nom = strip_tags($_POST["txtnom"],ENT_QUOTES);
				$domi = strip_tags($_POST["txtdomi"],ENT_QUOTES); 
				$dni = strip_tags($_POST["txtdni"],ENT_QUOTES); 
//				$ruc = strip_tags($_POST["txtruc"],ENT_QUOTES); 
				$t1 = strip_tags($_POST["txtt1"],ENT_QUOTES); 
				$t2 = strip_tags($_POST["txtt2"],ENT_QUOTES); 
				$ema = strip_tags($_POST["txtema"],ENT_QUOTES); 
				$web = strip_tags($_POST["txtpw"],ENT_QUOTES); 
                                $dis = strip_tags($_POST["txtdis"],ENT_QUOTES); 
				$pro = strip_tags($_POST["txtpro"],ENT_QUOTES); 
                                
                                $tipodoc = strip_tags($_POST["idtipodoc"],ENT_QUOTES); 
            
				$proveedor->setId($id);
                                $proveedor->setNombre($nom);
                                $proveedor->setDireccion($domi);
                                $proveedor->setNdoc($dni);
                                $proveedor->setTelf1($t1);
                                $proveedor->setTelf2($t2);
                                $proveedor->setEmail($ema);
                                $proveedor->setPaginaweb($web);
                                $proveedor->setDistrito($dis);
                                $proveedor->setProvincia($pro);
                                $proveedor->setTipodoc($tipodoc);
				//$registro=$_SESSION['user_id'];
                                
                                $fila =$controlc->update($proveedor);
			
               
            
            
                    // if user has been added successfully
                    if ($fila > 0) {
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