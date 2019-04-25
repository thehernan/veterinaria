<?php
require_once ("config/db.php");
require_once ("config/conexion.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/mascotacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/mascota.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");

$op = 'historia';
$mascotacontrol= new mascotacontroller();

$productocontrol = new productocontroller();
$producto = new producto();

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
    $idc = $_GET['idc'];
    $mascota = $mascotacontrol->selectid($id);
    
    
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
       
       <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css" >



</head>
<body>
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
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <br>
                                                 <?php echo'<img src="data:image/jpg;base64 , ' .$mascota->getFoto(). '"  width="90%" class="img-circle" alt="Paciente Imagen">' ?>
                                                
                                            </div>

                                            <div class="col-xs-8 ">
                                                <div class="h2">N° de ficha: <?=$id; ?></div><br>
                                                <div>Datos del paciente:</div>
                                                <div class="h2"><?= $mascota->getNombre(); ?></div>
                                                <div class="h4">Raza: <?= $mascota->getRaza(); ?></div>
                                                <div class="h4">Pelaje: <?= $mascota->getPelaje(); ?></div>
                                                <div class="h4">F. Nac.: <?php echo  $mascota->getFnac(); ?></div>
                                            </div>
                                            
                                        </div>
                                </div>
                               
                                   
                                        <div class="panel-footer">
                                            <div class="row">
                                            <div class="col-md-2">
                                                <!--<button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar producto</button>-->
                                                <a href="ficha_paciente.php?id=<?= $id ?>&idc=<?= $idc ?>" name="btnbuscar" type="button" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i> Atras</a>   
                                            </div>
                                            <div class="col-md-2">
                                                <button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar producto</button>
                                                
                                                     
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
                                <div class=" col-md-12">
                                    <form  method="post" name="guardahistorial" id="guardahistorial" enctype="multipart/form-data">


                                     <div class="row">
                                         <input type="hidden" id="txtid" name="txtid" value="<?=$id?>">
                                        <!--<div class="col-lg-9">-->
<!--                                        <div class="form-group">
                                            <label>Paciente</label>
                                            
                                            <input type="text" name="txtmasc" id="txtmasc" readonly required class="form-control">

                                        </div>-->
                                        <!-- modal mascota -->
<!--                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg tamano">
                                                <div class="modal-content">

                                                        inicio de tabla 
                                                 <?php // include ('modal/moduscarmascota.php');?>

                                                        fin 

                                        </div>
                                        </div>
                                        </div>--> 
                                        <!--</div>-->
                                        <!-- modal producto -->
                                      



                                       
                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Fecha</label>

                                            <input type="datetime-local" name="txtf" id="txtf"  class="form-control" required>

                                        </div>

<!--                                        <div class='input-group date' id='txtf'>
                                        <input type='text' id="txtf" name="txtf" class="form-control" readonly />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </div>-->
                                        </div>
                                        <div class="col-lg-9">
                                            
                                            <div class="form-group">
                                            <label>Doctor: </label>
                                            <select class="form-control" id="txtiddoctor" name="txtiddoctor" required>
                                                <option value="">Selecciona</option>
                                                <?php

                                                $sql="SELECT * FROM doctor";
                                                echo $sql;
                                                $resultarea=mysqli_query($conexion,$sql);

                                                while ($area=mysqli_fetch_row($resultarea)):
                                                        ?>
                                                        <option value="<?php echo $area[0] ?>"><?php echo $area[1].' '.$area[2]  ?></option>
                                                <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                     <div class="col-lg-9">

<!--                                         <div class="form-group">
                                            <label>Registro</label>
                                            <input type="text" name="txtr" id="txtr" placeholder="Registro" required class="form-control">
                                        </div>-->

<!--                                        <div class="form-group">
                                            <label>Medicamento</label>
                                            <input type="text" name="txtm" id="txtm" placeholder="Medicamento" required class="form-control">
                                        </div>-->
<!--                                        <div class="form-group">
                                            <label>Doctor</label>
                                            <input type="text" name="txtat" id="txtat" required class="form-control  input-sm">

                                        </div>    -->
                                    

                                     </div>
                                     </div>



                                     <div class="row">
                                     <div class="col-lg-1">
                                              <div class="form-group">
                                            <label>F.C</label>
                                            <input type="text" name="txtfc" id="txtfc" class="form-control  input-sm">

                                        </div>
                                     </div>
                                         <div class="col-lg-1">
                                              <div class="form-group">
                                            <label> F.R</label>
                                            <input type="text" name="txtfr" id="txtfr"  class="form-control  input-sm">

                                        </div>
                                         </div>
                                         <div class="col-lg-1">
                                              <div class="form-group">
                                            <label>P</label>
                                            <input type="text" name="txtp" id="txtp" class="form-control  input-sm">

                                        </div>
                                         </div>
                                         <div class="col-lg-1">
                                              <div class="form-group">
                                            <label>P.A.M</label>
                                            <input type="text" name="txtpam" id="txtpam" class="form-control  input-sm">

                                        </div>
                                         </div>
                                         <div class="col-lg-1">
                                              <div class="form-group">
                                            <label>P.S</label>
                                            <input type="text" name="txtps" id="txtps" class="form-control  input-sm">

                                        </div>
                                         </div>
                                         <div class="col-lg-1">
                                              <div class="form-group">
                                            <label>P.D</label>
                                            <input type="text" name="txtpd" id="txtpd" class="form-control  input-sm">

                                        </div>
                                         </div>
                                         
                                           <div class="col-lg-1">
                                               <div class="form-group">
                                            <label>D %</label>
                                            <input type="text" name="txtd" id="txtd" class="form-control  input-sm">

                                        </div>
                                       </div>
                                         <div class="col-lg-1">
                                               <div class="form-group">
                                            <label>C.P.P</label>
                                            <input type="text" name="txtcpp" id="txtcpp" class="form-control  input-sm">

                                        </div>
                                         </div>
                                         
                                         <div class="col-lg-1">
                                            <div class="form-group">
                                            <label>Temperatura</label>
                                            <input type="text" name="txttemp" id="txttemp" class="form-control  input-sm">

                                        </div>
                                         </div>
                                      </div>
                                     <!--<div class="row">-->
                                     
                                    <!--</div>-->
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Descripción:</label>
                                                <textArea class="form-control" name="textdescrip" id="textdescrip"></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Diagnostico:</label>
                                                <textArea class="form-control" name="textdiagnostico" id="textdiagnostico"></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Tratamiento:</label>
                                                <textArea class="form-control" name="texttratamiento" id="texttratamiento"></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Observación:</label>
                                                <textArea class="form-control" name="textobservacion" id="textobservacion"></textArea>
                                            </div>
                                            
                                            
                                        </div>
                                            
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-3">
                                            
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio1" name="servicio1">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?php echo $producto->getId() ?>"><?php echo $producto->getDescripcion();?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>

                                                
                                                
                                                
                                                
                                                <!--<label>Consulta: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio1" id="textservicio1" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio2" name="servicio2">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Tratamiento: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio2" id="textservicio2" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio3" name="servicio3">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Analisis: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio3"  id="textservicio3" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio4" name="servicio4">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Vacuna: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio4" id="textservicio4" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio5" name="servicio5">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Servicios: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio5" id="textservicio5" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio6" name="servicio6">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Cirujia: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio6" id="textservicio6" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select class="selectpicker" data-live-search="true" id="servicio7" name="servicio7">
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php foreach ($productocontrol->listartopicosserv('topicos-servicios') as $producto) {?>
                                                    <option value="<?= $producto->getId() ?>"><?= $producto->getDescripcion()?></option>
                                          
                                                    
                                                    <?php } ?>
                                                  </select>
                                                <!--<label>Internado: S/</label>-->
                                                <input type="text" class="form-control" name="textservicio7" id="textservicio7" value="0" onkeyup="Calculartotalficha();">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Total a pagar: S/</label>
                                                <input type="text" class="form-control" name="texttotal" id="texttotal" readonly="">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Adjuntar Análisis:</label>
                                                <input type="file" class="form-control" name="fileanalisis" id="fileanalisis" accept="image/*">  <!-- application/pdf -->
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                   <div class="row">
                                    <div class="col-lg-6">

                                        <button type="submit" name="btngrabar" id="btngrabar"  class="btn btn-primary "> <i class="fa fa-save fa-fw"></i> Guardar</button>
                                     </div>
                                     </div>
                                    <hr>


                                 </form>
                                </div>

                                    <hr>
                              <!-- ************* modal ****************-->
                              <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg tamano">
                                                    <div class="modal-content">
                                                    <?php include ('modal/modbuscarproductosaficha.php'); ?>
                                                </div>
                                                </div>
                            </div>
                              <!-- *************************************-->
                         
                                <div class="col-lg-12">
                                    <label>Medicamento a suministrar </label>
                                <div class="table-responsive">
                                   <div id="tabla">
                                       <?php include './ajax/detalle_documento.php'; ?>

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
