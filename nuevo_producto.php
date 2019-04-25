<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/unidadmedidacontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/unidadmedida.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/unidmedfiscontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/categorias.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/unid_med_fis.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/categorias.php");
/*  $sql="CALL codproductos()";
$eje=mysqli_query($conexion,$sql);
$fi=mysqli_fetch_assoc($eje);*/
$productocontrol = new productocontroller();
$producto = new producto();

$unidadmedidacontroller = new unimeditocontroller();
$unidadmedida = new unidadmedida();

/////////////controlador de unid med fis///////////////////
$unidmedfiscontrol = new unidmedfiscontroller();
$unidmedfis = new unid_med_fis();
///////////////////////////////////////////////////////////
$categoria = new categorias();
$cate = new categoria();
?>

<!DOCTYPE html>
<html>
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
    <div id="wrapper">
 <?php include('nav.php'); ?>
        <!--/. NAV TOP  -->
          <?php include('menu.php'); ?>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Nuevo Producto / Servicio
                        </h1>

                    </div>
                    </div>
                 <!-- /. ROW  -->
                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar Productos / Servicios
                        </div>
                            <div class="panel-body">
                                 <form id="guarproducto" name="guarproducto" method="post" >
                                        <div id="resultados_ajaxnu"></div>
                                     <div class="row">

                                        <div class="col-lg-6">
                                        <div class="form-group">
                                             <?php



                                            // productodao retorna un array de todos los productos de la base de datos segun tu procedure
                                            // eso es para lllenar una tabla por ejemplo
                                            // producto1
                                            //producto2 -> codigo,descripcion ,precio

//                                            foreach($productocontrol->listar() as $producto){

                                             ///   echo $producto->getcodigo();
                                           //    echo $producto->getdescripcion();
                                             //   echo $producto->getprecio();

//                                            }

                                            ///// insert

                                            ?>

                                            <label>Codigo</label>


                                            <input type="text" name="codigo" value="" id="codigo" placeholder="Codigo" required class="form-control" >
                                          <!-- Button trigger modal -->
                                          <br>
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          GENERAR CODIGO DE BARRAS
                                        </button>




                                        </div>
                                            
                                       <div class="form-group">
                                          <label>Codigo Sunat</label>

                                          <input type="hidden" name="idcodsunat" id="idcodsunat">
                                          <input class="form-control" type="text" name="txtcodigosunat" id="txtcodigosunat" required>
<!---->                                         <!-- <input type="text" name="txtcodigosunat"  id="txtcodigosunat"  class="form-control"> <!-- placeholder="Codigo Sunat Obligatorio"  -->
                                          <!-- Button trigger modal -->
                                          




                                        </div>
                                         <div class="form-group">
                                            <label>Descripcion</label>

                                            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" required class="form-control">
                                        </div>

                                             <div class="form-group">
                                            <label>Precio Compra Promedio:</label>
                                            <div class="input-group">
                                            <span class="input-group-addon">S/.</span>
                                            <input type="text" class="form-control"  name="precioc" id="precioc" required aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        </div>
                                            <div class="form-group">
                                            <label>Precio Venta:</label>
                                            <div class="input-group">
                                            <span class="input-group-addon">S/.</span>
                                            <input type="text" class="form-control"  name="preciov" id="preciov" required aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        </div>
<!--                                        <div class="form-group">
                                            <label>Stock</label>
                                            <input type="number" min="1" name="stock" id="stock" placeholder="Stock" required class="form-control">
                                        </div> -->
                                             <div class="form-group">
                                            <label>observacion</label>
                                            <textarea name="observa" id="observa"  class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Categorias:</label>
                                           <select name="categoria" id="categoria" required class="form-control">
                                                <option value=""><-->Seleccionar<--></option>
                                               <?php

                                                foreach($categoria->listar() as $cate){
                                               ?>

                                           <option value="<?php echo $cate->getDescripcion(); ?>"> <?php echo $cate->getDescripcion(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Unidad de venta:</label>
                                           <select name="idunidmedventa" id="idunidmedventa" required class="form-control">
                                                <option value=""><-->Seleccionar<--></option>
                                               <?php

                                                foreach($unidmedfiscontrol->listar() as $unidmedfis){
                                               ?>

                                           <option value="<?php echo $unidmedfis->getDescripcion(); ?>"> <?php echo $unidmedfis->getDescripcion(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Unidad de compra:</label>
                                           <select name="idunidmedcompra" id="idunidmedcompra" required class="form-control">
                                                <option value=""><-->Seleccionar<--></option>
                                               <?php

                                                foreach($unidmedfiscontrol->listar() as $unidmedfis){
                                               ?>

                                           <option value="<?php echo $unidmedfis->getDescripcion(); ?>"> <?php echo $unidmedfis->getDescripcion(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                         </div>
                                         

                                        <div class="col-lg-6">



                                       
                                       
                                             <div class="form-group">
                                            <label>Factor</label>
                                            <input type="number" min="1" name="factor" id="factor" placeholder="Factor" required class="form-control">
                                            </div>
                                             <div class="form-group">
                                            <label>Stock Min.</label>
                                            <input type="number" min="1" name="stockmin" id="stockmin" placeholder="Factor" required class="form-control">
                                            </div>
                                             <div class="form-group">
                                            <label>Stock Max.</label>
                                            <input type="number" min="1" name="stockmax" id="stockmax" placeholder="Factor" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label>Tipo:</label>
                                           <select name="idunidmed" id="idunidmed" required class="form-control">
                                                <option value=""><-->Seleccionar<--></option>
                                               <?php

                                                foreach($unidadmedidacontroller->listar() as $unidadmedida){
                                               ?>

                                           <option value="<?php echo $unidadmedida->getId(); ?>"> <?php echo $unidadmedida->getDescripcion(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
<!--                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="lote" id="lote" value="">Lote
                                                </label>
                                            </div>-->
                                         <div class="form-group">   
                                        <label> Fecha de Fabricación </label>
                                        <input type="date" name="fechafact" id="fechafact" class="form-control">
                                         </div>
                                         <div class="form-group">
                                         <label> Fecha de Expiración </label>
                                        <input type="date" name="fechaexp" id="fechaexp" class="form-control">
                                         </div>
                                         <div class="form-group">
                                        <label>N° Lote </label>
                                        <input type="text" name="nlote" id="nlote" class="form-control">
                                         </div>
                                         <div class="form-group">
                                        <label>R.S </label>
                                        <input type="text" name="rs" id="rs" class="form-control">
                                         </div>
                                         <div class="form-group">
                                        <label> Inv. Inicial </label>
                                        <input type="text" name="invinicial" id="invinicial" class="form-control" required="required">
                                         </div>
                                            <div class="checkbox">
                                            <input id="lote" name="lote"  type="checkbox">
                                            <label for="lote">
                                                Lote
                                            </label>
                                            </div>
                            </div>

                                            <input type="submit" name="btngrabar" id="btngrabar" value="Grabar" class="btn btn-primary btn-lg">
                                                <br>

                                        </div>

                                     


                                 </form>
                                <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">GENERAR CODIGO DE BARRAS</h4>
                                  </div>
                                  <div class="modal-body">
                                    <?php
                                            function rand_str($length =5){
                                            $chars = '124567890';
                                            $chars_length = (strlen($chars) - 1);
                                            $string = $chars{rand(0, $chars_length)};
                                            for ($i = 1; $i < $length; $i = strlen($string))
                                            {
                                            $r = $chars{rand(0, $chars_length)};
                                            if ($r != $string{$i - 1}) $string .= $r;
                                            }
                                            return $string;
                                            }

                                            ?>

                                            <br>
                                           <img src="barcode.php?text=<?php echo $cod= rand_str(9); ?>&size=50&orientation=horizontal&codetype=Code39&print=true&sizefactor=1" />
                                           <input type="text" name="txtcodigo" value="<?php echo $cod; ?>" id="txtcodigo" placeholder="Codigo" required class="form-control" readonly="" >
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                       <button type="button" class="btn btn-primary asignar" >Agregar</button>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                                
                               <?php 
//                                           include './modal/modalcodigosunat.php';
                               
                               ?>


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
    <!--<script src="assets/js/jquery-1.10.2.js"></script>-->
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
                $('#dataTables-example').dataTable({
                    'language': español
                });

            });

    </script>

    <script>
    $(function(){
        $("#codigo").focus();
});
    </script>
      <!-- Custom Js -->

    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
   <script src="js/mijs.js"></script>
   <script src="librerias/alertifyjs/alertify.js"></script>

</body>
</html>
