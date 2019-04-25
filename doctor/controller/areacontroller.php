<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of areacontroller
 *
 * @author HERNAN
 */
require_once ("../dao/areadao.php");
class areacontroller {
    //put your code here
    
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new areadao();
        
    }
    
    function insertar($area){
        $fila=0;
        $fila = $this->dao->insertar($area);
        return $fila;
    }
}

