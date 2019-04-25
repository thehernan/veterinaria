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
    <script src=" js/bootstrap-datetimepicker.es.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
</head>

<body>
<div id="wrapper">
    <?php include('nav.php'); ?>
    <!--/. NAV TOP  -->
    <?php include('menu.php'); ?>


    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="h3"><i class="fa fa-shopping-cart"></i> Consultar Inventario</div>
                        </div>
                        <div class="panel-body">
                           
                            <form method="POST" action="createExcel.php">
                               
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
                                            
                                        
<!--                                        <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control input-sm" id="area" name="area" required>
                                            <option value="">Selecciona</option>
                                            <?php

//                                            $sql="SELECT * FROM area";
//                                            echo $sql;
//                                            $resultarea=mysqli_query($conexion,$sql);
//
//                                            while ($area=mysqli_fetch_row($resultarea)):
                                                    ?>
                                                    <option value="<?php // echo $area[0] ?>"><?php // echo $area[1] ?></option>
                                            <?php // endwhile; ?>
                                            </select>
                                        </div>-->


                                                <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Generar Excel</button>
                                   
                                        </div>
                                    </div>
                                     </form>
                     
                            
                                    
                          
                                
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>

</div>
</div>

</body>

<script src="js/underscore-min.js"></script>


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
              $('#dataTables-example').dataTable({
                    'language': español,
                    'responsive': true
                });
            });

</script>



</html>

