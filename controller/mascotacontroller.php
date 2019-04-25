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

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/mascotadao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/mascota.php");
class mascotacontroller {
    //put your code here
    private $lista;
    private $dao;
    private $mascota;
    
    function __construct() {
        $this->mascota = new mascota();
        
        $this->lista = array();
        $this->dao = new mascotadao();
        
    }
    
    function selectid($id){
        $this->mascota = $this->dao->selectid($id);
        return $this->mascota;
    }

}
