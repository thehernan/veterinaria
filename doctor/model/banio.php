<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banio
 *
 * @author HERNAN
 */
class banio {
    //put your code here
    private $id;
    private $descripcion;
    private $codigo;
    private $precio;
    private $id_mascota;
    private $iddoctor;
    private $doctor;
    private $fecha;
    private $facturado;
    
    function __construct() {
        
    }
    function getIddoctor() {
        return $this->iddoctor;
    }

    function getDoctor() {
        return $this->doctor;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getFacturado() {
        return $this->facturado;
    }

    function setIddoctor($iddoctor) {
        $this->iddoctor = $iddoctor;
    }

    function setDoctor($doctor) {
        $this->doctor = $doctor;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setFacturado($facturado) {
        $this->facturado = $facturado;
    }

        function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getId_mascota() {
        return $this->id_mascota;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setId_mascota($id_mascota) {
        $this->id_mascota = $id_mascota;
    }



    
}
