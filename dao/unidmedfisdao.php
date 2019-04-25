<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidmedfisdao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/unid_med_fis.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
class unidmedfisdao implements PHPInterface{
    //put your code here

    public function actualizar($objeto) {
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($objeto) {
        
        
         $data_source = new DataSource();
        $fila = 0;
        $fila = $data_source->ejecutarActualizacion("
        INSERT INTO unid_med_fis (descripcion) VALUES (?);
        " ,array(strtoupper($objeto->getDescripcion())));
        
      return $fila;
        
    }

    public function select() {
         $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("select * from unid_med_fis;");
        $unidmedidas= array();
        $unidadmed=null;
        foreach ($data_tabla as $clave => $valor){
           $unidadmed= new unid_med_fis();
           $unidadmed->setId($data_tabla[$clave]["id_unid_med_fis"]);
           $unidadmed->setDescripcion($data_tabla[$clave]["descripcion"]);
         
          
           array_push($unidmedidas, $unidadmed);
            
        }
        return $unidmedidas;
        
    }

    public function selectid($id) {
        
    }

}
