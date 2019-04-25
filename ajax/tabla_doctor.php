
<?php 
   

require_once ("../config/db.php");
require_once ("../config/conexion.php");

$sql="SELECT * FROM `doctor`;";
$execute=mysqli_query($conexion,$sql);
$doctor = array();
$i=1;
while($row=mysqli_fetch_array($execute)){
    $editar = '<button type="button" id="btnmodidoctor" name="btnmodidoctor" onclick="btnmodiddoctor('.$row["iddoctor"].')" class="btn btn-primary btnmodidoctor" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    $cambioc= '<a data-toggle="modal" data-target="#cambioclave" data-id="'.$row["iddoctor"].'" data-clave="'.$row["clave"].'" class="btn btn-warning"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>';
$array = [
    "item" => $i,
    "apellidos" => $row['apellidos'],
    "nombres" => $row['nombre'],
    "celular"=> $row['celular'],
    "dni" => $row['dni'],
    "direccion" =>$row['direccion'],
    "profesion" =>$row['profesion'],
    
    "acciones" => $editar.' '.$cambioc
];
array_push($doctor, $array);
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


echo '{"data":'.json_encode($doctor).'}';  // send data as json format
//echo json_encode($personas);

