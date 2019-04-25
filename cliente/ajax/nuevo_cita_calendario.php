<?php
include ('../funcionescalendar.php');
date_default_timezone_set('America/Lima');
print_r($_POST) ;
		if ( empty($_POST['txtid']) || empty($_POST['to']) || empty($_POST['from'])   ){ 
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtid']) && !empty($_POST['to']) && !empty($_POST['from']) 
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
			
        $cliente =strip_tags($_POST["txtid"],ENT_QUOTES);
        $inicio = _formatear($_POST['from']);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);
			
       $query="INSERT INTO eventos (title,body,url,class,start,end,inicio_normal,final_normal,id_cliente,atendido,tipocita)"
                . "VALUES('$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal','$cliente','1','RESERVADO')";
        $query_new_cita_insert=mysqli_query($conexion, $query);
        echo $query;

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // para generar el link del evento
        $link = "descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 
				/*$cliente =strip_tags($_POST["txtid"],ENT_QUOTES); 
				$fecha = strip_tags($_POST["txtf"],ENT_QUOTES);
				$nota = strip_tags($_POST["txtnota"],ENT_QUOTES); 
				$asunto = strip_tags($_POST["txtas"],ENT_QUOTES); 
				$tipom = strip_tags($_POST["optradio"],ENT_QUOTES); 
            */
                                /* if ($tipom ==1) {
                                     $sql="insert into cita(`id_cita`,`id_cliente`,`fecha`,`nota`,`asunto`)values(null,'".$cliente."','".$fecha."','".$nota."','".$asunto."')";
                                     $query_new_cita_insert = mysqli_query($conexion,$sql);
                                 }else
                                 if ($tipom ==2) {
                                     
                                     $fefinal = strip_tags($_POST["txtff"],ENT_QUOTES);
                                     
                                     $sql="insert into cita(id_cita,id_cliente,fecha,nota,asunto,fechafinal,tipocita)values(null,'".$cliente."','".$fecha."','".$nota."','".$asunto."','".$fefinal."','Reservado')";
                                   // echo $sql;
                                     $query_new_cita_insert = mysqli_query($conexion,$sql);
                                 }*/
				
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