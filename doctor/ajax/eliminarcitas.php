 <?php 
//$cod=$_POST['id'];
$cod=intval($_GET['id']);
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$sql="delete  FROM cita where id_cita='".$cod."'";
$execute=mysqli_query($conexion,$sql);
if ($cod>=1){
			
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
	
?>