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
                            Nuevo Doctor
                        </h1>
                        
                    </div>
                    </div> 
                 <!-- /. ROW  -->
                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar Doctor
                        </div>
                            <div class="panel-body">
                                 <form  method="post" name="guardardoctor" id="guardardoctor">
                                     <div id="resultados_ajaxnu"></div>
                                     <div class="row">
                                         
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" name="txtape" id="txtape" placeholder="apellidos" required class="form-control">
                                        </div>
                                         <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" name="txtnom" id="txtnom" placeholder="nombres" required class="form-control">
                                        </div>
                                
                                        <div class="form-group">
                                            <label>Domicilio</label>
                                            <input type="text" name="txtdomi" id="txtdomi" placeholder="domicilio" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input type="text" name="txtdni" id="txtdni" placeholder="dni" required class="form-control">
                                        </div>    
                                          <div class="form-group">
                                            <label>Celular</label>
                                            <input type="text" name="txtce" id="txtce" placeholder="Celular" required class="form-control">
                                        </div>
                                            
                                     </div>
                                         
                                         <div class="col-lg-6">
                                      
                                         <div class="form-group">
                                            <label>Profesión</label>
                                            <input type="text" name="txtpro" id="txtpro" placeholder="Profesión"  required class="form-control">
                                        </div>
                                   
                                    <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="txtema" id="txtema" placeholder="email" required class="form-control">
                                        </div>  
                                          
                                            <input type="submit" name="btngrabar" id="btngrabar" value="Grabar" class="btn btn-primary">
                                     </div>
                                         
                                      </div>
                                     
                                  
                                 </form>
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
    <script src="js/mijs.js"></script> 
   
</body>
</html>
