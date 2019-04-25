<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documento
 *
 * @author HERNAN
 */
class compra {
    //put your code here
    private $id;
    private $comprobante;
    
    private $fecha;
    private $total;
   
    //////////////////// facturacion 
   
    private $serie;
    private $numero;
    private $idproveedor;
    private $codigohash;
        
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getComprobante() {
        return $this->comprobante;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTotal() {
        return $this->total;
    }

    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getIdproveedor() {
        return $this->idproveedor;
    }

    function getCodigohash() {
        return $this->codigohash;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setComprobante($comprobante) {
        $this->comprobante = $comprobante;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setIdproveedor($idproveedor) {
        $this->idproveedor = $idproveedor;
    }

    function setCodigohash($codigohash) {
        $this->codigohash = $codigohash;
    }





           
}
