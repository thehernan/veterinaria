<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/compradao.php");
class compracontroller {
    //put your code here
//    private $lista;
    private $dao;
    
    function __construct() {
        
//        $this->lista = array();
        $this->dao = new compradao();
        
    }
    
    function insert($cabecera,$detalle){
        return $this->dao->insertar($cabecera,$detalle);
         
    }
    
    function select ($desde,$hasta,$tipocomp,$buscar,$serie,$numero) {
        return $this->dao->select($desde, $hasta, $tipocomp, $buscar, $serie, $numero);
        
        
    }
  
    
    
    
}