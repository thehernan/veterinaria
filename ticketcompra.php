
<?php 

    $iddoc = $_GET['iddoc'];
//    require './phpqrcode/qrlib.php';
    require './CifrasEnLetras.php';
    
//    $dir= "temp/";
//    if(!file_exists($dir)){
//        mkdir($dir);
//        
//    }
//    $filename = $dir.'test.png';
?>

<!DOCTYPE html>
<html>
 
<head>

  <link rel="stylesheet" href="css/cssticket.css">
<!--  <script src="css/cssticket.css"></script>-->
 
</head>



 
<body>
    
<?php 
//$idcliente = 0;
//$iddoc =0;
// foreach ($detalle as $temp){
//     $idcliente=$temp->idcliente;
//     
// }


require_once ("config/db.php");
require_once ("config/conexion.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
//$sql="SELECT * FROM `doctor` where iddoctor=$iddoc;";
//$execute=mysqli_query($conexion,$sql);
//
//while($row=mysqli_fetch_array($execute)){
//    $doctor = $row['apellidos'].' '.$row['nombre'];
//    
//}


$sqlm="SELECT c.*,p.nombre,p.numerodoc,p.direccion,det.codigo,det.descripcion,det.cantidad,det.precio FROM"
        . " `compra` as c inner join proveedor as p on p.id_proveedor= c.id_proveedor INNER JOIN "
        . "detalle_compra as det on c.id_compra = det.id_compra where c.id_compra =$iddoc"; //.$iddoc
$executem=mysqli_query($conexion,$sqlm);
$detalle = array();

while($rowm=mysqli_fetch_array($executem)){
    $cliente = $rowm['nombre'];
    $dniruc = $rowm['numerodoc'];
    $direccion = $rowm['direccion'];
    $fecha = date_create($rowm['fecha']);
    $serie = $rowm['serie'];
    $numero = $rowm['numero'];
//    $qr = $rowm['codigoqr'];
//    $hash = $rowm['codigohash'];
    $comprobante = $rowm['comprobante'];
//    $tipodoccli = $rowm['abreviatura'];
    $temp = new Temp();
    $temp->setCodigo($rowm['codigo']);
    $temp->setDescripcion($rowm['descripcion']);
    $temp->setCantidad($rowm['cantidad']);
    $temp->setPrecio($rowm['precio']);
    
    array_push($detalle, $temp);
    
}
?>    
  <div class="ticket">
      <img src="logo/transpa.png" alt="Logotipo"  width="100" height="100">
      <p class="centrado"><strong>VETERINARIA GRAU E.I.R.L</strong><br>AV. RAMÓN CASTILLA N° 126 <br> PIURA - PIURA - CASTILLA <br> 950712862 <br><strong> RUC 20529927704 <br><?= $comprobante; ?> [COMPRA]<br>
      <?= $serie.'-'.str_pad($numero, 6, "0", STR_PAD_LEFT)?></strong></p>
    <p> <strong>   PROVEEDOR </strong><br>
    RUC: <?php echo $dniruc ?> <br>
    <?php echo $cliente ?><br>
    <?php echo $direccion ?><br><br>
    <strong>FECHA EMISIÓN:  </strong><?php echo date_format($fecha,'d/m/Y') ?><br>
   
    <strong>MONEDA: </strong>SOLES<br>
    <strong>IGV: </strong>18.00 %</p><br>
    <table>
      <thead>
        <tr>
          <th class="cantidad">[CANT.]</th>
          <th class="producto">DESCRIPCIÓN</th>
          <th class="precio">P/U</th>
          <th class="precio">TOTAL</th>
        </tr>
      </thead>
      <tbody>
          <?php
//          $temp = new Temp(); 
          $total=0;
          foreach ($detalle as $temp){
              $importe = $temp->getCantidad() * $temp->getPrecio();
              ?>
        <tr>
            <td class="cantidad">[<?php echo number_format($temp->getCantidad() ,2)?>]</td>
            <td class="producto"><?php echo $temp->getDescripcion() ?></td>
            <td class="precio"><?php echo number_format($temp->getPrecio(),2) ?></td>
            <td class="precio"><?php echo number_format($importe,2) ?></td>
        </tr>
       
        
        
        <?php 
            $total+=$importe;
        
        
          } 
          
          $gravada = $total/1.18;
          $igv = $total - ($total/1.18);
          ?>
     
        <tr>
          <td></td>
          
          <td class="producto">GRAVADA S/</td>
          <td></td>
          <td class="precio"><?php echo number_format($gravada,2) ?></td>
          </tr>
          <tr>
           <td></td>
          
          <td class="producto">IGV     S/</td>
           <td></td>
          <td class="precio"><?php echo number_format($igv,2) ?></td>
          
          </tr>
          <tr>
           <td></td>
           
          <td class="producto">TOTAL   S/</td>
          <td></td>
          <td class="precio"><?php echo number_format($total,2) ?></td>
          </tr>
      </tbody>
    </table>
    <hr>
    <p class="centrado"><strong>IMPORTE EN LETRAS: </strong><?php echo strtoupper(CifrasEnLetras::convertirEurosEnLetras($total)); ?></p><hr>
   
 
    <hr>
  </div>
 <script>
window.print();

</script>   
    
</body>


  
</html>


