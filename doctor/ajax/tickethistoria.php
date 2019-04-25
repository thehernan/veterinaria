

<?php 
//echo  $_GET['array'];
$detalle = json_decode($_GET['array']);

?>

<!DOCTYPE html>
<html>
 
<head>
  <link rel="stylesheet" href="css/cssticket.css">
<!--  <script src="css/cssticket.css"></script>-->
 
</head>



 
<body>
    
<?php 
$idmascota = 0;
$iddoc =0;
$idhistoria =0;
 foreach ($detalle as $temp){
     $idmascota=$temp->idmascota;
     $iddoc = $temp->iddoctor;
     $consulta= $temp->consulta;
     $tratamiento= $temp->tratamiento;
     $analisis = $temp->analisis;
     $vacuna = $temp->vacuna;
     $servicios = $temp->servicio;
     $idhistoria=$temp->idhistoria;
 }


require_once ("config/db.php");
require_once ("config/conexion.php");

$sql="SELECT * FROM `doctor` where iddoctor=$iddoc;";
$execute=mysqli_query($conexion,$sql);

while($row=mysqli_fetch_array($execute)){
    $doctor = $row['apellidos'].' '.$row['nombre'];
    
}


$sqlm="SELECT * FROM `mascota` where id_mascota=$idmascota;";
$executem=mysqli_query($conexion,$sqlm);

while($rowm=mysqli_fetch_array($executem)){
    $mascota = $rowm['nombre'];
    
}
?>    
  <div class="ticket">
      <img src="logo/logoticket.jpg" alt="Logotipo">
      <p class="centrado">TICKET DE PAGO FICHA CLINICA<br>VETERINARIA GRAU E.I.R.L<br><strong> N° de Ficha: <?= $idhistoria ?></strong> <br>Doctor: <?php echo $doctor ?><br>Paciente: <?php echo $mascota ?> </p>
    <table>
      <thead>
        <tr>
          <th class="cantidad">Cant</th>
          <th class="producto">Descripción</th>
          <th class="precio">S/ </th>
        </tr>
      </thead>
      <tbody>
          <?php  if($consulta>0){?>
          
        <tr>
            <td>01</td>         
            <td>Consulta</td>
            <td><?= number_format($consulta,2) ?></td>
        </tr>
          <?php  } ?>
        
         <?php  if($tratamiento>0){?>
        <tr>
            <td>01</td>         
            <td>Tratamiento</td>
            <td><?= number_format($tratamiento,2) ?></td>
        </tr>
        <?php  } ?>
        <?php  if($analisis>0){?>
        <tr>
            <td>01</td>         
            <td>Analisis</td>
            <td><?= number_format($analisis,2) ?></td>
        </tr>
         <?php  } ?>
         <?php  if($vacuna>0){?>
        <tr>
            <td>01</td>         
            <td>Vacuna</td>
            <td><?= number_format($vacuna,2) ?></td>
        </tr>
        <?php  } ?>
        <?php  if($servicios>0){?>
        <tr>
            <td>01</td>         
            <td>Servicios Veterinarios</td>
            <td><?= number_format($servicios,2) ?></td>
        </tr>
        <?php  } ?>
       
        
        
        <?php 
//        $total+=$temp->importe;
        
        
//          } ?>
      
        <tr>
          <td></td>
          <td class="producto">TOTAL S/</td>
          <td class="precio"> <?= number_format($consulta+$tratamiento+$analisis+$vacuna+$servicios,2)?></td>
        </tr>
      </tbody>
    </table>
<!--    <P>Consulta: S/ <?= number_format($consulta,2)?></P>
    <P>Tratamiento: S/ <?= number_format($tratamiento,2)?></P>
    <P>Analisis: S/ <?= number_format($analisis,2)?></P>
    <P>Vacuna: S/ <?= number_format($vacuna,2)?> </P>
    <P>Servicios: S/ <?= number_format($servicios,2) ?></P>
    <div class="h3"><strong>Total S/: <?= number_format($consulta+$tratamiento+$analisis+$vacuna+$servicios,2)?></strong></div>-->
    
    
    
    <p class="centrado">¡GRACIAS POR SU PREFERENCIA!<br>@vtechnologyperu</p>
  </div>
 <script>
window.print();

</script>   
    
</body>


  
</html>


