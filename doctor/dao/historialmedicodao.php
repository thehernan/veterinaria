<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historialmedicodao
 *
 * @author HERNAN
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/config/DataSource.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/historialmedico.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/historialservicio.php");

class historialmedicodao {

    public function actualizar($objeto) {
        $data_source = new DataSource();
        $filas = 0;
//        $cliente = new cliente();
//        $cliente = $objeto;
        $filas = $data_source->ejecutarActualizacion("update historialmedico set facturado=true where id_historial=?;", array($objeto));
        return $filas;
    }
    public function actualizarficha(historialmedico $historial){
         $data_source = new DataSource();
//        $historial= new historialmedico();
//        $historial=$cabecera;
//        $verifi=FALSE;

         
        $data_tabla=0; 
        $data_tabla = $data_source->ejecutarActualizacion("update historialmedico set iddoctor=?,  horaatendio=?,fc=?, fr=?,p=?,"
                . "pam=?,ps=?,pd=?,d=?,cpp=?,temperatura=?,descripcion=?,diagnostico=?,tratamiento=?,observacion=?,"
                . "analisisfoto=? where id_historial=?"
                , array($historial->getIddoctor(),  $historial->getFecha(), $historial->getFc(), $historial->getFr()
            , $historial->getP(), $historial->getPam(), $historial->getPs(), $historial->getPd(), $historial->getD()
            , $historial->getCpp(), $historial->getTemperatura(), $historial->getDescripcion(), $historial->getDiagnostico(),
            $historial->getTratamiento(), $historial->getObservacion(), 
             $historial->getAnalisisfoto(),
            $historial->getId()));




        return $data_tabla;
        
        
        
    }
        public function actualizarfichanofoto(historialmedico $historial){
         $data_source = new DataSource();
//        $historial= new historialmedico();
//        $historial=$cabecera;
//        $verifi=FALSE;

         

       $data_tabla = $data_source->ejecutarActualizacion("update historialmedico set iddoctor=?,  horaatendio=?,fc=?, fr=?,p=?,"
                . "pam=?,ps=?,pd=?,d=?,cpp=?,temperatura=?,descripcion=?,diagnostico=?,tratamiento=?,observacion=?"
                . " where id_historial=?"
                , array($historial->getIddoctor(),  $historial->getFecha(), $historial->getFc(), $historial->getFr()
            , $historial->getP(), $historial->getPam(), $historial->getPs(), $historial->getPd(), $historial->getD()
            , $historial->getCpp(), $historial->getTemperatura(), $historial->getDescripcion(), $historial->getDiagnostico(),
            $historial->getTratamiento(), $historial->getObservacion(), 
             
            $historial->getId()));




        return $data_tabla;
        
        
        
    }

    public function eliminar($id) {
        
    }

    public function insertar($historial, $detalle, $servicios) {
        $data_source = new DataSource();
//        $historial= new historialmedico();
//        $historial=$cabecera;
//        $verifi=FALSE;



        $data_tabla = $data_source->ejecutarconsulta("call sp_insertarhistorial(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
                , array($historial->getIddoctor(), $historial->getIdmascota(), $historial->getFecha(), $historial->getFc(), $historial->getFr()
            , $historial->getP(), $historial->getPam(), $historial->getPs(), $historial->getPd(), $historial->getD()
            , $historial->getCpp(), $historial->getTemperatura(), $historial->getDescripcion(), $historial->getDiagnostico(),
            $historial->getTratamiento(), $historial->getObservacion(), $historial->getConsultacosto(), $historial->getTratamientocosto(),
            $historial->getAnalisiscosto(), $historial->getVacunacosto(), $historial->getServicioscosto(), $historial->getAnalisisfoto(),
            $historial->getCirujia(), $historial->getInternado()));



        $idhistorial = 0;

        foreach ($data_tabla as $clave => $valor) {
            $idhistorial = $data_tabla[$clave]["LAST_INSERT_ID()"];
        }




        if ($idhistorial != 0) {
            //////////////detalle /////
            $temp = new Temp();
//        $fila=0;
            foreach ($detalle as $temp) {

                $data_source->ejecutarActualizacion("call sp_insertardetalle_historia(?,?,?,?);", array($temp->getIdproducto(),
                    $temp->getPrecio(), $temp->getCantidad(), $idhistorial));
            }

            $histservicios = new historialservicio();


            foreach ($servicios as $histservicios) {
                $data_source->ejecutarActualizacion("insert into historialservicios(id_producto,precio,id_historial) values(?,?,?);", array($histservicios->getIdproducto(),
                    $histservicios->getPrecio(), $idhistorial));
            }




//        if($fila!=0){
//            $verifi=true;
//        }
        }

        return $idhistorial;
    }

    public function selectOne($id) {
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from historialmedico as h inner JOIN doctor as d 
        on h.iddoctor = d.iddoctor where id_historial=? and h.activo = true;", array($id));
        
         $historial = new historialmedico();
        foreach ($data_tabla as $clave => $valor) {
           
            $historial->setId($data_tabla[$clave]["id_historial"]);
            $historial->setIdmascota($data_tabla[$clave]["id_mascota"]);
            $historial->setFecha($data_tabla[$clave]["horaatendio"]);
            $historial->setFc($data_tabla[$clave]["fc"]);
            $historial->setFr($data_tabla[$clave]["fr"]);
            $historial->setP($data_tabla[$clave]["p"]);
            $historial->setPam($data_tabla[$clave]["pam"]);
            $historial->setPs($data_tabla[$clave]["ps"]);
            $historial->setPd($data_tabla[$clave]["pd"]);
            $historial->setD($data_tabla[$clave]["d"]);
            $historial->setCpp($data_tabla[$clave]["cpp"]);
            $historial->setIddoctor($data_tabla[$clave]["iddoctor"]);
            $historial->setFacturado($data_tabla[$clave]["facturado"]);
            $historial->setDoctor($data_tabla[$clave]["nombre"] . ' ' . $data_tabla[$clave]["apellidos"]);
            $historial->setTemperatura($data_tabla[$clave]["temperatura"]);
            $historial->setDescripcion($data_tabla[$clave]["descripcion"]);
            $historial->setDiagnostico($data_tabla[$clave]["diagnostico"]);
            $historial->setTratamiento($data_tabla[$clave]["tratamiento"]);
            $historial->setObservacion($data_tabla[$clave]["observacion"]);
            $historial->setConsultacosto($data_tabla[$clave]["consultacosto"]);
            $historial->setTratamientocosto($data_tabla[$clave]["tratamientocosto"]);
            $historial->setAnalisiscosto($data_tabla[$clave]["analisiscosto"]);
            $historial->setVacunacosto($data_tabla[$clave]["vacunacosto"]);
            $historial->setServicioscosto($data_tabla[$clave]["serviciosveterinariocosto"]);
            $historial->setAnalisisfoto($data_tabla[$clave]["analisisfoto"]);
            $historial->setCirujia($data_tabla[$clave]["cirujiacosto"]);
            $historial->setInternado($data_tabla[$clave]["internadocosto"]);

        }
        return $historial;
        
    }

    public function selectid($id) {
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from historialmedico as h inner JOIN doctor as d 
        on h.iddoctor = d.iddoctor where id_mascota=? and h.activo = true order by id_historial DESC;", array($id));
        $historias = array();
        $historial = null;
        foreach ($data_tabla as $clave => $valor) {
            $historial = new historialmedico();
            $historial->setId($data_tabla[$clave]["id_historial"]);
            $historial->setIdmascota($data_tabla[$clave]["id_mascota"]);
            $historial->setFecha($data_tabla[$clave]["horaatendio"]);
            $historial->setFc($data_tabla[$clave]["fc"]);
            $historial->setFr($data_tabla[$clave]["fr"]);
            $historial->setP($data_tabla[$clave]["p"]);
            $historial->setPam($data_tabla[$clave]["pam"]);
            $historial->setPs($data_tabla[$clave]["ps"]);
            $historial->setPd($data_tabla[$clave]["pd"]);
            $historial->setD($data_tabla[$clave]["d"]);
            $historial->setCpp($data_tabla[$clave]["cpp"]);
            $historial->setIddoctor($data_tabla[$clave]["iddoctor"]);
            $historial->setFacturado($data_tabla[$clave]["facturado"]);
            $historial->setDoctor($data_tabla[$clave]["nombre"] . ' ' . $data_tabla[$clave]["apellidos"]);
            $historial->setTemperatura($data_tabla[$clave]["temperatura"]);
            $historial->setDescripcion($data_tabla[$clave]["descripcion"]);
            $historial->setDiagnostico($data_tabla[$clave]["diagnostico"]);
            $historial->setTratamiento($data_tabla[$clave]["tratamiento"]);
            $historial->setObservacion($data_tabla[$clave]["observacion"]);
            $historial->setConsultacosto($data_tabla[$clave]["consultacosto"]);
            $historial->setTratamientocosto($data_tabla[$clave]["tratamientocosto"]);
            $historial->setAnalisiscosto($data_tabla[$clave]["analisiscosto"]);
            $historial->setVacunacosto($data_tabla[$clave]["vacunacosto"]);
            $historial->setServicioscosto($data_tabla[$clave]["serviciosveterinariocosto"]);
            $historial->setAnalisisfoto($data_tabla[$clave]["analisisfoto"]);
            $historial->setCirujia($data_tabla[$clave]["cirujiacosto"]);
            $historial->setInternado($data_tabla[$clave]["internadocosto"]);





            array_push($historias, $historial);
        }
        return $historias;
    }

    public function selecthistoriaid($id) {
        $data_source = new DataSource();
//        echo ("select * from sp_busquedasensitivacliente('NOMBRE','$cadena');");
        $data_tabla = $data_source->ejecutarconsulta("select * from historialmedico as h inner JOIN doctor as d 
        on h.iddoctor = d.iddoctor where id_historial=?;", array($id));
        $historias = array();
        $historial = null;
        foreach ($data_tabla as $clave => $valor) {
            $historial = new historialmedico();
            $historial->setId($data_tabla[$clave]["id_historial"]);
            $historial->setIdmascota($data_tabla[$clave]["id_mascota"]);
            $historial->setFecha($data_tabla[$clave]["horaatendio"]);
            $historial->setFc($data_tabla[$clave]["fc"]);
            $historial->setFr($data_tabla[$clave]["fr"]);
            $historial->setP($data_tabla[$clave]["p"]);
            $historial->setPam($data_tabla[$clave]["pam"]);
            $historial->setPs($data_tabla[$clave]["ps"]);
            $historial->setPd($data_tabla[$clave]["pd"]);
            $historial->setD($data_tabla[$clave]["d"]);
            $historial->setCpp($data_tabla[$clave]["cpp"]);
            $historial->setIddoctor($data_tabla[$clave]["iddoctor"]);
            $historial->setFacturado($data_tabla[$clave]["facturado"]);
            $historial->setDoctor($data_tabla[$clave]["nombre"] . ' ' . $data_tabla[$clave]["apellidos"]);
            $historial->setTemperatura($data_tabla[$clave]["temperatura"]);
            $historial->setDescripcion($data_tabla[$clave]["descripcion"]);
            $historial->setDiagnostico($data_tabla[$clave]["diagnostico"]);
            $historial->setTratamiento($data_tabla[$clave]["tratamiento"]);
            $historial->setObservacion($data_tabla[$clave]["observacion"]);
            $historial->setConsultacosto($data_tabla[$clave]["consultacosto"]);
            $historial->setTratamientocosto($data_tabla[$clave]["tratamientocosto"]);
            $historial->setAnalisiscosto($data_tabla[$clave]["analisiscosto"]);
            $historial->setVacunacosto($data_tabla[$clave]["vacunacosto"]);
            $historial->setServicioscosto($data_tabla[$clave]["serviciosveterinariocosto"]);
            $historial->setAnalisisfoto($data_tabla[$clave]["analisisfoto"]);
            $historial->setCirujia($data_tabla[$clave]["cirujiacosto"]);
            $historial->setInternado($data_tabla[$clave]["internadocosto"]);




            array_push($historias, $historial);
        }
        return $historias;
    }
    public function delete($id){
        $data_source = new DataSource();
        
        return $data_source->ejecutarActualizacion("update historialmedico set activo=false where id_historial=?;", array($id));
        
    }

//put your code here
}
