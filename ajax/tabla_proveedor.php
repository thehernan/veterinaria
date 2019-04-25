<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/proveedorcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");

$controlp = new proveedorcontroller();
$proveedor = new proveedor();
$s=1;
//$sql="SELECT * FROM `cliente`;";
//$execute=mysqli_query($conexion,$sql);


$proveedors = array();
$i=1;
foreach ($controlp->listar() as $proveedor){
   
   
    $editar = '<a data-toggle="modal" data-target="#editproveedor" data-id="'.$proveedor->getId().'" data-nombre="'.$proveedor->getNombre().'" 
                data-direccion="'.$proveedor->getDireccion().'"
                 data-telf1="'.$proveedor->getTelf1().'" data-telf2="'.$proveedor->getTelf2().'"
                data-numerodoc="'.$proveedor->getNdoc().'" data-email="'.$proveedor->getEmail().'" data-tipodoc="'.$proveedor->getTipodoc().'"
                data-distrito="'.$proveedor->getDistrito().'" data-provincia="'.$proveedor->getProvincia().'" data-web="'.$proveedor->getPaginaweb().'"   class="btn btn-primary"><i class="fa fa-edit fa-fw"></i></a>';
  
     
$array = [
    "item" => $i,
    "nombre" => $proveedor->getNombre(),
   
    "dni"=> $proveedor->getNdoc(),
    "direccion"=> $proveedor->getDireccion(),
    "telefono"=> '<a href="tel:'.$proveedor->getTelf1().'">'.$proveedor->getTelf1().'</a>,  <a href="tel:'.$proveedor->getTelf2().'">' .$proveedor->getTelf2().'</a>',
    "web"=>$proveedor->getPaginaweb(),
    
    "acciones" => $editar
];
array_push($proveedors, $array);
    $i++;
}
 
//mysqli_close($conexion);
//$data[] = $daopersona->buscar("",1);
//$json_data = array(
////        "Ruc"   => $persona->getRucDni(),
////        "Nombre"    => $persona->getNombre().' '.$persona->getApellido(),
////        "Domiciliof" => $persona->getDomiciliofiscal(),
////        "Domicilior" => $persona->getDomicilioreal(),
////        "Telefono" => $persona->getTelefono(),
//        "data" => $data
//        );


echo '{"data":'.json_encode($proveedors).'}';  // send data as json format
//echo json_encode($personas);

