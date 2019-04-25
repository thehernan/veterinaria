<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/detallehistoriacontrolller.php");

$id = $_POST['id'];
$idhist = $_POST['idhist']; /// venta o historial


$control= new detallehistoriacontrolller();


echo $control->duplicado($id, $idhist);

