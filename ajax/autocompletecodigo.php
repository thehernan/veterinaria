<?php

if (isset($_GET['term'])){
$return_arr = array();
/* If connection to database, run sql statement. */
//require_once ($_SERVER['DOCUMENT_ROOT']."/startbootstrap-sb-admin-2-gh-pages/dao/personadao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/codigosunatcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/codigosunat.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/startbootstrap-sb-admin-2-gh-pages/model/persona.php");
$codigocontrol= new codigosunatcontroller();
$codigo= new codigosunat();
 
foreach ($codigocontrol->buscar($_GET['term']) as $codigo)  //
{
//    $id_cliente=$persona->getId();
    $row_array['value'] = $codigo->getCodigo()." - ".$codigo->getDescripcion();
    $row_array['id']=$codigo->getId();
    $row_array['codigo']=$codigo->getCodigo();
    $row_array['descripcion']=$codigo->getDescripcion();
   
    
    array_push($return_arr,$row_array);
}

/* Toss back results as json encoded array. */
echo json_encode($return_arr);
}