<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proveedorcontroller
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/proveedordao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");

class proveedorcontroller {
    //put your code here
    private $lista;
    private $dao;
    private $proveedor;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new proveedordao();
        $this->proveedor = new proveedor();
    }
    
    function listar(){
        $this->lista = $this->dao->select();
        return $this->lista;
    }
     function selectid($id){
        $this->proveedor = $this->dao->selectid($id);
        return $this->proveedor;
    }
    function insertar($proveedor){
       return $this->dao->insertar($proveedor);
        
    }
    function update($proveedor){
       return $this->dao->actualizar($proveedor);
        
    }
}
