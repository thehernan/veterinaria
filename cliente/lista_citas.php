<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:::SISVETERINARIA:::</title>
	<!-- Bootstrap Styles-->
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                    <tbody>
                                        <?php 
                                            require_once ("config/db.php");
			                                require_once ("config/conexion.php");
                                        $s=1;
                                        $sql="SELECT * FROM eventos c
inner join mascota m on m.id_cliente=c.id_cliente
inner join cliente cl on cl.id_cliente=m.id_cliente where c.atendido=0 and c.id_cliente='".$_SESSION['idregistro']."';";
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row= mysqli_fetch_row($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><strong><?php echo  $row[2].' - '.$row[6]; ?></strong></td>
                                            <td><?php echo $row[3]; ?></td>
                                            <td><?php echo $row[4]; ?></td>
                                           
                                           
                                            <td class="center"><?php echo $row[9].' - ' .$row[10]; ?></td>
                                            <td class="center"><?php echo $row[23].' - ' .$row[24]; ?></td>
                                            <td>
                                                  <a href="nuevo_historial.php" <button type="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                                      <strong><?php echo $row[7]; ?></strong>
                                            </td>
                                            <td class="center">
                                               
                                                 <a href="modmismacotas.php?cod=<?php echo $row[22]; ?> & nom=<?php echo $row[23].' '.$row[24];?>" <button type="button" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                            </td>
                                           
                                        </tr>
                                    <?php } mysqli_close($conexion); ?>
                                    </tbody>
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
                    'language': español
                });
                
            
           
            });
           
    </script>
      <!-- Custom Js -->
        <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
     <script src="js/mijs.js"></script> 
       <script src="js/VentanaCentrada.js"></script>
</body>
</html>
