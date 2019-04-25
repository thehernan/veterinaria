<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$s=1;
$sql="SELECT * FROM `cliente`;";
$execute=mysqli_query($conexion,$sql);


$clientes = array();
$i=1;
while ($row=mysqli_fetch_array($execute)){
   
    $mascota = '<a href="modmismacotas.php?cod='.$row["id_cliente"].' & nom='.$row["apellidos"]." ".$row["nombre"].'" <button type="button" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
    $editar = '<button type="button" onclick="modalcliente('.$row["id_cliente"].')" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    $cambioc= '<a data-toggle="modal" data-target="#cambioclaveclient" data-id="'.$row["id_cliente"].'" data-clave="'.$row["clave"].'" class="btn btn-warning"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>';
     
$array = [
    "item" => $i,
    "apellidos" => $row['apellidos'],
    "nombre" =>   $row['nombre'],
    "dni"=> $row['dni'],
    "direccion"=> $row['direccion'],
    "telefono"=> $row['telf1'].' - ' .$row['telf1'],
    "mimascota"=>$mascota,
    
    "acciones" => $editar.' '.$cambioc
];
array_push($clientes, $array);
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


echo '{"data":'.json_encode($clientes).'}';  // send data as json format
//echo json_encode($personas);

