<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lote
 *
 * @author HERNAN
 */
class lote {
    //put your code here
    private $id;
    private $fechaexp;
    private $fechafa;
    private $nlote;
    private $rs;
    private $cant;
    private $idprod;
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getFechaexp() {
        return $this->fechaexp;
    }

    function getFechafa() {
        return $this->fechafa;
    }

    function getNlote() {
        return $this->nlote;
    }

    function getRs() {
        return $this->rs;
    }

    function getCant() {
        return $this->cant;
    }

    function getIdprod() {
        return $this->idprod;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFechaexp($fechaexp) {
        $this->fechaexp = $fechaexp;
    }

    function setFechafa($fechafa) {
        $this->fechafa = $fechafa;
    }

    function setNlote($nlote) {
        $this->nlote = $nlote;
    }

    function setRs($rs) {
        $this->rs = $rs;
    }

    function setCant($cant) {
        $this->cant = $cant;
    }

    function setIdprod($idprod) {
        $this->idprod = $idprod;
    }


}
