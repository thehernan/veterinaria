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
    <div id="wrapper">
 <?php include('nav.php'); ?>  
        <!--/. NAV TOP  -->
          <?php include('menu.php'); ?> 
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper" >
            <div id="page-inner">
			
                 <!-- /. ROW  -->
                   <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div id="resultados_ajaxnu"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de administradores
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
                                            <th>DNI</th>
                                            <th>Domicilio</th>
                                            <th>Telefonos</th>
                                            
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  <?php include('modal/modmodiadmin.php'); ?>
                  </div>
                </div>
          </div>
             
                 <?php 
                    include './modal/modalcambiarclave_admin.php';
                 ?>
          
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
    <script src="librerias/alertifyjs/alertify.js"></script>    
        <script>
            $(document).ready(function () {
              $('#dataTables-example').dataTable({
                    'language': español,
                     "ajax":{
                "method":"POST",
                "url":"ajax/tabla_admin.php"
                
                    },
                    "columns":[
                        {data:"item"},
                        {data:"apellidos"},
                        {data:"nombre"},
                        {data:"dni"},
                        {data:"direccion"},
                        {data: "telefono"},
                        {data:"acciones"}
                       
                        ]
                });
            });
    </script>
      <!-- Custom Js -->
    
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
    <script src="js/mijs.js"></script> 
   
</body>
</html>
