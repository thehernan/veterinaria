<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("../config/db.php");
require_once ("../config/conexion.php");
$s=1;
$sql="SELECT * FROM eventos c
      inner join mascota m on m.id_mascota=c.id_cliente
      inner join cliente cl on cl.id_cliente=m.id_cliente where c.atendido=0 order by inicio_normal DESC;";
$execute=mysqli_query($conexion,$sql);


$cita = array();
$i=1;
while ($row=mysqli_fetch_array($execute)){
   
    if($row[12]==0){ 
     $confirmar='<a href="#" class="btn btn-danger" title="Confirmar cita" onclick="confirmarcita('.$row[0].',1)"><i class="glyphicon glyphicon-minus"></i> </a>';
    }  else { 
     $confirmar='<a href="#" class="btn btn-primary" title="Confirmar cita" ><i class="glyphicon glyphicon-check"></i> </a>';
     } 

    $historial ='<a href="ficha_paciente.php?id='.$row[13].'&idc='.$row[9].'"<button type="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button><strong>'.$row[7].'</strong>';
    $mascotas = '<a class="btn btn-success" href="modmismacotas.php?cod='.$row[27].'&nom='.$row[28].' '.$row[29].' <button type="button" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';
//    $borrar = '<a href="#" class="btn btn-default" title="Borrar usuario" onclick="eliminarcitas('.$row[0].')"><i class="glyphicon glyphicon-trash"></i> </a>';
    $array = [
    "item" => $i,
    "fecha" => $row[7].' - '.$row[8],
    "nota" =>  $row[2],
    "asunto" =>  $row[1],
    "mascota" =>  $row[13].' - ' .$row[14],
    "dueno" =>  $row[28].' - ' .$row[29],
    "atender" =>  $historial,
    "acciones" =>  $mascotas.' '.$confirmar

];
array_push($cita, $array);
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


echo '{"data":'.json_encode($cita).'}';  // send data as json format
//echo json_encode($personas);




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 * 
 */







