<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente_tipo_doc
 *
 * @author HERNAN
 */
class cliente_tipo_doc {
    //put your code here
    private $id;
    private $documento;
    private $op;
    private $abreviatura;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getOp() {
        return $this->op;
    }

    function getAbreviatura() {
        return $this->abreviatura;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }



}
