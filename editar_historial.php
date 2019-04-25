<?php
require_once ("config/db.php");
require_once ("config/conexion.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/mascotacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/mascota.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/producto.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/historialcontroller.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/historiaservicioscontroller.php");
$op = 'historia';
$mascotacontrol = new mascotacontroller();

$productocontrol = new productocontroller();
$producto = new producto();

$historiacontrol = new historialcontroller();
$historiaservcont = new historiaservicioscontroller();

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $idc = $_GET['idc'];
    $mascota = $mascotacontrol->selectid($id);
}
if (!empty($_GET['idhist'])) {
    $idhistoria = $_GET['idhist'];
    $historia = $historiacontrol->selectOne($idhistoria);
    $historiaserv = $historiaservcont->selectid($idhistoria);
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head >
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>:::SISTEMA VETERINARIA:::</title>
        <!-- Bootstrap Styles-->
        <link rel="icon" sizes="192x192" href="img/dog-vector.png"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">

            <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css" >



    </head>
    <body >
                    <style>
                        .tamano{
                            width: 90% !important;
                        }
                    </style>
                    <div id="wrapper">
                        <?php include('nav.php'); ?>
                        <!--/. NAV TOP  -->
                        <?php include('menu.php'); ?>
                        <!-- /. NAV SIDE  -->

                        <div id="page-wrapper" >
                            <div id="page-inner">
                                <!-- <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-header">
                                    Registrar Nuevo Cliente
                                </h1>
        
                            </div>
                            </div> -->
                                <!-- /. ROW  -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="resultados_ajaxnu"></div>
                                        <div class="panel panel-default">
                                            <!--                        <div class="panel-heading">
                                                                        Registro de Ficha Clinica
                                                                    </div>-->
                                            <div class="panel-body">

                                                <div class=" col-md-12">
                                                    <div class="panel panel-danger">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-xs-4">
                                                                    <br>
                                                                        <?php echo'<img src="data:image/jpg;base64 , ' . $mascota->getFoto() . '"  width="90%" class="img-circle" alt="Paciente Imagen">' ?>

                                                                </div>

                                                                <div class="col-xs-8 ">
                                                                    <div class="h2">N° de ficha: <?= $id; ?></div><br>
                                                                        <div>Datos del paciente:</div>
                                                                        <div class="h2"><?= $mascota->getNombre(); ?></div>
                                                                        <div class="h4">Raza: <?= $mascota->getRaza(); ?></div>
                                                                        <div class="h4">Pelaje: <?= $mascota->getPelaje(); ?></div>
                                                                        <div class="h4">F. Nac.: <?php echo $mascota->getFnac(); ?></div><br>
                                                                            <div class="h4"><strong>[ Modo Edición ]</strong></div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="panel-footer">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <!--<button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar producto</button>-->
                                                                    <a href="ficha_paciente.php?id=<?= $id ?>&idc=<?= $idc ?>" name="btnbuscar" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw"></i> Salir del modo edición</a>   
                                                                </div>
                                                                

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class=" col-md-12">
                                                    <form  method="post" name="editarhistorial" id="editarhistorial" enctype="multipart/form-data">


                                                        <div class="row">
                                                            <input type="hidden" id="txtid" name="txtid" value="<?= $id ?>">
                                                                <input type="hidden" id="txtidhist" name="txtidhist" value="<?= $idhistoria ?>">


                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <label>Fecha</label>
                                                                        <?php $date = new DateTime($historia->getFecha());
                                                                        ?>
                                                                        <input type="datetime-local" name="txtf" id="txtf"  class="form-control" value="<?= $date->format('Y-m-d\TH:i:s'); ?>"required>

                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-9">

                                                                    <div class="form-group">
                                                                        <label>Doctor: </label>
                                                                        <select class="form-control" id="txtiddoctor" name="txtiddoctor" required>
                                                                            <option value="">Selecciona</option>
                                                                            <?php
                                                                            $sql = "SELECT * FROM doctor";
                                                                            echo $sql;
                                                                            $resultarea = mysqli_query($conexion, $sql);

                                                                            while ($area = mysqli_fetch_row($resultarea)):
                                                                                if ($historia->getIddoctor() == $area[0]):

                                                                                    echo '<option value="' . $area[0] . '" selected="selected">' . $area[1] . ' ' . $area[2] . '</option>';

                                                                                else:
                                                                                    echo '<option value="' . $area[0] . '">' . $area[1] . ' ' . $area[2] . '</option>';
                                                                                endif;
                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-9">

                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>F.C</label>
                                                                    <input type="text" name="txtfc" id="txtfc" class="form-control  input-sm" value="<?= $historia->getFc(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label> F.R</label>
                                                                    <input type="text" name="txtfr" id="txtfr"  class="form-control  input-sm" value="<?= $historia->getFr(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>P</label>
                                                                    <input type="text" name="txtp" id="txtp" class="form-control  input-sm" value="<?= $historia->getP(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>P.A.M</label>
                                                                    <input type="text" name="txtpam" id="txtpam" class="form-control  input-sm" value="<?= $historia->getPam(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>P.S</label>
                                                                    <input type="text" name="txtps" id="txtps" class="form-control  input-sm" value="<?= $historia->getPs(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>P.D</label>
                                                                    <input type="text" name="txtpd" id="txtpd" class="form-control  input-sm" value="<?= $historia->getPd(); ?>">

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>D %</label>
                                                                    <input type="text" name="txtd" id="txtd" class="form-control  input-sm" value="<?= $historia->getD(); ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>C.P.P</label>
                                                                    <input type="text" name="txtcpp" id="txtcpp" class="form-control  input-sm" value="<?= $historia->getCpp(); ?>">

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-1">
                                                                <div class="form-group">
                                                                    <label>Temperatura</label>
                                                                    <input type="text" name="txttemp" id="txttemp" class="form-control  input-sm" value="<?= $historia->getTemperatura(); ?>">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="row">-->

                                                        <!--</div>-->
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Descripción:</label>
                                                                    <textArea class="form-control" name="textdescrip" id="textdescrip" value="<?= $historia->getDescripcion(); ?>"><?= $historia->getDescripcion(); ?></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Diagnostico:</label>
                                                <textArea class="form-control" name="textdiagnostico" id="textdiagnostico" value="<?= $historia->getDiagnostico(); ?>"><?= $historia->getDiagnostico(); ?></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Tratamiento:</label>
                                                <textArea class="form-control" name="texttratamiento" id="texttratamiento" value="<?= $historia->getTratamiento(); ?>"><?= $historia->getTratamiento(); ?></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Observación:</label>
                                                <textArea class="form-control" name="textobservacion" id="textobservacion" value="<?= $historia->getObservacion(); ?>"><?= $historia->getObservacion(); ?></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                            
                                        
                                        
                                    </div>
                                    
                                  
                                    <div class="row">
                                       
                                        
                                        
                                       
                                        
                                        
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo' <img src="data:image/jpg;base64 ,' . $historia->getAnalisisfoto() . '" width="48" height="48" alt="Foto" id="foto" />'; ?>
                                                <label>Adjuntar Análisis:</label>
                                                <input type="file" class="form-control" name="fileanalisis" id="fileanalisis" accept="image/*">  <!-- application/pdf -->
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                   <div class="row">
                                    <div class="col-lg-6">

                                        <button type="submit" name="btngrabar" id="btngrabar"  class="btn btn-primary "> <span class="glyphicon glyphicon-saved"></span>Guardar</button>
                                     </div>
                                     </div>
                                    <hr>


                                 </form>
                                                    
                                                    <div id="respuestaform"></div>
                                <?php
                                    $idprod = array();
                                    $precios = array();
                                    $ids=array();
                                    $total = 0;
                                    foreach ($historiaserv as $servicio) {
                                        array_push($idprod, $servicio->getIdproducto());
                                        array_push($precios, $servicio->getPrecio());
                                        array_push($ids, $servicio->getId());
                                        
                                        $total += $servicio->getPrecio();
                                    }
                                    $servicios =$productocontrol->listartopicosserv('topicos-servicios') 
                                ?>                    
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         Edición de servicios
                                    </div>
                                    <div class="panel-body" id="panelservicios">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Servicio</th>
                                                        <th>Precio</th>

                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    
                                        
                                            
                                                    <tr>
                                                     <td>
                                                        1
                                                    </td>
                                                <td>
                                                    
                                                   
                                                   <select   id="servicio1" name="servicio1">
                                                       <option value="">Seleccione Servicio</option>

                                                                        <?php
                                                                                                        
                                                                        foreach ($servicios as $producto) {
                                                                            if(array_key_exists(0, $idprod)){
                                                                            if ($idprod[0] == $producto->getId()):

                                                                                echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                            else:
                                                                                echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                            endif;
                                                                        }else {
                                                                            echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                            
                                                                        }
                                                                        }
                                                                        ?>

                                                       </select>

                                                 
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio1" id="textservicio1" onkeyup="Calculartotalficha();" value="<?= array_key_exists(0, $precios) ? $precios[0] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                        
                                                         <?php if(array_key_exists(0, $precios)):?>
                                                         <button class="btn btn-primary" id="btnservicio1" onclick="updateservicio('#servicio1','#textservicio1',<?= $ids[0]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[0]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" id="btnservicio1" onclick="insertservicio('#servicio1','#textservicio1')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        2
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select  id="servicio2" name="servicio2">
                                                       <option value="">Seleccione Servicio</option>

                                                                                <?php
                                                                            foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                if(array_key_exists(1, $idprod)){
                                                                                if ($idprod[1] == $producto->getId()):

                                                                                    echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                else:
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                endif;
                                                                            }else {
                                                                            echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                            
                                                                        }
                                                                            
                                                                            
                                                                                }
                                                                            ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio2" id="textservicio2" onkeyup="Calculartotalficha();" value="<?= array_key_exists(1, $precios) ? $precios[1] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(1, $precios)):?>
                                                         <button class="btn btn-primary" id="btnservicio2" onclick="updateservicio('#servicio2','#textservicio2',<?= $ids[1]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[1]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio2','#textservicio2')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        3
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select id="servicio3" name="servicio3">
                                                       <option value="">Seleccione Servicio</option>

                                                                            <?php
                                                                                foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                    if(array_key_exists(2, $idprod)){
                                                                                    if ($idprod[2] == $producto->getId()):

                                                                                        echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                    else:
                                                                                        echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                    endif;
                                                                                
                                                                                }else{
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                                }}
                                                                                ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio3" id="textservicio3" onkeyup="Calculartotalficha();" value="<?= array_key_exists(2, $precios) ? $precios[2] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(2, $precios)):?>
                                                         <button class="btn btn-primary" id="btnservicio3" onclick="updateservicio('#servicio3','#textservicio3',<?= $ids[2]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[2]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio3','#textservicio3')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        4
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select id="servicio4" name="servicio4">
                                                       <option value="">Seleccione Servicio</option>

                                                                                    <?php
                                                                            foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                if(array_key_exists(3, $idprod)){
                                                                                if ($idprod[3] == $producto->getId()):

                                                                                    echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                else:
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                endif;
                                                                            }else{
                                                                                 echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                            }}
                                                                            ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio4" id="textservicio4" onkeyup="Calculartotalficha();" value="<?= array_key_exists(3, $precios) ? $precios[3] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(3, $precios)):?>
                                                         <button class="btn btn-primary" id="btnservicio4" onclick="updateservicio('#servicio4','#textservicio4',<?= $ids[3]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[3]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio4','#textservicio4')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        5
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select  id="servicio5" name="servicio5">
                                                       <option value="">Seleccione Servicio</option>

                                                                            <?php
                                                                                foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                    if(array_key_exists(4, $idprod)){
                                                                                    if ($idprod[4] == $producto->getId()):

                                                                                        echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                    else:
                                                                                        echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                    endif;
                                                                                }else{
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                                }}
                                                                                ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio5" id="textservicio5" onkeyup="Calculartotalficha();" value="<?= array_key_exists(4, $precios) ? $precios[4] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(4, $precios)):?>
                                                        <button class="btn btn-primary" id="btnservicio5" onclick="updateservicio('#servicio5','#textservicio5',<?= $ids[4]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[4]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio5','#textservicio5')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        6
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select  id="servicio6" name="servicio6">
                                                       <option value="">Seleccione Servicio</option>

                                                                                <?php
                                                                            foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                if(array_key_exists(5, $idprod)){
                                                                                if ($idprod[5] == $producto->getId()):

                                                                                    echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                else:
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                endif;
                                                                            }else{
                                                                                echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                            }}
                                                                            ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio6" id="textservicio6" onkeyup="Calculartotalficha();" value="<?= array_key_exists(5, $precios) ? $precios[5] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(5, $precios)):?>
                                                        <button class="btn btn-primary" id="btnservicio6" onclick="updateservicio('#servicio6','#textservicio6',<?= $ids[5]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[5]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio6','#textservicio6')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    <tr>
                                                     <td>
                                                        7
                                                    </td>
                                                <td>
                                                    <div class="form-group">
                                                   
                                                   <select  id="servicio7" name="servicio7">
                                                       <option value="">Seleccione Servicio</option>

                                                                                <?php
                                                                            foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {
                                                                                 if(array_key_exists(6, $idprod)){
                                                                                if ($idprod[6] == $producto->getId()):

                                                                                    echo '<option value="' . $producto->getId() . '" selected="selected">' . $producto->getDescripcion() . '</option>';
                                                                                else:
                                                                                    echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';

                                                                                endif;
                                                                            }else{
                                                                                echo '<option value="' . $producto->getId() . '">' . $producto->getDescripcion() . '</option>';
                                                                            }}
                                                                            ?>

                                                       </select>

                                                  </div>
                                                </td>
                                                <td>
                                                   <input type="text" class="form-control" name="textservicio7" id="textservicio7" onkeyup="Calculartotalficha();" value="<?= array_key_exists(6, $precios) ? $precios[6] : 0 ?>"> 
                                                    
                                                </td>
                                                    <td>
                                                         
                                                         <?php if(array_key_exists(6, $precios)):?>
                                                        <button class="btn btn-primary" id="btnservicio7" onclick="updateservicio('#servicio7','#textservicio7',<?= $ids[6]?>)"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <button class="btn btn-danger" onclick="eliminarserviciohist(<?= $ids[6]?>);"><span class="glyphicon glyphicon-remove"></span></button>
                                                         <?php else: ?>
                                                         <button class="btn btn-primary" onclick="insertservicio('#servicio7','#textservicio7')"><span class="glyphicon glyphicon-saved"></span></button>
                                                         <?php endif; ?>
                                                    </td>
                                                
                                            </tr>
                                                    
                                                    
                                                    
                                                </tbody>

                                            </table>
                                        </div>
                                           <!--End Advanced Tables -->
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="h4 text-danger"><strong>Total a pagar: S/</strong></div>
                                                    <input type="text" class="form-control" name="texttotal" id="texttotal" readonly="" value="<?= $total; ?>">
                                                </div>


                                            </div>
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                                    <div id="respuestaservicios"></div>
                             
                            </div>                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                

                                    <hr>
                              <!-- ************* modal ****************-->
                              <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg tamano">
                                                    <div class="modal-content">
                                                                        <?php include ('modal/modalproductoeditarhist.php'); ?>
                                                </div>
                                                </div>
                            </div>
                              <!-- *************************************-->
                         
                                <div class="col-lg-12">
                                    <label>Medicamento a suministrar </label><br>
                                    
                                    <button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar</button>

                                    <hr>
                                        
                                    
                                <div class="table-responsive">
                                   <div id="tabla">
                                        <?php include './ajax/detalle_historia_editar.php'; ?>

                                   </div>
                               </div>
                                </div>


                           
                            </div>
                        </div>
                     </div>
                   </div>
                </div>

                                                        <?php include('footer.php'); ?>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
      <!-- JS Scripts-->
    <!-- jQuery Js -->
     <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/i18n/defaults-es_ES.js"></script>

        <script>
                                                       $(document).ready(function () {

                                                           $('.datatable').dataTable({
                                                               'language': español
                                                           });

                                                       });

                </script>


      <!-- Custom Js -->
        <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
     <script src="js/mijs.js"></script>

    <script src="js/VentanaCentrada.js"></script>
    <script src="js/jquery.blockUI.js"></script>
<!-- <script src=" js/underscore-min.js"></script>-->
</body>
</html>

<script>
    function init() {
        var inputFile = document.getElementById('fileanalisis');
        inputFile.addEventListener('change', mostrarImagenlocal, false);
        
       
    }

    function mostrarImagenlocal(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('foto');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
    
       
    window.addEventListener('load', init, false);

</script>
