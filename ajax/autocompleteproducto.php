<?php

if (isset($_GET['term'])){
    
$return_arr = array();
/* If connection to database, run sql statement. */
//require_once ($_SERVER['DOCUMENT_ROOT']."/startbootstrap-sb-admin-2-gh-pages/dao/personadao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/startbootstrap-sb-admin-2-gh-pages/model/persona.php");
$controlp = new productocontroller();
$producto = new producto();
 
foreach ($controlp->buscarpordescripcion($_GET['term']) as $producto)  //
{
//    $id_cliente=$persona->getId();
    $row_array['value'] = $producto->getCodigo()." - ".$producto->getDescripcion();
    $row_array['id']=$producto->getId();
    $row_array['codigo']=$producto->getCodigo();
    $row_array['descripcion']=$producto->getDescripcion();
    $row_array['unidc']=$producto->getUnidmedc();
    $row_array['lote']=$producto->getLote();
    
 
    array_push($return_arr,$row_array);
}

/* Toss back results as json encoded array. */
echo json_encode($return_arr);
}