<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$s=1;
$sql="SELECT * FROM doctor where iddoctor='".$_SESSION['user_id']."';";
$execute=mysqli_query($conexion,$sql);


$admin = array();
$i=1;
while ($row=mysqli_fetch_array($execute)){
   
    
    $editar = '<button type="button" onclick="modaladmin('.$row["iddoctor"].')" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    $cambioc= '<a data-toggle="modal" data-target="#cambioclaveadmin" data-id="'.$row["iddoctor"].'" data-clave="'.$row["clave"].'" class="btn btn-warning"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>';
     
$array = [
    "item" => $i,
    "apellidos" => $row['apellidos'],
    "nombre" =>   $row['nombre'],
    "dni"=> $row['dni'],
    "direccion"=> $row['direccion'],
    "telefono"=> $row['celular'],
    "profesion"=> $row['profesion'],
    
    
    "acciones" => $editar.' '.$cambioc
];
array_push($admin, $array);
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


echo '{"data":'.json_encode($admin).'}';  // send data as json format
//echo json_encode($personas);

