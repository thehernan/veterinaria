<?php
error_reporting(0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/lote.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
$producto = new producto();
$productocontrol = new productocontroller();

$fila =0;




//if (empty($_POST["txtlote"]) && empty($_POST["txtfechfa"])
//        && empty($_POST["txtfechaexp"]) && empty($_POST["txtnlote"]) && empty($_POST["txtrs"])
//        && empty($_POST["txtcant"])){

    $lote = $_POST["txtlote"];
    $idprod= $_POST["txtidproducto"];
    $cant = $_POST["txtcant"];
   

    if(!empty($_POST["txtfecha"]) && !empty($_POST["txtfechaexp"]) && !empty($_POST["txtnlote"])
            && !empty($_POST["txtrs"])){
        $fechaf = $_POST["txtfecha"];
        $fechaexp = $_POST["txtfechaexp"];
        $nlote = $_POST["txtnlote"];
        $rs = $_POST["txtrs"];

    }



    if($lote == 1){
        $lote = new lote();
        $lote->setFechaexp($fechaexp);

        $lote->setFechafa($fechaf);
        $lote->setNlote($nlote);
        $lote->setRs($rs);
        $lote->setCant($cant);
        $lote->setIdprod($idprod);
        $fila = $productocontrol->insertlote($lote);
    }else {

        $fila = $productocontrol->actualizarexist($cant, $idprod);
    }

    if($fila >0){

    ?>
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Bien hecho!</strong> Existencias agregadas exitosamente

        </div>

        <?php
    }else {
        ?>
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>

        </div>





        <?php
    }









//}
