<?php 
	@session_start();
		
	if(!$_SESSION['user_name'] and !$_SESSION['user_login_status']){
	
		echo '<script> location.href="index.php";</script>';

        }
$es=$_SESSION['estado'];

if($es==1){
     echo "<script>alert(':::Acceso Restringido para Usted...!')</script>"; 
 
   echo '<script> location.href="index.php";</script>';
    
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:::SISTEMA VETERINARIA:::</title>
    <link rel="icon" sizes="192x192" href="img/dog-vector.png"/>
   
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
        <div id="page-wrapper">
             <?php 
                          $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                          ?>
            <small><?php echo $fecha; ?></small>
            <div id="page-inner">


                <div class="row">
                 <div class="col-md-6">
                        <h1 class="page-header">
                             CLÍNICA VETERINARIA GRAU <small>Sistema de Gestión veterinaria.
                         
                            </small>
                        </h1>
                    </div>
                    
                <div  class="col-md-6">
                 <div class="panel panel-success">
            <div class="panel-heading">Bienvenido , Estimado(a):</div>
            <div class="panel-body">
                <div class="user-panel">
            <div class="pull-left image">
                <img src="img/joven.png" width="40%" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
          
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
              <!--<button onclick="notificacion()">notidica</button>-->
            </div>
          </div>
                <!--<img src="img/man.png" alt="chat 24 horas" title="chat 24 horas" class="pull-right" width="70" height="80">-->
                <p><strong><?php echo $_SESSION['user_name'];   ?></strong></p>
                <div class="text-left"> 
                       
                <a href="login.php?logout"><button type="button" class="btn btn-warning">Cerrar Sesi&oacute;n	</button></a>	
                
                </div>
                
                
                
             </div>
            
      </div>    
                </div>
                   
                    
                </div>
                <!-- /. ROW  -->
                 <div class="row">

                         <div class="col-md-12">
                              <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                        <div class="page-header"><h2></h2></div>
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                   <!-- <div class="pull-right form-inline"><br>
                                        <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                                    </div> -->

                </div>
                        </div>
                                  <div class="panel-body">
                                       
                                      <div id="calendar"></div>
                                  </div>
                              </div>
                    <!-- Advanced Tables -->
                    
                    <!--End Advanced Tables -->
                </div>
                   
                </div>

                
<div class="row">

                  
                 <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <a href="lista_mascotas.php"><i class="fa fa-ambulance fa-5x"></i></a>
                                <h3><?php $año= date('Y');
                                    $sql="SELECT count(*)as num  FROM mascota;";
                                    $ejecute=mysqli_query($conexion,$sql);
                                    $row=mysqli_fetch_assoc($ejecute);
                                    echo $row['num'];
                                ?>
</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Pacientes

                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <a href="lista_citas.php"><i class="fa fa fa-comments fa-5x"></i></a>
                                <h3><?php $año= date('Y');
                                    $sql="SELECT count(*) as num FROM eventos c
      inner join mascota m on m.id_mascota=c.id_cliente
      inner join cliente cl on cl.id_cliente=m.id_cliente where c.atendido=0 order by inicio_normal DESC";
                                    $ejecute=mysqli_query($conexion,$sql);
                                    $row=mysqli_fetch_assoc($ejecute);
                                    echo $row['num'];
                                ?>
                                    </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Citas Por Atender  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>

                            </div>
                        </div>
                    </div>
                 
    
                </div>
         


                   

                </div>
                <!-- /. ROW  -->
                <!-- /. ROW  -->
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
                    'language': español
                });
            });
    </script>
      <!-- Custom Js -->
    
    <script src="assets/js/custom-scripts.js"></script>
    
    <script src="js/mijs.js"></script> 
    
     <link rel="stylesheet" href="css/calendar.css">
     <script type="text/javascript" src=" js/es-ES.js"></script>
     <script src=" js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href=" css/bootstrap-datetimepicker.min.css" />
       <script src=" js/bootstrap-datetimepicker.es.js"></script>
       <script src=" js/underscore-min.js"></script>
    <script src=" js/calendar.js"></script>
    <script  type="text/javascript" src="js/push.min.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                        events_source: ' obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: ' tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '08:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>
    <script type="text/javascript">
        
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
        
        ////////////// notificaciones /////////////
      window.onload = function (){
        Push.Permission.request();
   
        };

        
    </script>

</body>

</html>