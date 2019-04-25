 <?php 
$cod=$_POST['id'];
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$sql="SELECT cl.id_cliente,cl.nombre,cl.apellidos,
cl.direccion,cl.telf1,cl.telf2,cl.ruc,cl.dni,cl.email,
cl.activo,cl.f_creacion,cl.paginaweb,cl.nivel,
cl.id_tipo_documento,tc.op,tc.abreviatura,tc.documento from cliente as cl INNER JOIN cliente_tipo_documento as tc
on cl.id_tipo_documento= tc.id_tipo_documento where id_cliente='".$cod."'";
$execute=mysqli_query($conexion,$sql);
$result = mysqli_fetch_assoc($execute);
$data=NULL;
if($result){
    $data = mysqli_fetch_assoc($execute);
}
echo json_encode($result);
?>