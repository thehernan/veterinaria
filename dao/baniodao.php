<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of baniodao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/banio.php");
class baniodao {
    public function actualizar($objeto) {
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($objeto) {
        $data_source = new DataSource();
//        $filas=0;
//        $objeto = new banio();
//        $cliente = $objeto;
        $data_source->ejecutarActualizacion("insert into banio(descripcion,codigo,precio,id_mascota,id_doctor,fecha,facturado,id_producto)"
                . " values(?,?,?,?,?,?,?,?);",
                
                array($objeto->getDescripcion(),$objeto->getCodigo(),$objeto->getPrecio(),
                    $objeto->getId_mascota(),$objeto->getIddoctor(),
                $objeto->getFecha(),$objeto->getFacturado(),$objeto->getIdprod()));
       
       
        return $data_source->lastinsertid();
        
    }

    public function select() {
        
    }

    public function selectid($id) {
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select b.descripcion,b.codigo,b.precio,b.id_doctor,b.id_mascota,b.fecha,b.facturado,
        doc.nombre,doc.apellidos from banio as b INNER JOIN doctor as doc on b.id_doctor=doc.iddoctor WHERE b.id_mascota = ? order by fecha DESC",array($id));
        $banios=  array();
        $banio=null;
        foreach ($data_tabla as $clave => $valor){
           $banio= new banio();
           $banio->setDescripcion($data_tabla[$clave]["descripcion"]);
           $banio->setCodigo($data_tabla[$clave]["codigo"]);
           $banio->setPrecio($data_tabla[$clave]["precio"]);
           $banio->setIddoctor($data_tabla[$clave]["id_doctor"]);
           $banio->setId_mascota($data_tabla[$clave]["id_mascota"]);
           $banio->setFecha($data_tabla[$clave]["fecha"]);
           $banio->setDoctor($data_tabla[$clave]["nombre"].' '.$data_tabla[$clave]["apellidos"]);
           $banio->setFacturado($data_tabla[$clave]["facturado"]);
           
           
           
           array_push($banios, $banio);
            
        }
        return $banios;
    }
    
    function buscarid($id){
         $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select b.id_banio,b.descripcion,b.codigo,b.precio,b.id_doctor,b.id_mascota,b.fecha,b.facturado,
        doc.nombre,doc.apellidos,b.id_producto from banio as b INNER JOIN doctor as doc on b.id_doctor=doc.iddoctor WHERE b.id_banio = ? ",array($id));
         $banio= new banio();
        foreach ($data_tabla as $clave => $valor){
          
           $banio->setId($data_tabla[$clave]["id_banio"]);
           $banio->setDescripcion($data_tabla[$clave]["descripcion"]);
           $banio->setCodigo($data_tabla[$clave]["codigo"]);
           $banio->setPrecio($data_tabla[$clave]["precio"]);
           $banio->setIddoctor($data_tabla[$clave]["id_doctor"]);
           $banio->setId_mascota($data_tabla[$clave]["id_mascota"]);
           $banio->setFecha($data_tabla[$clave]["fecha"]);
           $banio->setDoctor($data_tabla[$clave]["nombre"].' '.$data_tabla[$clave]["apellidos"]);
           $banio->setFacturado($data_tabla[$clave]["facturado"]);
           $banio->setIdprod($data_tabla[$clave]["id_producto"]);
           
 
        }
        return $banio;
        
        
    }
    
    function facturar($id){
        
         $data_source = new DataSource();
//        $filas=0;
//        $objeto = new banio();
//        $cliente = $objeto;
        $data_source->ejecutarActualizacion("update banio set facturado=1 where id_banio=?", array($id));
       
      
        
    }

//put your code here
}
