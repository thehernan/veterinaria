 <?php 
//$cod=$_POST['id'];
$cod=intval($_GET['id']);
$c=intval($_GET['c']);
//$fila = "";
require_once ("../config/db.php");
require_once ("../config/conexion.php");

echo '<script> console.log('.$c.') </script>';
echo '<script> console.log('.$cod.') </script>';
$sql="update eventos set confirmar=".$c." where id='".$cod."'";
$execute=mysqli_query($conexion,$sql);
//echo  $fila;
if ($execute){
			
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Cita confirmada exitosamente.
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