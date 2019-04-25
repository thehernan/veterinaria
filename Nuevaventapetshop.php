<?php
    $op ='ventapetshop';

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
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Venta PetShop


                        </div>


                            <div class="panel-body">
                               <!--<button type="button" class="btn btn-info recarg"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>Nueva Venta</button>-->
                               <button class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">
                                             <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Buscar Cliente
                                 </button>
<!--                               <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg3">
                                     <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Buscar Doctor
                                 </button>-->
                                <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg2">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                       Buscar Productos
                                   </button>
                                   <BR>
                                        <hr>
                                            <h2 class="text-danger"><label id="lblcomprobante"></label></h2>
<!--                               <button class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg4">
                                        <i class="fa fa-bar-chart-o" aria-hidden="true"></i>
                                       Ficha Clinica
                                   </button>-->

                               <!--<span class="btn btn-danger" id="btnVaciarVentas"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Vaciar Carrito</span>-->
                               <hr>
                                   
                                    <label class="text-danger">Datos cliente </label>
                                 <form id="guardarventas" name="guardarventas" method="post">
                                    <div id="resultados_ajaxnu"></div>
                                    <input type="hidden" id="idhistorial" name="idhistorial">
                                           <input type="hidden" id="op" name="op" value="<?= $op?>">
                                            <input type="hidden" id="area" name="area" value="4">
                             <div class="row">
                                          <div class="col-lg-12">
                                              <input type="hidden" id="txtcomprobante" name="txtcomprobante"  class="form-control">
                                              <!--<div class="row">-->
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                     <label>Nombre / Razón Social </label>
                                                     <input type="hidden"    id="txtid" name="txtid"  class="form-control">
                                                     <input type="text" name="txtclien" id="txtclien" readonly  required class="form-control input-sm ">
                                                     </div>


                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                     <label>Dirección </label>
                                                     
                                                     <input type="text" name="txtdireccion" id="txtdireccion" readonly  required class="form-control input-sm ">
                                                     </div>


                                                  </div>

<!--                                                    <div class="col-lg-6">
                                            <label>Doctor</label>
                                                <input type="hidden" id="txtiddoc" name="txtiddoc"  class="form-control">
                                                <input type="text" name="txtdoctor" id="txtdoctor" readonly  required class="form-control input-sm ">
                                                <br>

                                         </div>-->
                                        <!--</div>-->
                                        </div>
                                         
                                     </div>
                                         <div class="row">
                                            <div class="col-lg-12">
                                                <!--<div class="row">-->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                     <label>N° de Documento</label>
                                                     <input type="hidden" name="txttipodoc" id="txttipodoc" >
                                                     <input type="text" name="txtrucdni" id="txtrucdni" readonly  required class="form-control input-sm ">
                                                     </div>
                                                    
                                                </div>
                                                    
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                     <label>Email </label>
                                                     
                                                     <input type="text" name="txtemail" id="txtemail" readonly  required class="form-control input-sm ">
                                                     </div>
                                                    
                                                </div>
                                                
                                                </div>
                                            <!--</div>-->
                                            
                                            
                                            
                                        </div>
                                       <div class="row">
                                           <div class="col-lg-12">
                                              <hr>
                                              <input type="submit" name="btngrabar" id="btngrabar" value="Guardar Venta" class="btn btn-primary ">
                                              <hr>
                                          </div>
                                      </div>
                                </form>

                        <!-- modal -->
                        <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-lg tamano">
                                 <div class="modal-content">

                                 <?php

                                 include ('modal/modbuscarproductosaventaspetshop.php');
                                 ?>
                             </div>
                             </div>
                     </div>
                        
                        
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                       <div class="modal-dialog modal-lg tamano">
                               <div class="modal-content">
                               <?php include ('modal/modalbuscarclienteparaventas.php'); ?>
                           </div>
                            </div>
                           </div>
<!--                        <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg tamano">
                                <div class="modal-content">

                                <?php // include ('modal/modalbuscardoctor.php'); ?>
                            </div>
                         </div>
                        </div>-->



<!--                        <div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg tamano">
                                    <div class="modal-content">
                                    <?php // include ('modal/modalbuscarficha.php'); ?>
                                </div>
                                </div>
                        </div>-->

                        <!--------------- fin modal -->

<!--                        <div class="row">
                     <div class="col-lg-3">
                           <div class="form-group">
                                        <label>Tipo Movimiento</label>
                                        <select class="form-control input-sm" id="tipomovi" name="tipomovi" required>
                            <option value="">Selecciona</option>
                            <?php

//                            $sql="SELECT * FROM movimiento";
//                            echo $sql;
//                            $result=mysqli_query($conexion,$sql);
//
//                            while ($producto=mysqli_fetch_row($result)):
                                    ?>
                                    <option value="<?php // echo $producto[0] ?>"><?php // echo $producto[1] ?></option>
                            <?php // endwhile; ?>
                            </select>
                                        </div>
                      </div>

                 <div class="col-lg-3">
                       <div class="form-group">
                            <label>Area</label>
                    <select class="form-control input-sm" id="area" name="area" required>
                        <option value="">Selecciona</option>
                        <?php

//                        $sql="SELECT * FROM area";
//                        echo $sql;
//                        $resultarea=mysqli_query($conexion,$sql);
//
//                        while ($area=mysqli_fetch_row($resultarea)):
                                ?>
                                <option value="<?php // echo $area[0] ?>"><?php // echo $area[1] ?></option>
                        <?php // endwhile; ?>
                        </select>
                        </div>
                  </div>-->
<!--               <div class="col-lg-3">
                   <div class="form-group">
                        <label>Tipo Comprobante</label>

                           <div class="form-group">
                              <label class="radio-inline">
                                  <input type="radio" id="boleta" name="optradio"  value="1">Boleta </label>
                                <label class="radio-inline">
                                     <input type="radio" id="fac" name="optradio" value="2">Factura
                                </label>


                              <div id="factura">
                                   <ul>

                                   </ul>
                                </div>

                                </div>


                                </div>
                                </div>-->

                         <!--</div>-->
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                    <div id="tabla">
                                        <?php

                                        include './ajax/detalle_documento.php'; ?>


                                    </div>
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

        <script>
            $(document).ready(function () {
                //$('#dataTables-example').dataTable({
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
