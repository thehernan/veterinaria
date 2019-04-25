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
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/banio.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/baniocontroller.php");

//$pedidodao = new pedidodao();
$baniocontrol= new baniocontroller();
//$banio = new banio();
//$pedido = new pedido();
$daotemp = new TempDAO();


@session_start();
$iduser = $_SESSION['user_id'];
//$idpersona = $_POST["idpersona"];
$idbanio = $_POST["idbanio"];


$op="ventabanio";
$sumador_total=0;

$tempp = new Temp();

$daotemp->borrar($iduser,$op);

//echo ($idpedido);

    
//    var_dump($baniocontrol->buscarid($idbanio));
     $banio = $baniocontrol->buscarid($idbanio);
     
     if($banio->getId()>0){
         
        $temp = new Temp(); 
        $temp->setCantidad(1);
        $temp->setPrecio($banio->getPrecio());

        $temp->setIduser($iduser);
        $temp->setCodigo($banio->getCodigo());
        $temp->setDescripcion($banio->getDescripcion());
        $temp->setIdenti('admin');
        $temp->setOp($op);
        $temp->setIdproducto($banio->getIdprod());


        $daotemp->insertar($temp) ;
        
         
     }

               
               

       