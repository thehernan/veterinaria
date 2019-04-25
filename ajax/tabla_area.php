<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$s=1;
$sql="SELECT * FROM area;";
$execute=mysqli_query($conexion,$sql);


$area = array();
$i=1;
while ($row=mysqli_fetch_array($execute)){
   
    
    $editar = '<button type="button"  onclick="modaleditararea('.$row["id_area"].')" class="btn btn-primary modiarea" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    
     
$array = [
    "item" => $i,
    "descripcion" => $row['descripcion'],
    "observacion" =>  $row['observacion'],

    
    "acciones" => $editar
];
array_push($area, $array);
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


echo '{"data":'.json_encode($area).'}';  // send data as json format
//echo json_encode($personas);




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





