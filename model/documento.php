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
class documento {
    //put your code here
    private $id;
    private $comprobante;
    private $tipopago;
    private $fecha;
    private $total;
    private $acuenta;
    private $idmov;
    private $idarea;
    private $porcentajeigv;
    private $idcliente;
    private $idusuario;
    private $idoctor;
    //////////////////// facturacion 
   
    private $serie;
    private $numero;
    private $tipodoccliente;
    private $numerodoccliente;
    private $razonsocial;
    private $direccion;
    private $email;
    //
    private $enlace;
    private $aceptadasunat;
    private $sunatdescrip;
    private $sunatnote;
    private $sunatresponse;
    private $sunaterror;
    private $pdf;
    private $xml;
    private $qr;
    private $codigohash;
        
    
    function __construct() {
        
    }
    
    function getEnlace() {
        return $this->enlace;
    }

    function getAceptadasunat() {
        return $this->aceptadasunat;
    }

    function getSunatdescrip() {
        return $this->sunatdescrip;
    }

    function getSunatnote() {
        return $this->sunatnote;
    }

    function getSunatresponse() {
        return $this->sunatresponse;
    }

    function getSunaterror() {
        return $this->sunaterror;
    }

    function getPdf() {
        return $this->pdf;
    }

    function getXml() {
        return $this->xml;
    }

    function getQr() {
        return $this->qr;
    }

    function getCodigohash() {
        return $this->codigohash;
    }

    function setEnlace($enlace) {
        $this->enlace = $enlace;
    }

    function setAceptadasunat($aceptadasunat) {
        $this->aceptadasunat = $aceptadasunat;
    }

    function setSunatdescrip($sunatdescrip) {
        $this->sunatdescrip = $sunatdescrip;
    }

    function setSunatnote($sunatnote) {
        $this->sunatnote = $sunatnote;
    }

    function setSunatresponse($sunatresponse) {
        $this->sunatresponse = $sunatresponse;
    }

    function setSunaterror($sunaterror) {
        $this->sunaterror = $sunaterror;
    }

    function setPdf($pdf) {
        $this->pdf = $pdf;
    }

    function setXml($xml) {
        $this->xml = $xml;
    }

    function setQr($qr) {
        $this->qr = $qr;
    }

    function setCodigohash($codigohash) {
        $this->codigohash = $codigohash;
    }

        
    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getTipodoccliente() {
        return $this->tipodoccliente;
    }

    function getNumerodoccliente() {
        return $this->numerodoccliente;
    }

    function getRazonsocial() {
        return $this->razonsocial;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setTipodoccliente($tipodoccliente) {
        $this->tipodoccliente = $tipodoccliente;
    }

    function setNumerodoccliente($numerodoccliente) {
        $this->numerodoccliente = $numerodoccliente;
    }

    function setRazonsocial($razonsocial) {
        $this->razonsocial = $razonsocial;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        function getIdarea() {
        return $this->idarea;
    }

    function getIdoctor() {
        return $this->idoctor;
    }

    function setIdarea($idarea) {
        $this->idarea = $idarea;
    }

    function setIdoctor($idoctor) {
        $this->idoctor = $idoctor;
    }

        
    function getId() {
        return $this->id;
    }

    function getComprobante() {
        return $this->comprobante;
    }

    function getTipopago() {
        return $this->tipopago;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTotal() {
        return $this->total;
    }

    function getAcuenta() {
        return $this->acuenta;
    }

    function getIdmov() {
        return $this->idmov;
    }

    function getPorcentajeigv() {
        return $this->porcentajeigv;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setComprobante($comprobante) {
        $this->comprobante = $comprobante;
    }

    function setTipopago($tipopago) {
        $this->tipopago = $tipopago;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setAcuenta($acuenta) {
        $this->acuenta = $acuenta;
    }

    function setIdmov($idmov) {
        $this->idmov = $idmov;
    }

    function setPorcentajeigv($porcentajeigv) {
        $this->porcentajeigv = $porcentajeigv;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }



           
}
