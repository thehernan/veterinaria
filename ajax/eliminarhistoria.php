<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controller/historialcontroller.php';
if(isset($_POST['id']) and !empty($_POST['id'])){
    $id = $_POST['id'];
    $historiacontrol = new historialcontroller();
    
    echo $fila = $historiacontrol->delete($id);
  
}

