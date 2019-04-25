
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabla_consultaringresos
 *
 * @author HERNAN
 */

date_default_timezone_set('America/Lima');
	
if ( empty($_POST['from']) || empty($_POST['to']) || empty($_POST['area'])){ 
        $errors[] = "Verifique Datos";
}  elseif (
         !empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['area'])) 
         {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
			
			
                $desde =strip_tags($_POST["from"],ENT_QUOTES); 
                $hasta = strip_tags($_POST["to"],ENT_QUOTES);
                $area = strip_tags($_POST["area"],ENT_QUOTES); 
                
                $tventa=0;
                $tcosto=0;
                $tutilidad=0;
             ?>   
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Nombre / Razón Social</th>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Total | <a target="_blank" href="./pdf/documentos/utilidad_doc_banio.php?des=<?php echo $desde; ?>&& hasta=<?php echo $hasta; ?> && area=<?php echo  $area?>"> <img src="./img/pdf.png" width="30px" >  </a></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once ("../config/db.php");
                            require_once ("../config/conexion.php");
                        $s=1;
                        $sql='SELECT det.cantidad,CONCAT(c.nombre," ",c.apellidos) as vcliente,det.codigo,det.descripcion,
det.precio  
 from documento as doc INNER JOIN cliente as c 
 on doc.id_cliente=c.id_cliente  inner JOIN detalle as det on doc.id_documento=det.id_documento  where doc.fecha BETWEEN "'.$desde.'" and "'.$hasta.'" and  doc.idarea='.$area;
                        
                       
                        $execute=mysqli_query($conexion,$sql);
                        while($row=mysqli_fetch_array($execute)){


                        ?>
                        <tr class="odd gradeX">
                            <td><?php $i=$s++; echo $i; ?></td>
                            <td><?php echo number_format($row['cantidad'],2); ?></td>
                            
                            <td><?php echo $row['vcliente']; ?></td>
                            <td><?php echo $row['codigo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                 
                            <td><?php echo number_format($row['precio'],2); ?></td>
                   
                      
                        </tr>
                    <?php 
                        
                        $tutilidad+=$row['precio'];
                    
                        } mysqli_close($conexion); ?>
                    </tbody>
                    
                    <tfoot>
                    <div class="form-group">
                        
                         <h3>
                             
                             [ Total: <?php echo number_format($tutilidad,2) ?>]
                        </h3>
                        
                    </div>
                   
                        
                    </tfoot>
                     </table>
            </div>
                

         <?php       
                    
            
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
			

?>

<script>
    $(document).ready(function () {
              $('#dataTables-example').dataTable({
                    'language': español,
                    'responsive': true
                });
            });

</script>


