

<?php 
//echo  $_GET['array'];

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialservicio.php");

$idhistoria=$_GET['historia'];

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

$sql="SELECT m.nombre,m.id_mascota ,CONCAT(doc.nombre,' ',doc.apellidos) as doct,
hists.precio,prod.descripcion
from historialmedico as histm INNER JOIN 
mascota as m on m.id_mascota=histm.id_mascota inner join doctor as doc on histm.iddoctor=doc.iddoctor
INNER JOIN historialservicios as hists on hists.id_historial=histm.id_historial INNER JOIN producto as prod
on hists.id_producto=prod.id_producto where histm.id_historial=$idhistoria";
$execute=mysqli_query($conexion,$sql);

$detalles = array();
while($row=mysqli_fetch_array($execute)){
    $histdetalle = new historialservicio();
    $doctor = $row['doct'];
    $mascota =  $row['nombre'];
    $ficha = $row['id_mascota'];
    $histdetalle->setProducto($row['descripcion']);
    $histdetalle->setPrecio($row['precio']);
    
    array_push($detalles, $histdetalle);
    
    
    
}

?>    
  <div class="ticket">
      <img src="logo/transpa.png" alt="Logotipo" width="100" height="100">
      <p class="centrado">TICKET DE PAGO FICHA CLINICA<br>VETERINARIA GRAU E.I.R.L<br><strong> N° de Ficha: <?= $ficha ?></strong> <br>Doctor: <?php echo $doctor ?><br>Paciente: <?php echo $mascota ?> </p>
    <table>
      <thead>
        <tr>
          <th class="cantidad">Cant</th>
          <th class="producto">Descripción</th>
          <th class="precio">S/ </th>
        </tr>
      </thead>
      <tbody>
          <?php $total = 0;
          foreach ($detalles as $det){
              $total+=$det->getPrecio();
              ?>
          
        <tr>
            <td>01</td>         
            <td><?= $det->getProducto(); ?></td>
            <td><?= number_format($det->getPrecio(),2) ?></td>
        </tr>
          <?php  }
          
          
          ?>
        

        <tr>
          <td></td>
          <td class="producto">TOTAL S/</td>
          <td class="precio"> <?= number_format($total,2)?></td>
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


