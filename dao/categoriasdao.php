<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidadmedidadao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/categorias.php");

class categoriasdao implements PHPInterface{
  public function actualizar($objeto) {

  }

  public function eliminar($id) {

  }
    public function insertar($objeto) {

    }

    public function select() {
         $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT * FROM area");
        $categorias=  array();
        $categoria=null;
       foreach ($data_tabla as $clave => $valor){
           $categoria= new categoria();
           $categoria->setId($data_tabla[$clave]["id_area"]);
           $categoria->setDescripcion($data_tabla[$clave]["descripcion"]);
            array_push($categorias, $categoria);
       }
        return $categorias;
    }

    public function selectid($id) {

    }


//put your code here
}
