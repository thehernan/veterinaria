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
                  
                   <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Citas por atender
                        </div>
                        <div class="panel-body">
                             <div id="resultados_usu"></div>
                             <div class="table-responsive" id="resul">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>nota</th>
                                            <th>asunto</th>                               
                                            <th>Mascota</th>
                                             <th>Dueño</th>
                                            <th>Atender</th>
                                            <th>Mis Mascotas</th>
                                         
                                        </tr>
                                    </thead>
                                   
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
                    'language': español,
                     "ajax":{
                    "method":"POST",
                    "url":"ajax/tabla_cita.php",

                        },
                        "columns":[
                            {"data":"item"},
                            {"data":"fecha"},
                            {"data":"nota"},
                            {"data":"asunto"},
                            {"data":"mascota"},
                            {"data":"dueno"},
                            {"data":"atender"},
                            {"data":"acciones"}

                        ],
                        "ordering": false
                    });
                
            
           
            });
           
    </script>
      <!-- Custom Js -->
        <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
     <script src="js/mijs.js"></script> 
       <script src="js/VentanaCentrada.js"></script>
</body>
</html>
