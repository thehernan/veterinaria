<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");

$productocontrol = new productocontroller();
$producto = new producto();
$s=1;

////////// extraigo la fecha actual y le resto 30 dias para comparar con las fechas de expiracion ////////
$fecha = date('Y-m-j');

$nfecha = strtotime ('+1 month',strtotime ($fecha));
$nfecha = date ('Y-m-j',$nfecha);
$color = "";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:::SISTENA VETERINARIA:::</title>
	<!-- Bootstrap Styles-->
         <link rel="icon" sizes="192x192" href="img/dog-vector.png"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Productos por Lote
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Codigo</th>
                                            <th>Descripción</th>
                                            <th>PrecioV</th>
                                            <th>PrecioC</th>
                                            <th>Existencia Compra</th>
                                            <th>Unid. Compra</th>
                                            <th>Existencia Venta</th>
                                            <th>Unid. Venta</th>
                                            <th>Fecha Fab.</th>
                                            <th>Fecha Exp.</th>
                                            <th>Lote</th>
                                            <th>R.S</th>
                                            <th>Observación</th>
                                           
                                            <!--<th>I.C.B</th>-->
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                
                                           foreach($productocontrol->listarporlote() as $producto){            
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td class="center"><?php  echo $producto->getCodigo(); ?></td>
                                            <td><?php echo $producto->getdescripcion(); ?></td>
                                            <td><?php echo $producto->getPrecio(); ?></td>
                                            <td><?php echo $producto->getPrecioc(); ?></td>
                                           <?php 
                                             $stock=$producto->getstock();
                                             $stockmin=$producto->getStockmin();
                                                if($stock<=$stockmin){
                                                   
                                                    echo '<td class="center" bgcolor="#F7C5C4">'.$stock=$producto->getstock().'</td>';
                                                } else {
                                                    echo '<td class="center">'.$stock=$producto->getstock().'</td>';
                                                }
                                            ?>
                                            <td class="center"><?php echo $producto->getUnidmedc() ?></td>
                                            <td class="center"><?php echo $producto->getStock()*$producto->getFactor() ?></td>
                                            <td class="center"><?php echo $producto->getUnidmedv() ?></td>
                                            <td class="center"><?php echo $producto->getFechafab() ?></td>
                                          
                                            <?php if($producto->getFecha_exp() <=  $fecha){
                                               
                                               $color='#F8C1BA';
                                            } else   
                                            if ($producto->getFecha_exp() <=  $nfecha){
                                                
                                                 $color='#FAEBA6';
                                                
                                            }else {
                                            $color='#FFFFFF';} ?>
                                                
                                            <td class="center" bgcolor="<?php echo $color ?>"><?php echo $producto->getFecha_exp() ?></td>
                                            <td class="center"><?php echo $producto->getNlote() ?></td>
                                            <td class="center"><?php echo $producto->getRs() ?></td>
                                            <td class="center"><?php echo $producto->getObservacion() ?></td>
                           
                                        </tr>
                                    <?php }  ?>
                                    </tbody>
                                </table>
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
              $('#dataTables-example').dataTable({
                    'language': español,
                    'responsive': true
                });
            });
    </script>
      <!-- Custom Js -->
    
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
    <script src="js/mijs.js"></script> 
   
</body>
</html>
