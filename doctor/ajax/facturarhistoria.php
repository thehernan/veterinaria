<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/dao/tempdao.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/model/pedido.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/dao/pedidodao.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialmedico.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historialcontroller.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historiaservicioscontroller.php");
//$pedidodao = new pedidodao();
//$historialcontrol= new historialcontroller();
//$historial = new historialmedico();
//$pedido = new pedido();
$daotemp = new TempDAO();


$histservicioscontrol = new historiaservicioscontroller();
$histservicios = new historialservicio();


@session_start();
$iduser = $_SESSION['user_id'];
//$idpersona = $_POST["idpersona"];
$idhist = $_POST["idhistoria"];

echo 'idhistorial '.$idhist;
$op="ventatopicos";
$sumador_total=0;

$tempp = new Temp();

$daotemp->borrar($iduser,$op);

//echo ($idpedido);

    
var_dump($histservicioscontrol->selectid($idhist));

        foreach ($histservicioscontrol->selectid($idhist) as $histservicios){
            
           
//           if ($historial->getConsultacosto()>0){
               $temp = new Temp(); 
                $temp->setCantidad(1);
                $temp->setPrecio($histservicios->getPrecio());
                
                $temp->setIduser($iduser);
                $temp->setCodigo($histservicios->getCodigo());
                $temp->setDescripcion($histservicios->getProducto());
                $temp->setIdproducto($histservicios->getIdproducto());
                
                $temp->setIdenti('admin');
                $temp->setOp($op);
                $daotemp->insertar($temp) ;
               
               
//           }
                
                
//           if ($historial->getTratamientocosto()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getTratamientocosto());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('FT'.$historial->getIdmascota());
//                $temp->setDescripcion('Tratamiento');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
//           if ($historial->getAnalisiscosto()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getAnalisiscosto());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('FA'.$historial->getIdmascota());
//                $temp->setDescripcion('Analisis');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
//           if ($historial->getVacunacosto()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getVacunacosto());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('FV'.$historial->getIdmascota());
//                $temp->setDescripcion('Vacuna');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
//           if ($historial->getServicioscosto()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getServicioscosto());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('FS'.$historial->getIdmascota());
//                $temp->setDescripcion('Servicios Veterinarios');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
//            if ($historial->getCirujia()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getCirujia());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('CV'.$historial->getIdmascota());
//                $temp->setDescripcion('Cirujia Veterinaria');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
//            if ($historial->getInternado()>0){
//               $temp = new Temp(); 
//                $temp->setCantidad(1);
//                $temp->setPrecio($historial->getInternado());
//                
//                $temp->setIduser($iduser);
//                $temp->setCodigo('IV'.$historial->getIdmascota());
//                $temp->setDescripcion('Internado Veterinario');
//                $temp->setIdenti('admin');
//                $temp->setOp($op);
//                $daotemp->insertar($temp) ;
//               
//               
//           } 
           
            
//            $precio_vent=$tempp->getPrecio();
//             $cantida = $tempp->getCantidad();
//             $precio_total=$precio_vent*$cantida;
//             $sumador_total+=$precio_total;//Sumadors
        }