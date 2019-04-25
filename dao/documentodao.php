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

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/documento.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/facturacion/consumir.php");

class documentodao{
    public function actualizar($objeto,$data_source) {
//        $objeto = new documento();
//        $data_source = new DataSource();
        $filas=0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas=$data_source->ejecutarActualizacion("update documento set enlace=?,aceptasunat=?,sunatdescripcion=?,"
                . "sunatnote=?,sunatresponse=?, sunaterror=?, pdfbase64=?,xmlbase64=?,codigoqr=?,codigohash=?,serie=?,numero=? where id_documento=?;",
                array($objeto->getEnlace(),$objeto->getAceptadasunat(),$objeto->getSunatdescrip(),
                    $objeto->getSunatnote(),$objeto->getSunatresponse(),
                $objeto->getSunaterror(),$objeto->getPdf(),$objeto->getXml(),$objeto->getQr(),$objeto->getCodigohash(),$objeto->getSerie(),$objeto->getNumero(),
                    $objeto->getId()));
        return $filas;
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($documento,$detalle) {
        $data_source = new DataSource(); 
        
        $data_source->Conexion()->beginTransaction();
//        $historial= new historialmedico();
//        $historial=$cabecera;
//        $verifi=FALSE;
        $fila=0;
        $data_tabla = $data_source->ejecutarconsulta("call sp_insertardocumento(?,?,?,?,?,?)"
                ,array($documento->getIdmov(),$documento->getIdcliente(),$documento->getIdoctor(),$documento->getIdarea(),
                    $documento->getIdusuario(),$documento->getComprobante()));
      
        $iddoc=0;

        foreach ($data_tabla as $clave => $valor){
           $iddoc=$data_tabla[$clave]["LAST_INSERT_ID()"];
        }
//        $iddoc = $data_source->lastinsertid();
     
        if($iddoc!=0){
        //////////////detalle /////
        $temp = new Temp();
        
        foreach ($detalle as $temp){
            
            $fila=$data_source->ejecutarActualizacion("call sp_insertardetalle(?,?,?,?,?,?);",
                array($temp->getIdproducto(),
                    $temp->getPrecio(),$temp->getCantidad(),$iddoc,$temp->getCodigo(),$temp->getDescripcion()));
//            $fila++;
        }
        
//        if($fila!=0){
//            $verifi=true;
//        }
                   
        }
        if($iddoc!=0 && $fila >0){
           $documento->setId($iddoc); 
           $documento = $this->generaserienumero($data_source, $documento, $documento->getComprobante());
           $facturacion = new consumir($documento, $detalle);
           $documento = $facturacion->consumirapi();
           
            
        }
        
//        echo $documento->getQr();
        
        if($documento->getQr()!= ''){
            
            $this->actualizar($documento, $data_source);
            $data_source->Conexion()->commit();
            
            
        }else {
            
            $data_source->Conexion()->rollBack();
            $iddoc = 0;
        }
        
        
        
        return $iddoc;
        
    }

    public function select() {
        
    }

    public function selectid($id) {
        
    }
    
    public function generaserienumero($data_source,$documento,$comprobante){

//          $data_source = new DataSource();
        
        $data_tabla = $data_source->ejecutarconsulta("SELECT count(*) as numero from documento where comprobante = ?;",
                array($comprobante));
        
      
        
        if($comprobante==1){ ///factura
            $documento->setSerie('FFF1');
            
        } if ($comprobante==2){ //boleta
            
            $documento->setSerie('BBB1');
        }
        
    
        foreach ($data_tabla as $clave => $valor){
        
           $documento->setNumero($data_tabla[$clave]["numero"]);
           

  
    }

//put your code here
        return $documento;
}
}
