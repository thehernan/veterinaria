<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/tempcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
$id = $_POST['id'];
$op = $_POST['op']; /// venta o historial


$controltemp = new tempcontroller();
$temp = new Temp;

echo $controltemp->duplicado($id, $op,'doctor');

