<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detallehistorial
 *
 * @author HERNAN
 */
class detallehistorial {
    //put your code here
private $id;
private $idproducto;
private $codigo;
private $descripproduct;
private $precio;
private $cantidad;
private $idhistorial;
function getDescripproduct() {
    return $this->descripproduct;
}

function setDescripproduct($descripproduct) {
    $this->descripproduct = $descripproduct;
}



function getId() {
    return $this->id;

    
}
function getCodigo() {
    return $this->codigo;
}


function setCodigo($codigo) {
    $this->codigo = $codigo;
}


function getIdproducto() {
    return $this->idproducto;
}

function getPrecio() {
    return $this->precio;
}

function getCantidad() {
    return $this->cantidad;
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

function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
}

function setIdhistorial($idhistorial) {
    $this->idhistorial = $idhistorial;
}


    
    
}
