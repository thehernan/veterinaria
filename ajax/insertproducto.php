<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
$insert =0;
$duplicado=0;

$msjinsert= '';
$msjduplicado='';
$codigo= $_POST['codigo'];
//$descripcion="";
//if(!empty($descripcion)){
  $descripcion=$_POST['descripcion'];

//}


$precio = $_POST['preciov'];
$precioc = $_POST['precioc'];
//$stock = $_POST['stock'];
$stock = 0;
$idperfil = $_SESSION['user_id'];
$activo = 1;
$observacion = $_POST['observa'];
$idunid = $_POST['idunidmed'];

///////////////////////////////////////
$idunidmedc= $_POST['idunidmedcompra'];
$idunidmedv = $_POST['idunidmedventa'];
$factor = $_POST['factor'];
$stockmin = $_POST['stockmin'];
$stockmax = $_POST['stockmax'];
$precioc = $_POST['precioc'];
$cate = $_POST['categoria'];
$lote = 1;
$fecha_exp=$_POST['fechaexp'];
$fechafab=$_POST['fechafact'];
$nlote=$_POST['nlote'];

$rs=$_POST['rs'];

$invinicial=$_POST['invinicial'];

$codsunat = $_POST['idcodsunat'];


if(empty($_POST['lote'])){

    $lote=0;
}




//////////////////////////////////////

$producto = new producto();

$producto->setcodigo($codigo);
$producto->setdescripcion($descripcion);
$producto->setprecio($precio);
$producto->setstock($stock);
$producto->setactivo($activo);
$producto->setidperfil($idperfil);
$producto->setobservacion($observacion);
$producto->setidunidmed($idunid);
////////////////////
$producto->setUnidmedv($idunidmedv);
$producto->setUnidmedc($idunidmedc);
$producto->setFactor($factor);
$producto->setStockmin($stockmin);
$producto->setStockmax($stockmax);
$producto->setLote($lote);
$producto->setPrecioc($precioc);
$producto->setCategoria($cate);
///////////////////////
$producto->setIdcodsunat($codsunat);
/////////////////////////////
$producto->setFecha_exp($fecha_exp);
$producto->setFechafab($fechafab);
$producto->setNlote($nlote);
$producto->setRs($rs);
$producto->setInvinicial($invinicial);
/////////////////////////////
$productocontrol = new productocontroller();


$duplicado = $productocontrol->duplicado($codigo);


if ($duplicado==0){
    $insert = $productocontrol ->insertar($producto);
    if($insert!=0){
       echo  $msjinsert='valido';
        
    }else {
        
      echo  $msjinsert='errorinsert';
    }
    
    
  
}else {
    
    echo $msjduplicado='duplicado';
}


?>
