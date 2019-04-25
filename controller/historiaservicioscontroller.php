<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historiaservicioscontroller
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/historiaserviciosdao.php");
class historiaservicioscontroller {
    //put your code here
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new historiaserviciosdao();
        
    }
    
        function  selectid($id){
        
        $this->lista = $this->dao->selectid($id);
        return $this->lista;
        
    }
    
    function delete($id){
        
       return $fila =$this->dao->delete($id);
        
    }
    
     function insert($historial){
        
       return $fila =$this->dao->insert($historial);
        
    }
    
      function update($historial){
        
       return $fila =$this->dao->update($historial);
        
    }
}
