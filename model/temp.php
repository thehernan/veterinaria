<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Temp
 *
 * @author HERNAN
 */
class Temp {
    //put your code here
    private $id;
    private $cantidad;
    private $precio;
    private $idproducto;
    private $iduser;
    private $codigo;
    private $descripcion;
    private $identi;
    private $op;
    
    private $fechaf;
    private $fechaex;
    private $nlote;
    private $rs;
    private $lote;
    




    //////
    private $codigosunat;
    private $unidmedsunat;
    
    
    function __construct() {
         
        
    }
    
    function getFechaf() {
        return $this->fechaf;
    }

    function getFechaex() {
        return $this->fechaex;
    }

    function getNlote() {
        return $this->nlote;
    }

    function getRs() {
        return $this->rs;
    }

    function getLote() {
        return $this->lote;
    }

    function setFechaf($fechaf) {
        $this->fechaf = $fechaf;
    }

    function setFechaex($fechaex) {
        $this->fechaex = $fechaex;
    }

    function setNlote($nlote) {
        $this->nlote = $nlote;
    }

    function setRs($rs) {
        $this->rs = $rs;
    }

    function setLote($lote) {
        $this->lote = $lote;
    }

        
    function getCodigosunat() {
        return $this->codigosunat;
    }

    function getUnidmedsunat() {
        return $this->unidmedsunat;
    }

    function setCodigosunat($codigosunat) {
        $this->codigosunat = $codigosunat;
    }

    function setUnidmedsunat($unidmedsunat) {
        $this->unidmedsunat = $unidmedsunat;
    }

        function getIdenti() {
        return $this->identi;
    }

    function setIdenti($identi) {
        $this->identi = $identi;
    }

        function getOp() {
        return $this->op;
    }

    function setOp($op) {
        $this->op = $op;
    }

       
        
    
    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

        function getIduser() {
        return $this->iduser;
    }

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    
        function getIdproducto() {
        return $this->idproducto;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

        function getId() {
        return $this->id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }



}
