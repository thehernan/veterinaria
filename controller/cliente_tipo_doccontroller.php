<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente_tipo_doccontroller
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/cliente_tipo_docdao.php");
class cliente_tipo_doccontroller {
    //put your code here
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new cliente_tipo_docdao();
        
    }
    
    function listar(){
        $this->lista = $this->dao->select();
        return $this->lista;
    }

}
