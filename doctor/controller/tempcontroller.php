<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/tempdao.php");
class tempcontroller{
    
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new TempDAO();
        
    }
    
    function delete($id,$identifica,$op){
        return $this->dao->borrarid($id,$identifica,$op);
         
    }
    function selectid($id,$op,$iden){
        $this->lista = $this->dao->selectid($id, $op,$iden);
        return $this->lista;
        
    }
    function duplicado($id,$op,$ident){
        $fila = $this->dao->duplicado($id, $op,$ident);
        return $fila;
      
        
        
    }
    
    
}
