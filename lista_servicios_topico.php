
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
   <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css"/>
   
   <link rel="stylesheet" type="text/css" href="css/autocomplete.css"/>
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
		
                 <!-- /. ROW  -->
                   <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div id="resultados_ajaxnu"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Servicios Topicos
                        </div>
                        
                        <div class="panel-body">
                            <div  style="overflow: auto">
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripción</th>
<!--                                            <th>Stock Min.</th>
                                            <th>Stock Max.</th>-->
                                            <th>Precio</th>
<!--                                            <th>Existencia Compra</th>
                                            <th>Unid. Compra</th>
                                            <th>Existencia Venta</th>-->
<!--                                            <th>Unid. Venta</th>
                                            <th>Observación</th>
                                            <th>Abreviatura</th>-->
                                            <th>C.B</th>
                                            <!--<th>I.C.B</th>-->
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
  
                             
                 
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg tamano">
    <div class="modal-content">
    <?php include('modal/modiunidadmedida.php'); ?>
    </div>
  </div>
</div>
 <div class="modal fade bd-agregarstock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php include('modal/modagregarstock.php'); ?>
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
          <script src="js/jquery.js"></script>
    <script src="js/jquery2.min.js"></script>
    
    <script src="js/jquery-ui.js"></script>
      <!-- Bootstrap Js -->
         <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
              $('#dataTables-example').dataTable({
                
                    'language': español,
                  
                     "ajax":{
                "method":"POST",
                "url":"ajax/tabla_servicios_topico.php"
                
                    },
                    "columns":[
                        {data:"item"},
                        {data:"descripcion"},
//                        {data:"stockmin"},
//                        {data:"stockmax"},
                        {data:"precio"},
//                        {data: "stockc"},
//                        {data:"unidmedc"},
//                        {data:"stockv"},
//                        {data:"unimedv"},
//                        {data:"observacion"},
//                        {data:"abreviatura"},
                        {data:"codigo"},
                        {data:"acciones"}
                        ]
                                          
                    
                    }); 
                });
           
    </script>
      <!-- Custom Js -->
    
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
   <script src="js/mijs.js"></script>
   <script src="librerias/alertifyjs/alertify.js"></script> 
   
</body>
</html>
