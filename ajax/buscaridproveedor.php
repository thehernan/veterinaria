 <?php 
$cod=$_POST['id'];
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/proveedorcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");
$controp= new proveedorcontroller();

$proveedor = $controp->selectid($cod);
 $array = [
    "id_proveedor" => $proveedor->getId(),
    "nombre" => $proveedor->getNombre(),
    "direccion" => $proveedor->getDireccion(),
    "dni"=> $proveedor->getNdoc(),
    "email"=> $proveedor->getEmail(),
    "op"=> $proveedor->getTipodoc()];



echo json_encode($array);
?>