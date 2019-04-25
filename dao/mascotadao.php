<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mascotadao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/mascota.php");
class mascotadao implements PHPInterface{
    public function actualizar($objeto) {
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($objeto) {
        
    }

    public function select() {
        
    }

    public function selectid($id) {
        
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from mascota where activo = 1 and id_mascota=?;"
                ,array($id));
//        $clientes=  array();
        $mascota=null;
        foreach ($data_tabla as $clave => $valor){
           $mascota= new mascota();
           $mascota->setId($data_tabla[$clave]["id_mascota"]);
           $mascota->setNombre($data_tabla[$clave]["nombre"]);
           $mascota->setEspecie($data_tabla[$clave]["especie"]);
           $mascota->setRaza($data_tabla[$clave]["raza"]);
           $mascota->setSexo($data_tabla[$clave]["sexo"]);
           $mascota->setPelaje($data_tabla[$clave]["pelaje"]);
           $mascota->setFnac($data_tabla[$clave]["f_nac"]);
           $mascota->setFallecido($data_tabla[$clave]["fallecido"]);
           $mascota->setExtraviado($data_tabla[$clave]["extraviado"]);
           $mascota->setFoto($data_tabla[$clave]["foto"]);
           $mascota->setActivo($data_tabla[$clave]["activo"]);
           $mascota->setFcreacion($data_tabla[$clave]["f_creacion"]);
           $mascota->setCodigodvi($data_tabla[$clave]["codigodvi"]);
//           $mascota->setSenias($data_tabla[$clave]["13"]);
           $mascota->setIdcliente($data_tabla[$clave]["id_cliente"]);

        }
        return $mascota;
        
    }

//put your code here
}
