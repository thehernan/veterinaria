<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historialmedico
 *
 * @author HERNAN
 */
class historialmedico {
    //put your code here
    private $id;
    private $registro;
    private $medicamento;
    private $atentido;
    private $idmascota;
    private $nombremasc;
    private $fecha;
    private $fc;
    private $fr;
    private $p;
    private $pam;
    private $ps;
    private $pd;
    private $d;
    private $cpp;
    private $iddoctor;
    private $doctor;
    private $facturado;
    
    private $temperatura;
    private $descripcion;
    private $diagnostico;
    private $tratamiento;
    private $observacion;
    private $consultacosto;
    private $tratamientocosto;
    private $analisiscosto;
    private $vacunacosto;
    private $servicioscosto;

    private $analisisfoto;


    function __construct() {

    }
    function getAnalisisfoto() {
        return $this->analisisfoto;
    }

    function setAnalisisfoto($analisisfoto) {
        $this->analisisfoto = $analisisfoto;
    }

    
        function getServicioscosto() {
        return $this->servicioscosto;
    }

    function setServicioscosto($servicioscosto) {
        $this->servicioscosto = $servicioscosto;
    }

        
    function getTemperatura() {
        return $this->temperatura;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDiagnostico() {
        return $this->diagnostico;
    }

    function getTratamiento() {
        return $this->tratamiento;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getConsultacosto() {
        return $this->consultacosto;
    }

    function getTratamientocosto() {
        return $this->tratamientocosto;
    }

    function getAnalisiscosto() {
        return $this->analisiscosto;
    }

    function getVacunacosto() {
        return $this->vacunacosto;
    }

    function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDiagnostico($diagnostico) {
        $this->diagnostico = $diagnostico;
    }

    function setTratamiento($tratamiento) {
        $this->tratamiento = $tratamiento;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setConsultacosto($consultacosto) {
        $this->consultacosto = $consultacosto;
    }

    function setTratamientocosto($tratamientocosto) {
        $this->tratamientocosto = $tratamientocosto;
    }

    function setAnalisiscosto($analisiscosto) {
        $this->analisiscosto = $analisiscosto;
    }

    function setVacunacosto($vacunacosto) {
        $this->vacunacosto = $vacunacosto;
    }

        
    function getDoctor() {
        return $this->doctor;
    }

    function getFacturado() {
        return $this->facturado;
    }

    function setDoctor($doctor) {
        $this->doctor = $doctor;
    }

    function setFacturado($facturado) {
        $this->facturado = $facturado;
    }

        function getFecha() {
        return $this->fecha;
    }

    function getFc() {
        return $this->fc;
    }

    function getFr() {
        return $this->fr;
    }

    function getP() {
        return $this->p;
    }

    function getPam() {
        return $this->pam;
    }

    function getPs() {
        return $this->ps;
    }

    function getPd() {
        return $this->pd;
    }

    function getD() {
        return $this->d;
    }

    function getCpp() {
        return $this->cpp;
    }

    function getIddoctor() {
        return $this->iddoctor;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setFc($fc) {
        $this->fc = $fc;
    }

    function setFr($fr) {
        $this->fr = $fr;
    }

    function setP($p) {
        $this->p = $p;
    }

    function setPam($pam) {
        $this->pam = $pam;
    }

    function setPs($ps) {
        $this->ps = $ps;
    }

    function setPd($pd) {
        $this->pd = $pd;
    }

    function setD($d) {
        $this->d = $d;
    }

    function setCpp($cpp) {
        $this->cpp = $cpp;
    }

    function setIddoctor($iddoctor) {
        $this->iddoctor = $iddoctor;
    }


        function getId() {
        return $this->id;
    }

    function getRegistro() {
        return $this->registro;
    }

    function getMedicamento() {
        return $this->medicamento;
    }

    function getAtentido() {
        return $this->atentido;
    }

    function getIdmascota() {
        return $this->idmascota;
    }

    function getNombremasc() {
        return $this->nombremasc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRegistro($registro) {
        $this->registro = $registro;
    }

    function setMedicamento($medicamento) {
        $this->medicamento = $medicamento;
    }

    function setAtentido($atentido) {
        $this->atentido = $atentido;
    }

    function setIdmascota($idmascota) {
        $this->idmascota = $idmascota;
    }


    function setNombremasc($nombremasc) {
        $this->nombremasc = $nombremasc;
    }



}
