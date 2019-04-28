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
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/documento.php");
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

    function select($desde,$hasta,$tipocomp,$buscar,$serie,$numero){
        
        
        $fecha='';
        if(!empty($desde) && !empty($hasta)){
            $fecha = 'fecha between "'.$desde.'" and "'.$hasta.'" and ';
            
        }
        if(!empty($tipocomp)){
            $tipocomp = 'comprobante= "'.$tipocomp.'"';
            
        }
        if(!empty($buscar)){
            $buscar = 'concat(nombre,numerodoc) like concat("%","'.$buscar.'","%") and ';
            
        }
        if(!empty($serie)){
            $serie = 'serie= "'.$serie.'" and ';
            
        }
        if(!empty($numero)){
            $numero = 'numero= "'.$numero.'" and ';
            
        }

//        echo 'SELECT c.*,p.nombre,p.numerodoc FROM `compra` as c inner join proveedor as p on p.id_proveedor= c.id_proveedor where '.$fecha.$buscar.$serie.$numero.$tipocomp.' order by id_compra desc;';
        
        
                $data_source = new DataSource();

        $data_tabla = $data_source->ejecutarconsulta('SELECT c.*,p.nombre,p.numerodoc FROM `compra` as c inner join proveedor as p on p.id_proveedor= c.id_proveedor  where '.$fecha.$buscar.$serie.$numero.$tipocomp.' order by id_compra desc;');

        
        $documentos = array();
        foreach ($data_tabla as $clave => $valor) {
            $documento = new documento();
            $documento->setId($data_tabla[$clave]["id_compra"]);
            $documento->setserie($data_tabla[$clave]["serie"]);
            $documento->setNumero($data_tabla[$clave]["numero"]);
            $documento->setFecha($data_tabla[$clave]["fecha"]);
            $documento->setComprobante($data_tabla[$clave]["comprobante"]);
            $documento->setTotal($data_tabla[$clave]["total"]);
            $documento->setRazonsocial($data_tabla[$clave]["nombre"]);
            $documento->setNumerodoccliente($data_tabla[$clave]["numerodoc"]);
      
             array_push($documentos, $documento);
        }
        return $documentos;
        
        
        
    }

    public function selectid($id) {
        
    }
    

}
