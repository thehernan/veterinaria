<?php


require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/mascotacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/mascota.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/baniocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/banio.php");

//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/detallehistoriacontrolller.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/detallehistorial.php");

$op = 'historia';

$mascotacontrol= new mascotacontroller();

//$historiacontrol= new historialcontroller();
//
//$detallecontrol = new detallehistoriacontrolller();
$baniocontroller = new baniocontroller();

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $mascota = $mascotacontrol->selectid($id);
    $arraybanio = $baniocontroller->selectid($id);
    
    
    
    
    
    
}else {
    
    header('location:lista_mascotas.php');
    
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
<!--                        <div class="panel-heading">
      
                        </div>-->
                            <div class="panel-body" >
                                
                                <!--<button data-toggle="modal" data-target=".bd-example-modal-lg" type="button" class="btn btn-warning "><i class="fa fa-search fa-fw"></i>Buscar Paciente</button>-->
                                
                                <div class=" col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <br>
                                                 <?php echo'<img src="data:image/jpg;base64 , ' .$mascota->getFoto(). '"  width="90%" class="img-circle" alt="Paciente Imagen">' ?>
                                                
                                            </div>

                                            <div class="col-xs-8 ">
                                                <div class="h2">Relación de Baño</div><br>
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
                                                <a  href="nuevo_banio.php?id=<?= $id?>" type="button" class="btn btn-primary "><i class="fa fa-plus fa-fw"></i> Nuevo</a>
                                                
                                                     
                                            </div>
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
                                
                                
                                <!----- atenciones -->
                                <?php 
                                foreach ( $arraybanio as $banio){
                                   
                                ?>
                                
                               <div class=" col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            

                                            <div class="col-xs-12 ">
                                             
                                                <div class="col-xs-4">
                                                    <div class="h5">Fecha: <i class="fa fa-calendar fa-fw"></i> <?=$banio->getFecha(); ?> 
                                                    
                                                </div>
                                                </div>
                                                 <div class="col-xs-4">
                                                    <div class="h5">Atención: <i class="fa fa-user fa-fw"></i> <?= $banio->getDoctor();?>
                                                    
                                                </div>
                                                </div>
                                                 <div class="col-xs-4">
                                                     <?php if($banio->getFacturado()==0){
                                                       echo  '<div class="h5 text-danger">Estado: <i class="fa fa-money fa-fw"></i> Debe </div>';
                                                         
                                                     }else {
                                                         
                                                       echo  '<div class="h5">Estado :<i class="fa fa-money fa-fw"></i> Cancelado </div>';  
                                                     }
                                                     
                                                     
                                                         
                                                         ?>
                                                    
                                                   
                                                </div>
                                               
                                               
                                                
                                                </div>
                                               
                                            </div>
                                      
                                 
                                        <div class="row">
                                            
                                            <div class="col-xs-12">
                                                <div class="col-xs-6">
                                                    <div class="h5">Descripción:  

                                                    </div> <textArea readonly="" class="form-control"><?= ($banio->getDescripcion()) ?></textArea>
                                                </div>
                                               
                                                
                                                
                                                
                                                
                                            </div>
                                            
                                        </div>
                                  
                                        <div class="row">
                                            <div class="col-xs-12">
                                              
                                                 <div class="col-xs-3">
                                                     <div class="h5"><strong>Total: S/ <?= number_format($banio->getPrecio())
                                                            
                                                            
                                                            ?> </strong> 

                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                            
                                            
                                                                                         
                                        <!--</div>-->
                                </div>
                               
                                   
                                     
                                   
                                </div>
                            </div>
                                
                                <?php } ?>
                                
                                <!-- ***************************************** -->
                                    
                                    
                        
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
