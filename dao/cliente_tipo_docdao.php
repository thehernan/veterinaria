<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente_tipo_docdao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/cliente_tipo_doc.php");
class cliente_tipo_docdao implements PHPInterface{
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
        $data_tabla = $data_source->ejecutarconsulta("select * from cliente_tipo_documento;");
        $tipos=  array();
        $tipo=null;
        foreach ($data_tabla as $clave => $valor){
           $tipo= new cliente_tipo_doc();
           $tipo->setId($data_tabla[$clave]["id_tipo_documento"]);
           $tipo->setDocumento($data_tabla[$clave]["documento"]);
           $tipo->setOp($data_tabla[$clave]["op"]);
           $tipo->setAbreviatura($data_tabla[$clave]["abreviatura"]);
        
           
           
           
           array_push($tipos, $tipo);
            
        }
        return $tipos;
        
    }

    public function selectid($id) {
        
    }

}
