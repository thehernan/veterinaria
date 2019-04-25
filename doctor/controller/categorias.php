<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/categoriasdao.php");

class categorias {

    private $lista;
    private $dao;

    function __construct(){
        $this->lista = array();
        $this->dao = new categoriasdao();


    }
     function listar(){

        $this->lista =$this->dao->select();
        return $this->lista;
    }
}


?>
