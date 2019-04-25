<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historiaservicioscontroller.php");

if(isset($_POST['id']) && !empty($_POST['id'])){
    $control = new historiaservicioscontroller();
    $fila = $control->delete($_POST['id']);
  
    if($fila != 0){
        
         echo '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Eliminado con exito</strong> ';
    }else {
        
        echo '<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>No se realizarón cambios!, Algo salio mal :(</strong> ';
    }
    
    
    
}else {
    
    
    echo '<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!, Algo salio mal :(</strong> ';
					
						
    
    
    
}

