<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proveedor
 *
 * @author HERNAN
 */
class proveedor {
    //put your code here
    private $id;
    private $nombre;
    private $direccion;
    private $telf1;
    private $telf2;
    private $ndoc;
    private $email;
    private $fcreacion;
    private $tipodoc;
    private $distrito;
    private $provincia;
    private $paginaweb;
    
    function __construct() {
        
    }
    function getPaginaweb() {
        return $this->paginaweb;
    }

    function setPaginaweb($paginaweb) {
        $this->paginaweb = $paginaweb;
    }

        function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelf1() {
        return $this->telf1;
    }

    function getTelf2() {
        return $this->telf2;
    }

    function getNdoc() {
        return $this->ndoc;
    }

    function getEmail() {
        return $this->email;
    }

    function getFcreacion() {
        return $this->fcreacion;
    }

    function getTipodoc() {
        return $this->tipodoc;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelf1($telf1) {
        $this->telf1 = $telf1;
    }

    function setTelf2($telf2) {
        $this->telf2 = $telf2;
    }

    function setNdoc($ndoc) {
        $this->ndoc = $ndoc;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFcreacion($fcreacion) {
        $this->fcreacion = $fcreacion;
    }

    function setTipodoc($tipodoc) {
        $this->tipodoc = $tipodoc;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }



}
