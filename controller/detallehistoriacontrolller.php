<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/detallehistoriaclinicadao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/detallehistorial.php");
class detallehistoriacontrolller {
    //put your code here
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new detallehistoriaclinicadao();
        
    }
    
    function insert($cabecera,$detalle){
        return $this->dao->insertar($cabecera,$detalle);
         
    }
    function selectid($id){
        
        $this->lista = $this->dao->selectid($id);
        return $this->lista;
        
    }
    
    function insertdetalle(detallehistorial $hist){
         return $this->dao->insert($hist);
        
        
    }
    
    function duplicado($id,$idhist){
        
        return $this->dao->duplicado($id,$idhist);
        
    }
    
    
    
}