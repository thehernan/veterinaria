<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historialcontroller
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/historialmedicodao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialmedico.php");
class historialcontroller {
    //put your code here
    private $lista;
    private $dao;
    
    function __construct() {
        
        $this->lista = array();
        $this->dao = new historialmedicodao();
        
    }
    
    function insert($cabecera,$detalle,$servicios){
        return $this->dao->insertar($cabecera,$detalle,$servicios);
         
    }
    
    function  update($id){
         return $this->dao->actualizar($id);
        
    }
    function  selectid($id){
        
        $this->lista = $this->dao->selectid($id);
        return $this->lista;
        
    }
    
     function  selecthistoriaid($id){
        
        $this->lista = $this->dao->selecthistoriaid($id);
        return $this->lista;
        
    }
    function delete($id){
        return $this->dao->delete($id);
        
    }
    function selectOne($id){
        $historia = $this->dao->selectOne($id);
        return $historia;
        
    }
    function updateficha(historialmedico $hist){
        
        $fila =0;
        if($hist->getAnalisisfoto()!=''){
           $fila= $this->dao->actualizarficha($hist);
            
        }else{
            
           $fila= $this->dao->actualizarfichanofoto($hist);
        }
        return $fila;
    }
   
    
    
    
}
