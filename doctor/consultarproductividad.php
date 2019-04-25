<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:::SISTEMA VETERINARIA:::</title>
     <link rel="icon" sizes="192x192" href="img/dog-vector.png"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    
    <link rel="stylesheet" href="css/calendar.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src=" js/es-ES.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src=" js/moment.js"></script>
    
   
    <script src=" js/bootstrap-datetimepicker.js"></script>
  
    
    <link rel="stylesheet" href=" css/bootstrap-datetimepicker.min.css" />
    
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
</head>
<style>
    .tamano{
            width: 90% !important;
        }
</style>
<body>
<div id="wrapper">
    <?php include('nav.php'); ?>
    <!--/. NAV TOP  -->
    <?php include('menu.php'); ?>


    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="h3"><i class="fa fa-money"></i> Consultar Productividad</div>
                        </div>
                        <div class="panel-body">
                           
                            <form id="formconsultaproductividad">
                               
                                    <div class="row">
                                    <div class="col-lg-6">
                                        
                                    <div class="form-group">
                                    <label for="from">Desde: </label>
                                    <input class="form-control" id="from" name="from" type="date" required >
                                    </div>
                                              
                                    </div>
                                        
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                        <label for="to">Hasta: </label>
                                        <input class="form-control" id="to" name="to" type="date" required >
                                        </div>
                                        
                                    

                                        
                                    </div> 
        
                               
                                    </div>
                               
                                    <div class="row">
                                    <div class="col-lg-6">
                                         
              
                                        <div class="form-group">
                                        <label>Doctor: </label>
                                        <select class="form-control" id="doctor" name="doctor" required>
                                         
                                            <?php

                                            $sql="SELECT * FROM doctor where iddoctor='".$_SESSION['user_id']."';";
                                            echo $sql;
                                            $resultarea=mysqli_query($conexion,$sql);

                                            while ($area=mysqli_fetch_row($resultarea)):
                                                    ?>
                                                    <option value="<?php echo $area[0] ?>"><?php echo $area[1].' '.$area[2]  ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>


                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                   
                                        </div>
                                    </div>
                                     </form>
                            <hr>
                            <div class="col-lg-12">
                                
                                <div id="tabla"></div>
                            </div>
                            
                                    
                          
                                
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>

</div>
</div>

</body>

<script src=" js/underscore-min.js"></script>


<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script src="librerias/alertifyjs/alertify.js"></script>
 <script src="assets/js/custom-scripts.js"></script>
 <script  type="text/javascript" src="js/push.min.js"></script>
<script src="js/mijs.js"></script>
<script src="js/VentanaCentrada.js"></script>
<script>
    $(document).ready(function () {
        
              $('.datatable').dataTable({
                    'language': español,
                    'responsive': true
                });
            });

</script>



</html>
<?php



// Definimos nuestra zona horaria
date_default_timezone_set("America/Santiago");

// incluimos el archivo de funciones
include 'funcionescalendar.php';

require_once ("config/db.php");
require_once ("config/conexion.php");

// Verificamos si se ha enviado el campo con name from


 ?>
