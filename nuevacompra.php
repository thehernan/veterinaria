<?php
$op = 'compra';
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
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css"/>

        <link rel="stylesheet" type="text/css" href="css/autocomplete.css" />
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
                                    Nueva Compra


                                </div>


                                <div class="panel-body">
                                   <!--<button type="button" class="btn btn-info recarg"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>Nueva Venta</button>-->
                                    <button class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Buscar Proveedor
                                    </button>
                                    <!--                               <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg3">
                                                                         <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Buscar Doctor
                                                                     </button>-->
                                    <button class="btn btn-primary" id="show">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        Buscar Producto
                                    </button>
                                    <hr>
                                    <!--                                    <BR>
                                                                            <hr>
                                                                                <h2 class="text-danger"><label id="lblcomprobante"></label></h2>-->



                                    <!--                               <button class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg4">
                                                                            <i class="fa fa-bar-chart-o" aria-hidden="true"></i>
                                                                           Ficha Clinica
                                                                       </button>-->

                               <!--<span class="btn btn-danger" id="btnVaciarVentas"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Vaciar Carrito</span>-->
                                    <form id="guardarcompra" name="guardarcompra" >
                                        <div class="col-lg-12">
                                            <input type="hidden" id="txtcomprobante" name="txtcomprobante"  class="form-control">
                                                <!--<div class="row">-->
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <div class="form-group form-float">
                                                        <label>Tipo Comprobante (*)</label>
                                                        <select  class="form-control show-tick" id="cbtipocomprobante" name="cbtipocomprobante" required="">
                                                            <option value="">- Tipo comprobante -</option>
                                                            <?php
                                                            $pred = array('Factura', 'Guia de remisión');
                                                            $value = array('Factura', 'Guia_remision');

                                                            for ($i = 0; $i < count($pred); $i++) {

                                                                echo '<option value="' . $value[$i] . '" >' . $pred[$i] . '</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Serie (*) </label>

                                                        <input type="text" name="txtserie" id="txtserie" required class="form-control input-sm ">
                                                    </div>


                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Numero (*) </label>

                                                        <input type="text" name="txtnumero" id="txtnumero" required class="form-control input-sm ">
                                                    </div>


                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Fecha (*)</label>

                                                        <input type="date" name="txtfechac" id="txtfechac" required  class="form-control input-sm ">
                                                    </div>


                                                </div>

                                        </div>

                                        

                                        <label class="text-danger">Datos proveedor </label>
                                        <div id="resultados_ajaxnu"></div>

                                        <input type="hidden" id="op" name="op" value="<?= $op ?>">
                                            <!--<input type="hidden" id="area" name="area" value="5">-->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" id="txtcomprobante" name="txtcomprobante"  class="form-control">
                                                        <!--<div class="row">-->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Nombre / Razón Social (*)</label>
                                                                <input type="hidden"    id="txtid" name="txtid"  class="form-control">
                                                                    <input type="text" name="txtclien" id="txtclien" readonly="" required class="form-control input-sm ">
                                                                        </div>


                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Dirección </label>

                                                                                <input type="text" name="txtdireccion" id="txtdireccion" readonly   class="form-control input-sm ">
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

                                                                                <div class="col-lg-4">
                                                                                    <div class="form-group">
                                                                                        <label>N° de Documento </label>
                                                                                        <input type="hidden" name="txttipodoc" id="txttipodoc" >
                                                                                            <input type="text" name="txtrucdni" id="txtrucdni" readonly   class="form-control input-sm ">
                                                                                                </div>

                                                                                                </div>

                                                                                                <div class="col-lg-8">
                                                                                                    <div class="form-group">
                                                                                                        <label>Email </label>

                                                                                                        <input type="text" name="txtemail" id="txtemail" readonly   class="form-control input-sm ">
                                                                                                    </div>

                                                                                                </div>


                                                                                                </div>



                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <hr>
                                                                                                            <button type="submit"  class="btn btn-primary ">Guardar Compra</button>
                                                                                                            <hr>
                                                                                                                </div>
                                                                                                                </div>

                                                                                                                </form>     
                                                                                                                <!-- modal -->
                                                                                                                <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog modal-lg tamano">
                                                                                                                        <div class="modal-content">

<?php
include ('modal/modbuscarproductosaventas.php');
?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                                                    <div class="modal-dialog modal-lg tamano">
                                                                                                                        <div class="modal-content">
<?php include ('modal/modalbuscarproveedorcompra.php'); ?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row">
                                                                                                                    <div class="col-lg-12">
                                                                                                                        <div class="table-responsive">
                                                                                                                            <div id="tabla">
<?php include './ajax/detalle_documento.php'; ?>


                                                                                                                            </div>
                                                                                                                        </div>


                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <!------------------ dialog ------------------------>
                                                                                                                <div>
                                                                                                                    <dialog id="myFirstDialog" style="width:80%;background-color:#fff;">
                                                                                                                        <label class="text-danger h4" >Busqueda de producto</label>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-lg-12">
                                                                                                                                <div class="form-group">

                                                                                                                                    <label class="text-danger">Descripción</label>
                                                                                                                                    <input type="text" class="form-control" id="textprod" name="textprod"/>
                                                                                                                                </div>
                                                                                                                                <input type="hidden" class="form-control" id="textdescripcion" name="textdescripcion"/>
                                                                                                                                <input type="hidden" id="idprod" name="idprod">
                                                                                                                                    <input type="hidden" id="textcod" name="textcod">
                                                                                                                                        <input type="hidden" id="textlote" name="textlote">

                                                                                                                                            </div>

                                                                                                                                            <div class="col-lg-6">

                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="text-danger" id="txtunidc">Cantidad X</label>
                                                                                                                                                    <input type="text" class="form-control" id="textcant" name="textcant"/>
                                                                                                                                                </div>    




                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label class="text-danger">Precio</label>
                                                                                                                                                    <input type="text" class="form-control" id="textprecio" name="textprecio"/>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label id="lblfechaf" class="text-danger">Fecha de Fabricación</label>
                                                                                                                                                    <input type="date" name="txtfecha" id="txtfecha" required class="form-control">
                                                                                                                                                </div>



                                                                                                                                            </div>
                                                                                                                                            <div class="col-lg-6">
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label id="lblfechaexp" class="text-danger">Fecha de Expiración</label>
                                                                                                                                                    <input type="date" name="txtfechaexp" id="txtfechaexp" required class="form-control">
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label id="lbllote" class="text-danger">Lote No.</label>
                                                                                                                                                    <input type="text" name="txtnlote" id="txtnlote" placeholder="Lote No." required class="form-control">
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group">
                                                                                                                                                    <label id="lblrs" class="text-danger">R.S. No.</label>
                                                                                                                                                    <input type="text" name="txtrs" id="txtrs" placeholder="R.S" required class="form-control">
                                                                                                                                                </div>


                                                                                                                                            </div>

                                                                                                                                            </div>

                                                                                                                                            <hr> <button id="hide" class="btn btn-danger">Cerrar</button>

                                                                                                                                                <button class="btn btn-outline btn-success right"  id="agregarprodc" name="agregarprodc" >Aceptar</button>


                                                                                                                                                </dialog>
                                                                                                                                                <!-- "Show" button -->
                                                                                                                                                <!--<button id="show">Show Dialog</button>-->
                                                                                                                                                </div>
                                                                                                                                                <!--         fin dialog ------------------>


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
                                                                                                                                                <script src="js/jquery.js"></script>
                                                                                                                                                <script src="js/jquery2.min.js"></script>

                                                                                                                                                <script src="js/jquery-ui.js"></script>

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

                                                                                                                                        //                $('.recarg').click(function(){
                                                                                                                                        //                    location.reload(true);
                                                                                                                                        //                } );

                                                                                                                                        //                $('#btngrabar').click(function(){
                                                                                                                                        //                      if ($("#txttot").val()=="" ) {
                                                                                                                                        //                    alertify.error("Falta que Agrege Productos al Carrito.!");
                                                                                                                                        //                    return;
                                                                                                                                        //                        }
                                                                                                                                        //                     if ($("#txtid").val()=="" ) {
                                                                                                                                        //                    alertify.error("Primero Seleccione el cliente y luego llenar el Carrito de Compras.!");
                                                                                                                                        //                    return;
                                                                                                                                        //                        }
                                                                                                                                        //
                                                                                                                                        //
                                                                                                                                        //		   if ($("#tipomovi").val()=="" ) {
                                                                                                                                        //                    alertify.error("Falta que Seleccione el tipo Movimiento.!");
                                                                                                                                        //                    return;
                                                                                                                                        //                        }
                                                                                                                                        //                    if ($("#area").val()=="" ) {
                                                                                                                                        //                    alertify.error("Falta que Seleccione el Area.!");
                                                                                                                                        //                    return;
                                                                                                                                        //                        }
                                                                                                                                        //	});
                                                                                                                                                    });

                                                                                                                                                </script>
                                                                                                                                                <!-- Custom Js -->
                                                                                                                                                <script src="assets/js/custom-scripts.js"></script>
                                                                                                                                                <script  type="text/javascript" src="js/push.min.js"></script>
                                                                                                                                                <script src="js/mijs.js"></script>
                                                                                                                                                <script src="librerias/alertifyjs/alertify.js"></script>
                                                                                                                                                <script src="js/VentanaCentrada.js"></script>
                                                                                                                                                <script src="js/jquery.blockUI.js"></script>

                                                                                                                                                </body>
                                                                                                                                                </html>
