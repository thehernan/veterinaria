<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codigosunatdao
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/codigosunat.php");
class codigosunatdao implements PHPInterface{
    //put your code here
    
    
    public function actualizar($objeto) {
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($objeto) {
        
    }

    public function select() {
         $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from codigo_prod_sunat ;");
        $codigos=  array();
        $codigo=null;
        foreach ($data_tabla as $clave => $valor){
        $codigo= new codigosunat();
           $codigo->setId($data_tabla[$clave]["id_codigosunat"]);
           $codigo->setCodigo($data_tabla[$clave]["codigo"]);
           $codigo->setDescripcion($data_tabla[$clave]["descripcion"]);
               
           
           
           array_push($codigos, $codigo);
            
        }
        return $codigos;
        
    }

    public function selectid($cadena) {
         $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from codigo_prod_sunat where concat(codigo,descripcion) like concat('%',?,'%') ;",
                array($cadena));
        $codigos=  array();
        $codigo=null;
        foreach ($data_tabla as $clave => $valor){
        $codigo= new codigosunat();
           $codigo->setId($data_tabla[$clave]["id_codigosunat"]);
           $codigo->setCodigo($data_tabla[$clave]["codigo"]);
           $codigo->setDescripcion($data_tabla[$clave]["descripcion"]);
               
           
           
           array_push($codigos, $codigo);
            
        }
        return $codigos;
        
    }

}
