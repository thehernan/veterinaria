 <?php 
$cod=$_POST['id'];
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$sql="select id_producto,prod.codigo,prod.descripcion,precio,stock,activo,
idusuario,observacion,id_unidad_medida,lote,unidmedventa,unidmedcompra,
stockmin,stockmax,preciocompra,localizacion,factor,categoria,prod.id_codigosunat,
cod.id_codigosunat as idsunat,cod.codigo as codsunat,cod.descripcion as descripsunat,fechafab,fechaexp,nlote,rs
from producto as prod left join codigo_prod_sunat as cod on prod.id_codigosunat=cod.id_codigosunat where id_producto='".$cod."'";
$execute=mysqli_query($conexion,$sql);
$result = mysqli_fetch_assoc($execute);
$data=NULL;
if($result){
    $data = mysqli_fetch_assoc($execute);
}
echo json_encode($result);
?>