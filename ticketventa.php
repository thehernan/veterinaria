
<?php 

    $iddoc = $_GET['iddoc'];
    require './phpqrcode/qrlib.php';
    require './CifrasEnLetras.php';
    
    $dir= "temp/";
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
    $filename = $dir.'test.png';
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


$sqlm="SELECT 	doc.serie,doc.numero,doc.codigoqr,doc.codigohash, doc.comprobante,tipodoc.abreviatura,cl.nombre,cl.apellidos,cl.dni,cl.direccion,det.codigo,det.descripcion,
	det.cantidad,	det.precio,	doc.fecha FROM documento AS doc INNER JOIN cliente AS cl ON cl.id_cliente = doc.id_cliente inner JOIN
cliente_tipo_documento as tipodoc on tipodoc.id_tipo_documento = cl.id_tipo_documento
INNER JOIN detalle AS det ON doc.id_documento = det.id_documento where doc.id_documento =$iddoc"; //.$iddoc
$executem=mysqli_query($conexion,$sqlm);
$detalle = array();

while($rowm=mysqli_fetch_array($executem)){
    $cliente = $rowm['nombre'].' '.$rowm['apellidos'];
    $dniruc = $rowm['dni'];
    $direccion = $rowm['direccion'];
    $fecha = date_create($rowm['fecha']);
    $serie = $rowm['serie'];
    $numero = $rowm['numero'];
    $qr = $rowm['codigoqr'];
    $hash = $rowm['codigohash'];
    $comprobante = $rowm['comprobante'];
    $tipodoccli = $rowm['abreviatura'];
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
      <p class="centrado"><strong>VETERINARIA GRAU E.I.R.L</strong><br>AV. RAMÓN CASTILLA N° 126 <br> PIURA - PIURA - CASTILLA <br> 950712862 <br><strong> RUC 20529927704 <br><?php if($comprobante==1){ echo $comproletra='FACTURA ELECTRÓNICA'; }if($comprobante==2){echo $comproletra='BOLETA DE VENTA ELECTRÓNICA';}  ?><br>
      <?= $serie.'-'.str_pad($numero, 6, "0", STR_PAD_LEFT)?></strong></p>
    <p> <strong>   ADQUIRIENTE </strong><br>
    <?= $tipodoccli ?>: <?php echo $dniruc ?> <br>
    <?php echo $cliente ?><br>
    <?php echo $direccion ?><br><br>
    <strong>FECHA EMISIÓN:  </strong><?php echo date_format($fecha,'d/m/Y') ?><br>
    <strong>FECHA DE VENC:  </strong><?php echo date_format($fecha,'d/m/Y') ?><br>
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
    <p class="justificado"> Representación impresa de la <?= $comproletra; ?>,<br> visita www.nubefact.com/20529927704 autorización mediante Resolución de Intendencia No.034-005-0005315</p>
 <p class="justificado"><strong>Resumen: </strong></p>
 <div class="justificado">  <?php echo  (strlen($hash)>=34)? wordwrap($hash,34,"<br />",1):$hash; ?></div>
    <?php QRcode::png($qr,$filename,'M',20,15)?>
    <img src="<?= $filename; ?>" alt="QR" width="160" height="160">
    <hr>
  </div>
 <script>
window.print();

</script>   
    
</body>


  
</html>


