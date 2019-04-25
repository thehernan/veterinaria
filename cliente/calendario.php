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
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar Cita
                        </div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="text-danger h3">Seleccione Mascota</label>
                                    <hr>
                                    <input type="hidden" id="txtid" name="txtid" class="form-control">
                                    <input type="text" name="txtmasc" id="txtmasc" readonly placeholder="Mi mascota" required class="form-control"><br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <hr>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg tamano">
                                        <div class="modal-content">

                                            <!--inicio de tabla -->
                                            <?php include ('modal/moduscarmascota.php');?>

                                            <!--fin -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="from">Inicio</label>
                                    <div class='input-group date' id='from'>
                                        <input type='text' id="from" name="from" class="form-control" readonly />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </div>

                                    <br>

                                    <label for="to">Final</label>
                                    <div class='input-group date' id='to'>
                                        <input type='text' name="to" id="to" class="form-control" readonly />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </div>

                                    <br>

                                    <label for="tipo">Tipo de evento</label>
                                    <select class="form-control" name="class" id="tipo">
                                        <option value="event-info">Consulta</option>
                                        <option value="event-important">Importante</option>
                                        <!-- <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>-->
                                    </select>

                                    <br>


                                    <label for="title">Asunto</label>
                                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                                    <br>

                                    <label for="body">Nota</label>
                                    <textarea id="body" name="event" required class="form-control" rows="3"></textarea>


                                    <p>

                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                            </form>
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
<script type="text/javascript">
    $(function() {
        $('#from').datetimepicker({
            language: 'ru',
            format: 'YYYY/MM/DD H:mm:ss'
//            minDate: new Date()
        });
        $('#to').datetimepicker({
            language: 'ru',
            format: 'YYYY/MM/DD H:mm:ss'
//            minDate: new Date()
        });

    });

</script>


<script src=" js/underscore-min.js"></script>


<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

<script>
    $(document).ready(function() {

        $('.datatable').dataTable({
            'language': español
        });



    });

</script>

<script src="librerias/alertifyjs/alertify.js"></script>
 <script src="assets/js/custom-scripts.js"></script>
 <script  type="text/javascript" src="js/push.min.js"></script>
<script src="js/mijs.js"></script>
<script src="js/VentanaCentrada.js"></script>

</html>
<?php



// Definimos nuestra zona horaria
date_default_timezone_set("America/Lima");

// incluimos el archivo de funciones
include 'funcionescalendar.php';

require_once ("config/db.php");
require_once ("config/conexion.php");

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {
        $inicion = new DateTime($_POST['from']);
        $finaln =   new DateTime($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form
        echo '<script> console.log("'.$_POST['from'].'");</script>';
        
        $inicio = _formatear($inicion->format('d/m/Y H:i:s'));
        
         echo '<script> console.log("iniciform: '.$inicio.'");</script>';
        // y la formateamos con la funcion _formatear

         
        $final  = _formatear($finaln->format('d/m/Y H:i:s'));
        echo '<script> console.log("finalform: '.$final.'");</script>';
        

        // Recibimos el fecha de inicio y la fecha final desde el form
        
        
            $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];
        
       
//        $inicio_normal = $inicion->format('Y-m-d H:i:s');
//
//        // y la formateamos con la funcion _formatear
//        $final_normal  = $finaln->format('Y-m-d H:i:s');

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);
        
        $cliente  = evaluar( $_POST['txtid']);

        // insertamos el evento
         if($cliente==""){
              echo "<script>alert('Sellecione Cliente...!')</script>";
             return;
         }
        
        $query="INSERT INTO eventos (id,title,body,url,class,start,end,inicio_normal,final_normal,id_cliente,atendido,tipocita,confirmar)"
                . "VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal','".$cliente."','0','RESERVADO','0');";
        mysqli_query($conexion, $query);
        
     

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // para generar el link del evento
        $link = "descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // redireccionamos a nuestro calendario
        
         echo "<script>alert('Cita Creada con Éxito...!')</script>"; 
        //header("Location:calendario.php"); 
    }
}

 ?>
