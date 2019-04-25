<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/productodao.php");

class productocontroller {
    
    private $lista;
    private $dao;
//    private $producto;
    function __construct(){
        $this->lista = array();
        $this->dao = new productodao();
       
        
    }
    
    function listar(){
 
        $this->lista =$this->dao->select();
        return $this->lista;
    }
    function listarporlote(){ 
 
        $this->lista =$this->dao->selectporlote();
        return $this->lista;
    }
      function listarporfarmacia(){
 
        $this->lista =$this->dao->selectfarmacia();
        return $this->lista;
    }
    
      function listarportopicos(){
 
        $this->lista =$this->dao->selecttopicos();
        return $this->lista;
    }
    
      function listarporbaños(){
 
        $this->lista =$this->dao->selectbaños();
        return $this->lista;
    }
    
    function insertar($producto){       
    $fila =0;
        $fila = $this->dao->insertar($producto);
        return $fila;
    } 
    function modificarpro($producto){       
    $fila =0;
        $fila = $this->dao->actualizar($producto);
        return $fila;
    }
    function insertlote($lote){
        $fila =0;
        $fila = $this->dao->insertarlote($lote);
        return $fila;
    }
    
    
    function actualizarexist($cantidad,$id){
         $fila =0;
        $fila = $this->dao->actualizarexistencias($cantidad,$id);
        return $fila;
        
    }
    
}


?>