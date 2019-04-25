<?php

    
    //incluimos nuestro archivo config
   require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
   require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

    // Incluimos nuestro archivo de funciones
    include 'funcionescalendar.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT e.title,e.body,e.inicio_normal,e.final_normal,c.nombre,c.apellidos,c.direccion,c.telf1,c.telf2 FROM eventos e
inner join mascota m on e.id_cliente=m.id_mascota
inner join cliente c on m.id_cliente=c.id_cliente WHERE e.id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

    $direccion=$row['direccion'];
   
$cliente=$row['apellidos'].' '.$row['nombre'];
$telefono=$row['telf1'].' / '.$row['telf2'];




// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "<script>alert('Evento eliminado')</script>";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
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
    
     <div id="wrapper">
        <?php include('nav.php'); ?>
        <!--/. NAV TOP  -->
        <?php include('menu.php'); ?>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                
                <!-- /. ROW  -->
                
<div class="row">
                <div class="col-md-12">
 <h3><?php echo  $titulo?></h3>
	 <hr>
     <b>Fecha inicio:</b> <?php echo $inicio;?>
     <b>Fecha termino:</b> <?php echo $final;?>
 	<p><?php echo $evento?></p>
    <p>Cliente : <?php echo $cliente;?></p>
     <p>Direcciòn : <?php echo $direccion;?></p>
        <p>Telefonos 1 :         <a href="tel: <?php echo $row['telf1'];?>" >  <?php echo $row['telf1'];?></a></p>   
     <p>Telefonos 2 :         <a href="tel: <?php echo $row['telf2'];?>" >  <?php echo $row['telf2'];?></a></p>
     

<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>
                  

                </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    
	
    </body>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    
     <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
    <script src="js/mijs.js"></script>
    <script src="js/VentanaCentrada.js"></script>
</html>
