<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/mascotacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/mascota.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/historialcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/historialmedico.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/detallehistoriacontrolller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/detallehistorial.php");


require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/controller/historiaservicioscontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/sistemaveterinaria/model/historialservicio.php");

$op = 'historia';

$mascotacontrol = new mascotacontroller();

$historiacontrol = new historialcontroller();

$detallecontrol = new detallehistoriacontrolller();

$histservcontrol = new historiaservicioscontroller();


if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $idc = $_GET['idc'];
    $mascota = $mascotacontrol->selectid($id);
    $arrayhistoria = $historiacontrol->selectid($id);
} else {

    header('location:lista_mascotas.php');
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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



    </head>
    <body>
        <style>
            .tamano{
                width: 90% !important;
            }

            .panelprincipal {
                max-height:900px;
                overflow-y:auto;  
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
                            <div class="panel panel-default panelprincipal">

                                <div class="panel-body" >



                                    <div class=" col-md-12">
                                        <div class="panel panel-warning">
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
                                                            <div class="h4">F. Nac.: <?= $mascota->getFnac(); ?></div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <!--<button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar producto</button>-->
                                                        <a href="lista_mascotas.php" name="btnbuscar" type="button" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i> Atras</a>   
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a  href="nuevo_historial.php?id=<?= $id ?>&idc=<?= $idc ?>" type="button" class="btn btn-primary "><i class="fa fa-plus fa-fw"></i> Nuevo</a>


                                                    </div>

                                                    <!--                                            <div class="col-md-2">
                                                                                                    <a target="_blank"  href="pdf/documentos/historial.php?idc=<?php echo $idc; ?> & idm=<?php echo $id; ?>" type="button" class="btn btn-primary "><i class="fa fa-plus fa-fw"></i> Imprimir</a>
                                                                                                    
                                                                                                         
                                                                                                </div>-->

                                                    <!--                                            <div class="col-md-3">
                                                                                                    <input type="date" name="fecha" id="fecha" class="form-control">
                                                                                                   
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    
                                                                                                    <button name="btnbuscar" type="button" class="btn btn-primary"><i class="fa fa-search fa-fw"></i>Buscar</button>   
                                                                                                </div>-->

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div id="respuesta"></div>
                                    <div id="detalle">
                                    <!----- atenciones -->
                                        <?php
                                        foreach ($arrayhistoria as $historia) {
                                            ?>

                                            <div class=" col-md-12">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <div class="row">


                                                            <div class="col-xs-12 ">

                                                                <div class="col-xs-3">
                                                                    <div class="h5">Fecha: <i class="fa fa-calendar fa-fw"></i> <?= $historia->getFecha(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-3">
                                                                    <div class="h5">Dr(a): <i class="fa fa-user fa-fw"></i> <?= $historia->getDoctor(); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-3">
                                                                    <?php
                                                                    if ($historia->getFacturado() == 0) {
                                                                        echo '<div class="h5 text-danger">Estado: <i class="fa fa-money fa-fw"></i> Debe </div>';
                                                                    } else {

                                                                        echo '<div class="h5">Estado :<i class="fa fa-money fa-fw"></i> Cancelado </div>';
                                                                    }
                                                                    ?>


                                                                </div>
                                                                <div class="col-xs-3">

                                                                    <a href="editar_historial.php?id=<?= $id ?>&idc=<?= $idc ?>&idhist=<?= $historia->getId();?>" type="button" class="btn btn-success" id="btneditarhistoria"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                                                    <button type="button" class="btn btn-danger" id="btneliminarhistoria" onclick="eliminarhistoria(<?= $historia->getId() ?>)"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
                                                                </div>



                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 ">
                                                                <div class="col-xs-2">
                                                                    <div class="h5">FC: <?= $historia->getFc(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">FR: <?= $historia->getFr(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">P: <?= $historia->getP(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">PAM: <?= $historia->getPam(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">PS: <?= $historia->getPs(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">PD: <?= $historia->getPd(); ?> 

                                                                    </div>
                                                                </div>






                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 ">
                                                                <div class="col-xs-2">
                                                                    <div class="h5">D: %<?= $historia->getD(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">CPP: <?= $historia->getCpp(); ?> 

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <div class="h5">Temp.: <?= $historia->getTemperatura(); ?> 

                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-xs-12">
                                                                <div class="col-xs-3">
                                                                    <div class="h5">Descripción:  

                                                                    </div> <textArea readonly=""><?= $historia->getDescripcion() ?></textArea>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="h5">Diagnostico:  

                                                        </div> <textArea readonly=""><?= $historia->getDiagnostico() ?></textArea>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="h5">Tratamiento:  

                                                        </div> <textArea readonly=""><?= $historia->getTratamiento() ?></textArea>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="h5">Observación:  

                                                        </div> <textArea readonly=""><?= $historia->getObservacion() ?></textArea>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                                
                                                    
                                                                <?php
                                                                $histservi = new historialservicio();
                                                                $cont = 0;
                                                                $total = 0;
                                                                foreach ($histservcontrol->selectid($historia->getId()) as $histservi) {


                                                                    if ($cont == 0 || $cont == 3) {
                                                                        echo '<div class="row">';
                                                                        echo '<div class="col-xs-12">';
                                                                    }
                                                                    ?>
                                                        
                                                        <div class="col-xs-3">
                                                            <div class="h5"><?= $histservi->getProducto(); ?>: S/ <?= number_format($histservi->getPrecio(), 2) ?> 

                                                            </div> 
                                                        </div>
                                                        
                                                            <?php
                                                            if ($cont == 0 || $cont == 3) {
                                                                echo '</div> </div>';
                                                            }
                                                            $cont++;
                                                            $total += $histservi->getPrecio();
                                                        }
                                                        ?>

                                            <div class="row">
                                                <div class="col-xs-12">

                                                     <div class="col-xs-3">
                                                         <div class="h5"><strong>Total: S/ <?= number_format($total, 2)
                                                        ?> </strong> 

                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-xs-3">
                                                        
                                                         <a href="veradjuntohistoria.php?id=<?php echo $historia->getId(); ?>" target="_blank" type="button" class="btn btn-default">Ver adjunto</a>
                                                         
                                                         
                                                     </div>
                                                   
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                                
                                                
                                                                                             
                                            <!--</div>-->
                                    
                                   
                                       
                                            <div class="panel-footer">
                                                <div class="h4">Medicamento Suministrado </div>
                                                
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
       
                                                        <tr>
                                                                <th class='text-center'>Codigo</th>
                                                                <th>Descripción</th>

                                                                <th class='text-right'>Cantidad</th>
                                                                <th class='text-right'>Precio</th>
                                                                <th class='text-right'>Importe</th>
                                                              
                                                        </tr>

                                                    <?php
                                                    $sumador_total = 0;

                                                    $arraydetalle = $detallecontrol->selectid($historia->getId());
                                                    foreach ($arraydetalle as $detalle) {



                                                        $precio_total = $detalle->getCantidad() * $detalle->getPrecio();
                                                        $precio_total_f = number_format($precio_total, 2); //Precio total formateado

                                                        $sumador_total += $precio_total; //Sumadors
                                                        ?>
                                                                        <tr>
                                                                            <td class='text-center'><?php echo $detalle->getCodigo(); ?></td>

                                                                           <td><?php echo $detalle->getDescripproduct(); ?></td>
                                                                            <td class='text-right'><?php echo $detalle->getCantidad(); ?></td>
                                                                            <td class='text-right'><?php echo $detalle->getPrecio(); ?></td>
                                                                            <td class='text-right'><?php echo $precio_total_f; ?></td>
                                                                           
                                                                        </tr>		
                                                                <?php
                                                            }
                                                            ?>
                                               
                                                    <tr>

                                                        <td class='text-right' colspan=4 >Total Medicamento S/ </td>
                                                            <td class='text-right'><?php echo number_format($sumador_total, 2); ?></td>
                                                            
                                                    </tr>
                                                   

                                                    </table>
                                               
                                    
                                            </div>
                                            </div>
                                       
                                    </div>
                                
                                    
                                                        <?php } ?>
                                
                                
                                <!-- ***************************************** -->
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
        <!--</div>-->
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
<!-- <script src=" js/underscore-min.js"></script>-->
</body>
</html>
