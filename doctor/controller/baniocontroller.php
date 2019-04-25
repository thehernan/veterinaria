<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientecontroller
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/baniodao.php");
class baniocontroller {
    //put your code here
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new baniodao();
        
    }
    
    function selectid($id){
        $this->lista = $this->dao->selectid($id);
        return $this->lista;
    }
    function insert ($banio){
        $fila = $this->dao->insertar($banio);
        return $fila;
        
        
    }
    function buscarid($id){
        $this->lista = $this->dao->buscarid($id);
        return $this->lista;
        
    }
    function facturar ($id){
        $this->dao->facturar($id);
       
        
        
    }
    

}
