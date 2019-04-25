
<?php 
   

require_once ("../config/db.php");
require_once ("../config/conexion.php");

$sql="SELECT * FROM t_usuario t
inner join t_persona p on t.idpersona=p.idpersona ;";
$execute=mysqli_query($conexion,$sql);
$user = array();
$i=1;
while($row=mysqli_fetch_array($execute)){
    $editar = '<button type="button" onclick="modiusu('.$row["idpersona"].')"  class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    
$array = [
    "item" => $i,
    "apellido" => $row['apellido'],
    "nombres" => $row['nombre'],
    "telefono"=> $row['telefono'],
    "dni" => $row['dni'],
    "direccion" =>$row['direccion'],
    "email" =>$row['email'],
    
    "acciones" => $editar
];
array_push($user, $array);
    $i++;
}
mysqli_close($conexion); 
//$data[] = $daopersona->buscar("",1);
//$json_data = array(
////        "Ruc"   => $persona->getRucDni(),
////        "Nombre"    => $persona->getNombre().' '.$persona->getApellido(),
////        "Domiciliof" => $persona->getDomiciliofiscal(),
////        "Domicilior" => $persona->getDomicilioreal(),
////        "Telefono" => $persona->getTelefono(),
//        "data" => $data
//        );


echo '{"data":'.json_encode($user).'}';  // send data as json format
//echo json_encode($personas);

