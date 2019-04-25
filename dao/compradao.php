<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documentodao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/compra.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/lote.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");

class compradao{
    public function actualizar($objeto,$data_source) {
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($documento,$detalle) {
        $data_source = new DataSource(); 
        
       
//        $historial= new historialmedico();
//        $historial=$cabecera;
//        $verifi=FALSE;
//        $documento = new compra();
        $controlp = new productocontroller();
        $fila=0;
        $data_tabla = $data_source->ejecutarconsulta("call sp_insertarcompra(?,?,?,?,?,?)"
                ,array($documento->getComprobante(),$documento->getFecha(),$documento->getTotal(),
                    $documento->getSerie(),$documento->getNumero(),$documento->getIdproveedor()));
      
        $iddoc=0;

        foreach ($data_tabla as $clave => $valor){
           $iddoc=$data_tabla[$clave]["LAST_INSERT_ID()"];
        }
//        $iddoc = $data_source->lastinsertid();
     
        if($iddoc!=0){
        //////////////detalle /////
        $temp = new Temp();
        
        foreach ($detalle as $temp){
            
            $fila=$data_source->ejecutarActualizacion("INSERT INTO detalle_compra(id_producto ,descripcion,precio,cantidad,id_compra,codigo)
                VALUES(?,?,?,?,?,?);",
                array($temp->getIdproducto(),
                    $temp->getDescripcion(),$temp->getPrecio(),$temp->getCantidad(),$iddoc,$temp->getCodigo(),));
//            if($temp->getLote()==1){
//                $lote = new lote();
//                    $lote->setFechaexp($temp->getFechaex());
//
//                    $lote->setFechafa($temp->getFechaf());
//                    $lote->setNlote($temp->getNlote());
//                    $lote->setRs($temp->getRs());
//                    $lote->setCant($temp->getCantidad());
//                    $lote->setIdprod($temp->getIdproducto());
//                    $controlp->insertlote($lote);
//                
//            }else{
                    $controlp->actualizarexist($temp->getCantidad(), $temp->getIdproducto());
            }
//            $fila++;
            
        }
        
//        if($fila!=0){
//            $verifi=true;
//        }
                   
        
     
        
//        echo $documento->getQr();
        
       
        
        
        
        return $iddoc;
        
    }

    public function select() {
        
    }

    public function selectid($id) {
        
    }
    

}
