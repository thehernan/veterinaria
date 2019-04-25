<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of producto
 *
 * @author HERNAN
 */
class producto {
    //put your code here
    private $id;
    private $codigo;
    private $descripcion;
    private $precio;
    private $stock;
    private $idperfil;
    private $activo;
    private $observacion;
    private $idunidmed;

    private $unidmedv;
    private $unidmedc;
    private $factor;
    private $stockmin;
    private $stockmax;
    private $lote;
    private $precioc;

    private $fechafab;
    private $fecha_exp;
    private $rs;
    private $nlote;
    private $categoria;




    function __construct() {

    }
    function getFechafab() {
        return $this->fechafab;
    }

    function getFecha_exp() {
        return $this->fecha_exp;
    }

    function getRs() {
        return $this->rs;
    }

    function getNlote() {
        return $this->nlote;
    }

    function setFechafab($fechafab) {
        $this->fechafab = $fechafab;
    }

    function setFecha_exp($fecha_exp) {
        $this->fecha_exp = $fecha_exp;
    }

    function setRs($rs) {
        $this->rs = $rs;
    }

    function setNlote($nlote) {
        $this->nlote = $nlote;
    }

        function getPrecioc() {
        return $this->precioc;
    }

    function setPrecioc($precioc) {
        $this->precioc = $precioc;
    }

        function getUnidmedv() {
        return $this->unidmedv;
    }

    function getUnidmedc() {
        return $this->unidmedc;
    }

    function getFactor() {
        return $this->factor;
    }

    function getStockmin() {
        return $this->stockmin;
    }

    function getStockmax() {
        return $this->stockmax;
    }

    function getLote() {
        return $this->lote;
    }

    function setUnidmedv($unidmedv) {
        $this->unidmedv = $unidmedv;
    }

    function setUnidmedc($unidmedc) {
        $this->unidmedc = $unidmedc;
    }

    function setFactor($factor) {
        $this->factor = $factor;
    }

    function setStockmin($stockmin) {
        $this->stockmin = $stockmin;
    }

    function setStockmax($stockmax) {
        $this->stockmax = $stockmax;
    }

    function setLote($lote) {
        $this->lote = $lote;
    }

        function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getIdperfil() {
        return $this->idperfil;
    }
    function getactivo() {
        return $this->activo;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getIdunidmed() {
        return $this->idunidmed;
    }
    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }
    function setactivo($activo) {
        $this->activo = $activo;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setIdunidmed($idunidmed) {
        $this->idunidmed = $idunidmed;
    }
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }



}
