

<?php 
//echo  $_GET['array'];

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        
   
?>

<!DOCTYPE html>
<html>
 
<head>
  <link rel="stylesheet" href="css/cssticket.css">
<!--  <script src="css/cssticket.css"></script>-->
 
</head>



 
<body>
    
<?php 

require_once ("config/db.php");
require_once ("config/conexion.php");



$sql="select b.descripcion,b.codigo,b.precio,b.id_doctor,b.id_mascota,b.fecha,b.facturado,
        doc.nombre,doc.apellidos,m.nombre as mascota from banio as b INNER JOIN doctor as doc on b.id_doctor=doc.iddoctor 
INNER JOIN mascota as m on m.id_mascota = b.id_mascota where b.id_banio=".$id;
$execute=mysqli_query($conexion,$sql);


while($row=mysqli_fetch_array($execute)){
    $doctor = $row['apellidos'].' '.$row['nombre'];
    $mascota = $row['mascota'];
    $descrip = $row['descripcion'];
    $precio = $row['precio'];
    $fecha=$row['fecha'];
    
    
    
}

?>    
  <div class="ticket">
      <img src="logo/logoticket.jpg" alt="Logotipo">
      <p class="centrado">TICKET DE PAGO BAÑO <br>VETERINARIA GRAU E.I.R.L<br> <br>Atendido: <?= $doctor ?><br>Paciente: <?= $mascota ?> </p>
    <table>
      <thead>
        <tr>
          <th class="cantidad">Cant</th>
          <th class="producto">Descripción</th>
          <th class="precio">S/ </th>
        </tr>
      </thead>
      <tbody>
        
     
     
        <tr>
            <td>01</td>         
            <td><?= $descrip ?></td>
            <td><?= number_format($precio,2) ?></td>
        </tr>

       
        
      
        <tr>
          <td></td>
          <td class="producto">TOTAL S/</td>
          <td class="precio"> <?= number_format($precio,2)?></td>
        </tr>
      </tbody>
    </table>

    
    
    
    <p class="centrado">¡GRACIAS POR SU PREFERENCIA!<br>@vtechnologyperu</p>
  </div>
 <script>
window.print();

</script>   
    
</body>


  
</html>

    <?php } else 
        
    {
     header('location:lista_mascotas.php');
        
        
    }
        
        ?>


