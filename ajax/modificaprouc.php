<?php
session_start();
date_default_timezone_set('America/Lima');
//print_r($_POST);
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");

$productocontrol = new productocontroller();
$producto = new producto();

		if ( empty($_POST['txtid']) || empty($_POST['txtdes']) ){  
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtid']) && !empty($_POST['txtdes']) 
        ) {
         
			
                                $cb = strip_tags($_POST["txtco"],ENT_QUOTES); 
				$codigo =strip_tags($_POST["txtid"],ENT_QUOTES); 
				$descripcion = strip_tags($_POST["txtdes"],ENT_QUOTES);
				$preciov = strip_tags($_POST["preciov"],ENT_QUOTES); 
				$precioc = strip_tags($_POST["precioc"],ENT_QUOTES); 
				$umco = strip_tags($_POST["umecom"],ENT_QUOTES); 
				$umve = strip_tags($_POST["umeven"],ENT_QUOTES); 
				$stockmin = strip_tags($_POST["stockmin"],ENT_QUOTES); 
				$stockmax = strip_tags($_POST["stockmax"],ENT_QUOTES); 
				$factor = strip_tags($_POST["factor"],ENT_QUOTES); 
				$idunim = strip_tags($_POST["idunidmed"],ENT_QUOTES); 
				//$lote = strip_tags($_POST["lote"],ENT_QUOTES); 
                                $codsunat = strip_tags($_POST["idcodsunat"],ENT_QUOTES); 
                                
                                
                                $fechafab = strip_tags($_POST["fechafact"],ENT_QUOTES);
                                $fechaexp = strip_tags($_POST["fechaexp"],ENT_QUOTES);
                                $nlote = strip_tags($_POST["nlote"],ENT_QUOTES);
                                $rs = strip_tags($_POST["rs"],ENT_QUOTES);
                                $stock = strip_tags($_POST["invinicial"],ENT_QUOTES);
                                
                                $lote = 1;
                                $fila = 0;

                if(empty($_POST['lote'])){
    
                    $lote=0;
                    }
                    $producto->setCodigo($cb);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($preciov);
                    $producto->setStock($stock);
                    $producto->setIdunidmed($idunim);
                    $producto->setLote($lote);
                    $producto->setUnidmedv($umve);
                    $producto->setUnidmedc($umco);
                    $producto->setStockmin($stockmin);
                    $producto->setStockmax($stockmax);
                    $producto->setPrecioc($precioc);
                    $producto->setFactor($factor);
                    $producto->setIdcodsunat($codsunat);
                    $producto->setFechafab($fechafab);
                    $producto->setFecha_exp($fechaexp);
                    $producto->setNlote($nlote);
                    $producto->setRs($rs);
                    $producto->setId($codigo);
                     
                    $fila = $productocontrol->actualizar($producto);
                            
				
//                 $sql = "UPDATE producto set descripcion='".$descripcion."',precio='".$preciov."',activo='1',idusuario='".$registro."',
//id_unidad_medida='".$idunim."',lote='".$lote."',unidmedventa='".$umve."',unidmedcompra='".$umco."',stockmin='".$stockmin."',
//stockmax='".$stockmax."',preciocompra='".$precioc."',factor='".$factor."',id_codigosunat='".$codsunat."' where id_producto='".$codigo."'";
//                    
//                    $query_new_apoderado_insert = mysqli_query($conexion,$sql);
            
            
                    // if user has been added successfully
                    if ($fila != 0) {
                        $messages[] = "Modificado con éxito.";
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