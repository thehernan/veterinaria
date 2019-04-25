<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proveedordao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");
class proveedordao  implements PHPInterface{
    //put your code here
    public function actualizar($proveedor) {
        $data_source = new DataSource();
        $filas=0;
        $filas=$data_source->ejecutarActualizacion("update proveedor set nombre=?,direccion=?,telf1=?,telf2=?,numerodoc=?,email=?,"
                ."id_tipo_documento=?,distrito=?,provincia=?,paginaweb=? where id_proveedor=?;",
                array($proveedor->getNombre(),$proveedor->getDireccion(),
                    $proveedor->getTelf1(),$proveedor->getTelf2(),$proveedor->getNdoc(),
                $proveedor->getEmail(),$proveedor->getTipodoc(),$proveedor->getDistrito(),$proveedor->getProvincia(),
                    $proveedor->getPaginaweb(),$proveedor->getId()));
        return $filas;
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($proveedor) {
            $data_source = new DataSource();
        $filas=0;
        $filas=$data_source->ejecutarActualizacion("insert into proveedor(nombre,direccion,telf1,telf2,numerodoc,email,f_creacion,"
                . "id_tipo_documento,distrito,provincia,paginaweb,estado) values (?,?,?,?,?,?,?,?,?,?,?,?);",
                array($proveedor->getNombre(),$proveedor->getDireccion(),
                    $proveedor->getTelf1(),$proveedor->getTelf2(),$proveedor->getNdoc(),
                $proveedor->getEmail(),date("Y-m-d H:i:s"),$proveedor->getTipodoc(),$proveedor->getDistrito(),$proveedor->getProvincia(),
                    $proveedor->getPaginaweb(),true));
        return $filas;
        
    }

    public function select() {
           $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from proveedor;");
        $proveedores=  array();
        $proveedor=null;
        foreach ($data_tabla as $clave => $valor){
           $proveedor= new proveedor();
           $proveedor->setId($data_tabla[$clave]["id_proveedor"]);
           $proveedor->setNombre($data_tabla[$clave]["nombre"]);
   
           $proveedor->setDireccion($data_tabla[$clave]["direccion"]);
           $proveedor->setTelf1($data_tabla[$clave]["telf1"]);
           $proveedor->setTelf2($data_tabla[$clave]["telf2"]);
           $proveedor->setNdoc($data_tabla[$clave]["numerodoc"]);
           $proveedor->setEmail($data_tabla[$clave]["email"]);
        
           $proveedor->setFcreacion($data_tabla[$clave]["f_creacion"]);
           $proveedor->setTipodoc($data_tabla[$clave]["id_tipo_documento"]);
           $proveedor->setDistrito($data_tabla[$clave]["distrito"]);
           $proveedor->setProvincia($data_tabla[$clave]["provincia"]);
           $proveedor->setPaginaweb($data_tabla[$clave]["paginaweb"]);
       
           
           
           
           array_push($proveedores, $proveedor);
            
        }
        return $proveedores;
        
    }

    public function selectid($id) {
        
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from proveedor where id_proveedor = $id;");
       
        $proveedor=null;
        foreach ($data_tabla as $clave => $valor){
           $proveedor= new proveedor();
           $proveedor->setId($data_tabla[$clave]["id_proveedor"]);
           $proveedor->setNombre($data_tabla[$clave]["nombre"]);
   
           $proveedor->setDireccion($data_tabla[$clave]["direccion"]);
           $proveedor->setTelf1($data_tabla[$clave]["telf1"]);
           $proveedor->setTelf2($data_tabla[$clave]["telf2"]);
           $proveedor->setNdoc($data_tabla[$clave]["numerodoc"]);
           $proveedor->setEmail($data_tabla[$clave]["email"]);
        
           $proveedor->setFcreacion($data_tabla[$clave]["f_creacion"]);
           $proveedor->setTipodoc($data_tabla[$clave]["id_tipo_documento"]);
           $proveedor->setDistrito($data_tabla[$clave]["distrito"]);
           $proveedor->setProvincia($data_tabla[$clave]["provincia"]);
           $proveedor->setPaginaweb($data_tabla[$clave]["paginaweb"]);
       
   
            
        }
        return $proveedor;
        
    }

}
