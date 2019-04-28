<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/compracontrolller.php");

$compracontrol = new compracontroller();



  /** Actual month last day **/
  function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  }
 
  /** Actual month first day **/
  function _data_first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
  }

$documentos = $compracontrol->select( _data_first_month_day(),_data_last_month_day(), 'Factura', '', '', '');

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
                            VER COMPROBANTES COMPRAS (FACTURA, GUIA. R)
                        </h1>

                    </div>
                    </div>
                 <!-- /. ROW  -->
                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de compra
                        </div>
                            <div class="panel-body">
               
                        <input type="hidden"value="<?=base_url ?>" id="url" name="url">  
                     <form method="POST"  id="FormularioAjaxCompras" enctype="multipart/form-data" autocomplete="off" >   
                        <div class="row">  
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">Desde </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    
                                    <input type="date" class="form-control" placeholder="Desde" id="dpdesde" name="dpdesde" value="<?= _data_first_month_day()?>" required="">
                                                                    </div>

                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">Hasta </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    
                                    <input type="date" class="form-control" placeholder="Hasta" id="dphasta" name="dphasta" value="<?= _data_last_month_day()?>" required="">
                                    
                                </div>

                            </div>
                        </div>
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label>Tipo Comprobante</label>
                                <select  class="form-control show-tick" id="cbtipocomprobante" name="cbtipocomprobante">
                                    <!--<option value="">- Tipo comprobante -</option>-->
                                    <?php 
                                    $pred= array('Factura','Guia de remisión');
                                    $value= array('Factura','guia_remision');
                                    
                                    for($i=0;$i < count($pred);$i++){

                                            echo '<option value="'.$value[$i].'" >'.$pred[$i].'</option>';


                                    }

                                    ?>

                            </select>
                            </div>
                        </div>
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">(Ruc, Dni, Nombre, Rz. Social) </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtbuscar" name="txtbuscar">
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Serie </label>
                                    <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtserie" name="txtserie">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Número </label>
                                    <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtnumero" name="txtnumero">
                                        </div>
                                    </div>

                                </div>
                            </div>
                           
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label>Acciones</label>
                            <div class="form-group form-float">
                                
                                <button class="btn btn-sm btn-primary waves-effect" type="submit"><span class="glyphicon glyphicon-search "></span> Buscar</button>
                                
                            </div>
                        </div>
                            
                            
                            
                            
                        </div>
                     </form>
                        
                        
                        
                        
                        
                        <div class="table-responsive" id="respuestaAjax">
                            <table class="table  table-hover table-bordered" id="tabladocumento">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
                                        <th>Número</th>
                                        <th>RUC/ DNI</th>
                                        <th>Nombre / Rz. Social</th>
                                        <th>Total</th>
                                        <th>Imprimir</th>
                                        <!--<th>Acciones</th>-->
                                    </tr>
                                </thead>
<!--                                <tfoot>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
                                        <th>Número</th>
                                        <th>RUC/ DNI</th>
                                        <th>Nombre / Rz. Social</th>
                                        <th>Total</th>
                                        <th>Est. Local</th>
                                        <th>Est. Sunat</th>
                                        <th>Imprimir</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>-->
                                <tbody >
                                    <?php foreach ($documentos as $documento){
                                        
                                                                                      
                                            echo '<tr>';
                                            
                                            echo '<td>'.$documento->getFecha().'</td>';
                                            echo '<td>'.$documento->getComprobante().'</td>';
                                            echo '<td>'.$documento->getSerie().'</td>';
                                            echo '<td>'.$documento->getNumero().'</td>';
                                            echo '<td>'.$documento->getNumerodoccliente().'</td>';
                                            echo '<td>'.$documento->getRazonsocial().'</td>';
                                            echo '<td>'.$documento->getTotal().'</td>';
                                           
                                            echo '<td><button type= "button" onclick ="printcompra('.$documento->getId().')"><i class="glyphicon glyphicon-print"></i></button> </div></td>';
                                           
                                             echo '</tr>';
                                        
                                        
                                        
                                    } ?>



                                </tbody>
                               
                            </table>
                            <div class="pagination">
                                <nav>
                                    <ul class="pagination"></ul>
                                    
                                </nav>
                                
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

   var table = '#tabladocumento';
   $(document).ready( function (){   
     
       $('.pagination').html('')
       var trnum =0
       var maxRows = 1
       var totalRows = $(table+' tbody tr').length
       $(table+' tr:gt(0)').each( function (){
           trnum++
           if(trnum > maxRows){
               $(this).hide()
           }
           if(trnum <= maxRows){
               $(this).show()
               
           }
           
           
           
       })
       if(totalRows > maxRows){
           var pagenum = Math.ceil(totalRows/maxRows)
           for(var i=1; i<= pagenum;){
               $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span>\n\
                </span>\</li>').show()
               
           }
           
       }
       $('.pagination li:first-child').addClass('active')
       $('.pagination li').on('click', function (){
       
        var pageNum = $(this).attr('data-page')
        var trIndex = 0;
        $('.pagination li').removeClass('active')
        $(this).addClass('active')
        $(table+' tr:gt(0)').each(function (){
            trIndex++
            if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)- maxRows)){
                $(this).hide()
            }else {
                $(this).show()
            }
                
            })
            
        });
       
       
       });
       
//       $(function (){
//        $('table tr:eq(0)').prepend('<th>ID</th>')
//        var id=0;
//        $('table tr:gt(0)').each(function (){
//            id++
//            $(this).prepend('<td>'+id+'</td>')
//            
//        })
//       
//       
//       
//       
//       })
       
       
       
       

    
    
  
</script>  

    
      <!-- Custom Js -->

    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
   <script src="js/mijs.js"></script>
   <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="js/VentanaCentrada.js"></script>

</body>
</html>


  




















