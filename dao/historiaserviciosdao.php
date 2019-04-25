<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historiaserviciosdao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/config/DataSource.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/historialservicio.php");

class historiaserviciosdao {

    //put your code here
    public function selectid($id) {
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select hists.precio,hists.id_producto,prod.codigo,prod.descripcion,hists.id_historialservicios from historialservicios as hists INNER JOIN producto as prod
                on prod.id_producto=hists.id_producto where hists.id_historial = ? order by id_historialservicios;", array($id));
        $histservs = array();
        $histserv = null;
        foreach ($data_tabla as $clave => $valor) {
            $histserv = new historialservicio();
            $histserv->setPrecio($data_tabla[$clave]["precio"]);
            $histserv->setIdproducto($data_tabla[$clave]["id_producto"]);
            $histserv->setCodigo($data_tabla[$clave]["codigo"]);
            $histserv->setProducto($data_tabla[$clave]["descripcion"]);
            $histserv->setId($data_tabla[$clave]["id_historialservicios"]);



            array_push($histservs, $histserv);
        }
        return $histservs;
    }
    
public function delete($id){
     $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarActualizacion("delete from historialservicios where id_historialservicios=?;", array($id));
    
        return $data_tabla;
  
}
public function insert(historialservicio $hist){
     $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarActualizacion("insert into historialservicios(id_producto,precio,id_historial) values(?,?,?);", 
                array($hist->getIdproducto(),
                    $hist->getPrecio(),
                    $hist->getIdhistorial()));
    
        return $data_tabla;
  
}

public function update(historialservicio $hist){
     $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarActualizacion("update  historialservicios set id_producto=?,precio=? where id_historialservicios=?;", 
                array($hist->getIdproducto(),
                    $hist->getPrecio(),
                    $hist->getId()));
    
        return $data_tabla;
  
}

}
