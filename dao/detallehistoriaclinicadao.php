<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detallehistoriaclinicadao
 *
 * @author HERNAN
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/detallehistorial.php");

class detallehistoriaclinicadao {
    //put your code here
    function selectid($id){
        
         $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select det.id_detalle_h,det.id_producto,prod.codigo,prod.descripcion,det.precio,
    det.cantidad,det.id_historial from detalle_historial as det INNER JOIN producto as prod 
    on det.id_producto=prod.id_producto where det.id_historial=?;",array($id));
        $detalles=  array();
        $detalle=null;
        foreach ($data_tabla as $clave => $valor){
           $detalle= new detallehistorial();
           $detalle->setId($data_tabla[$clave]["id_detalle_h"]);
           $detalle->setIdproducto($data_tabla[$clave]["id_producto"]);
           $detalle->setCodigo($data_tabla[$clave]["codigo"]);
           $detalle->setDescripproduct($data_tabla[$clave]["descripcion"]);
           $detalle->setPrecio($data_tabla[$clave]["precio"]);
           $detalle->setCantidad($data_tabla[$clave]["cantidad"]);
           $detalle->setIdhistorial($data_tabla[$clave]["id_historial"]);
          

           array_push($detalles, $detalle);
            
        }
        return $detalles;
        
        
        
    }
    
    function insert(detallehistorial $det){
       $data_source = new DataSource();
        return $data_tabla=$data_source->ejecutarActualizacion("call sp_insertardetalle_historia(?,?,?,?);", array($det->getIdproducto(),
                    $det->getPrecio(), $det->getCantidad(), $det->getIdhistorial()));
        
                
        
    }
        public function duplicado($id, $hist) {
        $data_source = new DataSource();
        $fila = 0;
       $data_tabla=$data_source->ejecutarconsulta("select * from detalle_historial where id_producto=? and id_historial=? ;",
                array($id,$hist));
       foreach ($data_tabla as $clave => $valor){
           $fila++;
       }
       return $fila;
        
       
        
    }
    
    
    
}
