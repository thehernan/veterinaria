<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of areadao
 *
 * @author HERNAN
 */

require_once ("../config/DataSource.php");
require_once ("../dao/PHPInterface.php");
require_once ("../model/area.php");
class areadao {
    //put your code here
    
    public function insertar($area){
         $data_source = new DataSource();
        $filas=0;
//        $cliente = new area();
//        $cliente = $objeto;
        $filas=$data_source->ejecutarActualizacion("insert into area(descripcion,observacion) values (?,?);",
                array($area->getDescripcion(),$area->getObservacion()));
        return $filas;
    }
    
    
}
