<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insertdetallehistservicio
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historiaservicioscontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialservicio.php");
if(isset($_POST['idprod']) && isset($_POST['precio']) && isset($_POST['idhist'])){
    
    $servicio = new historialservicio();
    $control = new historiaservicioscontroller();
    
    $servicio->setIdproducto($_POST['idprod']);
    $servicio->setPrecio($_POST['precio']);
    $servicio->setIdhistorial($_POST['idhist']);
    
    $fila =$control->insert($servicio);
    
    if($fila !=0){
        echo ' <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Editado con éxito</strong> </div>';
        
    }else {
        
        echo ' <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>No se realizarón cambios!, Algo salio mal :(</strong> </div>';
    }
    
    
    
}else{
    
    
   echo ' <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> </div>';
}
