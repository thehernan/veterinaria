<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historialservicio
 *
 * @author HERNAN
 */
class historialservicio {
    //put your code here
    private $id;
    private $idproducto;
    private $precio;
    private $idhistorial;
    private $producto;
    private $codigo;
    
    function __construct() {
        
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

        
    function getProducto() {
        return $this->producto;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

        
    function getId() {
        return $this->id;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIdhistorial() {
        return $this->idhistorial;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIdhistorial($idhistorial) {
        $this->idhistorial = $idhistorial;
    }





}
