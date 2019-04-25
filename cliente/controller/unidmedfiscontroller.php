<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidmedfiscontroller
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/sistemaveterinaria/dao/unidmedfisdao.php");
class unidmedfiscontroller {
    //put your code here
    
    private  $lista;
    private $dao;
    
    
    
    function __construct(){
        $this->lista = array();
        $this->dao = new unidmedfisdao();
       
        
    }
    function listar(){
         $this->lista =$this->dao->select();
        return $this->lista;
        
        
    }
}
