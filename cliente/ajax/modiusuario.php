<?php
date_default_timezone_set('America/Lima');
		if ( empty($_POST['txtape']) || empty($_POST['txtnom']) || empty($_POST['txtdomi']) || empty($_POST['txtdni']) || empty($_POST['usuario']) || empty($_POST['clave'])  ){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtape']) && !empty($_POST['txtnom']) && !empty($_POST['txtdomi'])&& !empty($_POST['txtdni']) && !empty($_POST['usuario'])&& !empty($_POST['clave']) 
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	    require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
            
				$id =strip_tags($_POST["txtid"],ENT_QUOTES); 
				$ape =strip_tags($_POST["txtape"],ENT_QUOTES); 
				$nom = strip_tags($_POST["txtnom"],ENT_QUOTES);
				$pagi = strip_tags($_POST["txtpa"],ENT_QUOTES);
				$domi = strip_tags($_POST["txtdomi"],ENT_QUOTES); 
				$ruc = strip_tags($_POST["txtruc"],ENT_QUOTES); 
				$dni = strip_tags($_POST["txtdni"],ENT_QUOTES); 
				
				 $t1 = strip_tags($_POST["txttele1"],ENT_QUOTES); 
				 $t2 = strip_tags($_POST["txttele2"],ENT_QUOTES); 
			 
				
				$user = strip_tags($_POST["usuario"],ENT_QUOTES); 
               // $nivel = strip_tags($_POST["txtni"],ENT_QUOTES); 
				$cla = base64_encode(strip_tags($_POST["clave"],ENT_QUOTES)); 
                               
				$Fecharegistro=date("Y-m-d H:i:s");
				$estado="1";
				//$registro=$_SESSION['user_id'];
				
                    
               
                 
 $sql2="UPDATE  cliente set telf1='".$t1."',telf2='".$t2."',direccion='".$domi."',paginaweb='".$pagi."',clave='".$cla."' where id_cliente='".$id."' ;";
                 $query_new__insert = mysqli_query($conexion,$sql2);
            
               
                 
                    // if user has been added successfully
                    if ($query_new__insert) {
                        $messages[] = " Modificado con éxito.";
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