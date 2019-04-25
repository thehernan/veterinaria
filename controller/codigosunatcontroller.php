<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/codigosunatdao.php");

class codigosunatcontroller {

    private $lista;
    private $dao;

    function __construct(){
        $this->lista = array();
        $this->dao = new codigosunatdao();


    }
     function listar(){

        $this->lista =$this->dao->select();
        return $this->lista;
    }
    function buscar($cadena){
        $this->lista =$this->dao->selectid($cadena);
        return $this->lista;
        
        
        
    }
}


?>
