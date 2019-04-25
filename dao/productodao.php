<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productodao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/config/DataSource.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/sistemaveterinaria/dao/PHPInterface.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/lote.php");

class productodao {

    public function actualizar($objeto) {
        $data_source = new DataSource();
        $fila = 0;

//        $objeto = new producto();
//        $producto=$objeto;
        $fila = $data_source->ejecutarActualizacion("update producto set codigo=?, descripcion=?,precio=?,"
                . "stock=?,id_unidad_medida=?,lote=?,unidmedventa=?,unidmedcompra=?,stockmin=?,stockmax=?,preciocompra=?,"
                . "factor=?,id_codigosunat=?,fechafab=?,fechaexp=?,nlote=?,rs=? where id_producto=?;"
                ,array($objeto->getCodigo(),
                       $objeto->getDescripcion(),
                       $objeto->getPrecio(),
                       $objeto->getStock(),
//                        $objeto->getObservacion(),
                       $objeto->getIdunidmed(),
                        $objeto->getLote(),
                    $objeto->getUnidmedv(),
                    $objeto->getUnidmedc(),
                    $objeto->getStockmin(),
                    $objeto->getStockmax(),
                    $objeto->getPrecioc(),
                    $objeto->getFactor(),
                    $objeto->getIdcodsunat(),
                    $objeto->getFechafab(),
                    $objeto->getFecha_exp(),
                    $objeto->getNlote(),
                    $objeto->getRs(),
                    $objeto->getId()
                       
                ));

      return $fila;
    }

    public function eliminar($id) {
        $data_source = new DataSource();
        $fila = 0;
        $fila = $data_source->ejecutarActualizacion("
        update producto set activo=0 where id_producto=?;" ,array($id));
        
//        foreach ($data_tabla as $clave => $valor){
//            $fila++;
//        }
        
        return $fila ;

    }
    
    public function duplicado($codigo){
        
        $data_source = new DataSource();
        $fila = 0;
        $fila = $data_source->ejecutarActualizacion("
        select * from producto where codigo=?;" ,array($codigo));
        
//        foreach ($data_tabla as $clave => $valor){
//            $fila++;
//        }
        
        return $fila ;
    
        
    }

    public function insertar($objeto) {

        $data_source = new DataSource();
        $fila = 0;
//        $objeto=new producto();
        $fila = $data_source->ejecutarActualizacion("
        INSERT INTO producto (codigo,descripcion,precio,stock, activo,idusuario,observacion,id_unidad_medida,unidmedventa,
        unidmedcompra,factor,stockmin,stockmax,lote,preciocompra,categoria,id_codigosunat,fechafab,fechaexp,nlote,rs)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);" ,array($objeto->getcodigo(),
                                          $objeto->getdescripcion(),
                                          $objeto->getprecio(),
                                          $objeto->getstock(),
                                          $objeto->getactivo(),
                                          $objeto->getidperfil(),
                                          $objeto->getobservacion(),
                                          $objeto->getidunidmed(),
            //////////////////////////
                                          $objeto->getUnidmedv(),
                                            $objeto->getUnidmedc(),
                                            $objeto->getFactor(),
                                            $objeto->getStockmin(),
                                            $objeto->getStockmax(),
                                            $objeto->getLote(),
                                            $objeto->getPrecioc(),
                                            $objeto->getCategoria(),
                                            $objeto->getIdcodsunat(),
                                            $objeto->getFechafab(),
                                            $objeto->getFecha_exp(),
                                            $objeto->getNlote(),
                                            $objeto->getRs()
                                          ));

      return $fila;
    }

    public function select() {
        $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT *,p.descripcion as pro FROM producto p
        inner join unidadmedida u on p.id_unidad_medida=u.id_unidad_medida where p.activo=1 and p.categoria like '%Petshop%' ;");
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["pro"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
            array_push($productos, $producto);
       }
        return $productos;
    }

      public function selectporlote() {
        $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT * FROM producto p inner join lote as l
                                        on p.id_producto = l.id_producto where p.activo=1 and  p.lote = 1 and  l.cantidad >0 ;");
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["descripcion"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]*$data_tabla[$clave]["factor"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
//           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setFecha_exp($data_tabla[$clave]["fecha_expiracion"]);
           $producto->setFechafab($data_tabla[$clave]["fecha_fabricacion"]);
           $producto->setNlote($data_tabla[$clave]["nlote"]);
           $producto->setRs($data_tabla[$clave]["rs"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
            array_push($productos, $producto);
       }
        return $productos;
    }

    public function selectfarmacia(){
       $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT *,p.descripcion as pro FROM producto p
        inner join unidadmedida u on p.id_unidad_medida=u.id_unidad_medida where p.activo=1 and p.categoria like '%Farmacia%' ;");
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["pro"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
            array_push($productos, $producto);
       }
        return $productos;  
    }
  public function selecttopicos(){
       $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT *,p.descripcion as pro FROM producto p
        inner join unidadmedida u on p.id_unidad_medida=u.id_unidad_medida where p.activo=1 and p.categoria like '%topicos%' ;");
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["pro"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
            array_push($productos, $producto);
       }
        return $productos;  
    }

public function selectbaños(){
       $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT *,p.descripcion as pro FROM producto p
        inner join unidadmedida u on p.id_unidad_medida=u.id_unidad_medida where p.activo=1 and p.categoria like '%baños%' ;");
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["pro"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
            array_push($productos, $producto);
       }
        return $productos;  
    }

    public function selectid($id) {

    }
    public function actualizarexistencias($cant,$id){
        $data_source = new DataSource();
        $fila = 0;
        $fila = $data_source->ejecutarActualizacion("
        call sp_actualizarexistencia(?,?)" ,array($id,$cant));

      return $fila;


    }
    public function insertarlote($lote){
        $data_source = new DataSource();
        $fila = 0;
        $fila = $data_source->ejecutarActualizacion("
        call sp_insertlote(?,?,?,?,?,?)" ,array($lote->getFechaexp(),
                                    $lote->getFechafa(),
                                    $lote->getNlote(),
                                    $lote->getRs(),
                                    $lote->getCant(),
                                    $lote ->getIdprod()));

      return $fila;


    }
    
    
    
    
    public function selecttopicosserv($categoria) {
        $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT *,p.descripcion as pro FROM producto p
        inner join unidadmedida u on p.id_unidad_medida=u.id_unidad_medida where p.activo=1 and categoria=? ;" ,array($categoria));
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["pro"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
           
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
           $producto->setFechafab($data_tabla[$clave]["fechafab"]);
           $producto->setFecha_exp($data_tabla[$clave]["fechaexp"]);
           $producto->setNlote($data_tabla[$clave]["nlote"]);
           $producto->setRs($data_tabla[$clave]["rs"]);
            array_push($productos, $producto);
       }
        return $productos;
    }
    
 public function  buscarpordescrip($cadena){
     
      $data_source = new DataSource();
        $data_tabla = $data_source->ejecutarconsulta("SELECT * FROM producto where activo=1 and id_unidad_medida=1  and concat(codigo,descripcion) like concat('%',?,'%');",
                array($cadena));
        $productos=  array();
        $producto=null;
       foreach ($data_tabla as $clave => $valor){
           $producto= new producto();
           $producto->setId($data_tabla[$clave]["id_producto"]);
           $producto->setcodigo($data_tabla[$clave]["codigo"]);
           $producto->setdescripcion($data_tabla[$clave]["descripcion"]);
           $producto->setPrecio($data_tabla[$clave]["precio"]);
           $producto->setStock($data_tabla[$clave]["stock"]);
           $producto->setObservacion($data_tabla[$clave]["observacion"]);
//           $producto->setIdunidmed($data_tabla[$clave]["abreviatura"]);
           $producto->setUnidmedv($data_tabla[$clave]["unidmedventa"]);
           $producto->setUnidmedc($data_tabla[$clave]["unidmedcompra"]);
           $producto->setStockmin($data_tabla[$clave]["stockmin"]);
           $producto->setStockmax($data_tabla[$clave]["stockmax"]);
           $producto->setPrecioc($data_tabla[$clave]["preciocompra"]);
           $producto->setFactor($data_tabla[$clave]["factor"]);
           $producto->setLote($data_tabla[$clave]["lote"]);
            array_push($productos, $producto);
       }
        return $productos;  
     
     
 }


//put your code here
}
