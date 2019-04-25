<?php
require_once ("config/db.php");
require_once ("config/conexion.php");

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/mascotacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/mascota.php");


$op = 'banio';
$mascotacontrol= new mascotacontroller();

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
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
   <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="css/upload.css" rel="stylesheet"/>
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
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <br>
                                                 <?php echo'<img src="data:image/jpg;base64 , ' .$mascota->getFoto(). '"  width="90%" class="img-circle" alt="Paciente Imagen">' ?>
                                                
                                            </div>

                                            <div class="col-xs-8 ">
                                                <div class="h2">Nuevo Baño</div><br>
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
                                                <a href="banio_paciente.php?id=<?= $id ?>" name="btnatras" type="button" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i> Atras</a>   
                                            </div>
                                            <div class="col-md-2">
                                                <button data-toggle="modal" data-target=".bd-example-modal-lg2" type="button" class="btn btn-primary "><i class="fa fa-search fa-fw"></i>Buscar servicio</button>
                                                
                                                     
                                            </div>
                                                 
                                            </div>
                                
                                        </div>
                                   
                                </div>
                            </div>
                                <div class=" col-md-12">
                                 <form  method="post" name="guardabanio" id="guardabanio">


                                     <div class="row">
                                         <input type="hidden" id="txtid" name="txtid" value="<?=$id?>">

                                        <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Fecha</label>

                                            <input type="datetime-local" name="txtf" id="txtf"  class="form-control" required="required" />

                                        </div>
                                        </div>
                                        <div class="col-lg-9">
                                            
                                            <div class="form-group">
                                            <label>Atención: </label>
                                            <select class="form-control" id="txtiddoctor" name="txtiddoctor" required="required" >
                                                <!--<option value="">Selecciona</option>-->
                                                <?php

                                                $sql="SELECT * FROM doctor where iddoctor='".$_SESSION['user_id']."' ";
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
                                   
                                     <!--<div class="row">-->
                                     
                                    <!--</div>-->
                                    <div class="row">
                                        <input type="hidden" id="txtidprod" name="txtidprod">
                                        
                                         <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Codigo: </label>
                                                <input type="text" class="form-control" name="textcodigo" id="textcodigo" readonly="readonly" />
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Descripción:</label>
                                                <input class="form-control" name="textdescrip" readonly="readonly" id="textdescrip" />
                                            </div>
                                            
                                            
                                        </div>
                                           <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Total a pagar: S/</label>
                                                <input type="text" class="form-control" name="texttotal" id="texttotal" readonly="readonly" />
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <!--</div>-->
                                    
                                   <div class="row">
                                       <div class="col-lg-12">
                                        <div class="col-lg-6">

                                        <button type="submit" name="btngrabar" id="btngrabar"  class="btn btn-primary "> <i class="fa fa-save fa-fw"></i> Guardar</button>
                                        </div>
                                       </div>
                                     </div>
                                  

                                 </form>
                                </div>

                                  
                              <!-- ************* modal ****************-->
                              <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg tamano">
                                                    <div class="modal-content">
                                                    <?php include ('modal/modbuscarserviciobanio.php'); ?>
                                                </div>
                                                </div>
                            </div>
                              <!-- *************************************-->
                         
                             

                           
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
       <script src="js/jquery.blockUI.js"></script>
</body>
</html>
