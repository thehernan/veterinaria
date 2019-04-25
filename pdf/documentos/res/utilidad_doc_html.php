<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2ECCFA;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<link rel="stylesheet" href="css/dvi.css">
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
               
          </tr>
        </table>
    </page_footer>
    <?php include("encabezado_historial.php");?>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td colspan="2" class='midnight-blue' style="width:50%;">AREA</td>
        </tr>
		<tr>
           <td width="75%" style="width:50%;" >
			<?php 
							echo $area;
		
			?>
			
		   </td>
           <td width="25%" style="width:50%;" >&nbsp;</td>
        </tr>
        
   
    </table>
    
       <br>

       <!--datos de pulso y mas-->
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
	     <tr>
           <td colspan="5" class='midnight-blue' style="width:50%;">UTILIDADES</td>
        </tr>
         
             <tr>
	        <th class='midnight-blue' style="width: 3%;text-align:center">ITEM</th>
             <th class='midnight-blue' style="width: 5%;text-align:center">CAN</th>
	        <th class='midnight-blue' style="width: 7%">U.M</th>
	        <th class='midnight-blue' style="width: 40%"><span class="midnight-blue" style="width: 15%;text-align: right">CLIENTE</span></th>
	        <th class='midnight-blue' style="width: 10%"><span class="midnight-blue" style="width: 15%;text-align: right">PRODUCTO</span></th>
	        <th class='midnight-blue' style="width: 10%">P.C</th>
	        <th class='midnight-blue' style="width: 5%;text-align: right">P.V</th>
	        <th class='midnight-blue' style="width: 5%;text-align: right">T.P.V</th>
	        <th class='midnight-blue' style="width: 5%;text-align: right">T.P.C</th>
            <th class='midnight-blue' style="width: 10%;text-align: right">UTILIDAD</th>
          </tr>
	      <?php
$nums=1;
$s=1;
$sumador_total=0;
$sql=mysqli_query($conexion, 'SELECT det.cantidad,prod.unidmedventa,CONCAT(c.nombre," ",c.apellidos) as vcliente,prod.descripcion,prod.preciocompra/prod.factor as pcompra,det.precio,
                        preciocompra/prod.factor * det.cantidad as tventa,det.cantidad*det.precio as tcosto,(det.cantidad*det.precio)-(preciocompra/prod.factor * det.cantidad) as utilidad,a.descripcion as area
                        from documento as doc INNER JOIN cliente as c 
                        on doc.id_cliente=c.id_cliente inner JOIN detalle as det on doc.id_documento=det.id_documento INNER JOIN
                        producto as prod on prod.id_producto=det.id_producto 
						inner join area as a on a.id_area=doc.idarea 
						 where doc.fecha BETWEEN "'.$des.'" and "'.$hasta.'" and doc.idarea='.$ar);

$tpv =0;
$tcosto=0;
$tutilidad=0;
while ($row=mysqli_fetch_array($sql))
	{
		
	$c=$row["cantidad"];
	$uuv=$row['unidmedventa'];
	$vc=$row['vcliente'];
	$d=$row['descripcion'];
	$pc=$row['pcompra'];
	$p=$row['precio'];
	$tv=$row['tventa'];
	$tc=$row['tcosto'];
	$u=$row['utilidad'];
        
        $tpv+=$tv;
        $tcosto+=$tc;
        $tutilidad+=$u;
	
	?>
	      <tr>
	        <td width="7%"  style="width: 5%; text-align: center"><?php  $i=$s++; echo $i; ?></td>
            <td width="7%"  style="width: 5%; text-align: center"><?php echo round($c) .'<br>'; ?></td>
	        <td width="9%"  style="width: 5%; text-align: left"><?php echo $uuv  .'<br>';?></td>
	        <td width="27%"  style="width: 40%; text-align: left"><?php echo $vc .'<br>';?></td>
	        <td width="18%"  style="width: 12%; text-align: left"><?php echo $d .'<br>';?></td>
	        <td width="18%"  style="width: 10%; text-align: left"><?php echo  number_format($pc, 2, ".", ".") .'<br>';?></td>
	        <td width="5%"  style="width: 7%; text-align: right"><?php  echo   number_format($p, 2, ".", ".") .'<br>';?></td>
	        <td width="5%"  style="width: 7%; text-align: right"><?php echo  number_format($tv, 2, ".", ".").'<br>';?></td>
	        <td width="11%"  style="width: 7%; text-align: right"><?php echo   number_format($tc, 2, ".", ".").'<br>';?></td>
              <td width="11%"  style="width: 7%; text-align: right"><?php echo number_format($u, 2, ".", ".") .'<br>';?></td>
          </tr>
	      <?php 

	}
	
?>
	  
        </table>
 
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
      <tr>
        <th class='midnight-blue' style="width: 40%;text-align:center">TOTAL</th>
        <th width="10%" class='midnight-blue' style="width: 25%;text-align: right"><span class="midnight-blue" style="width:5%;"><span class="midnight-blue" style="width:12%;"><span class="midnight-blue" style="width:5%;"><?php echo 'T.P.V: '.' '.number_format($tpv,2); ?></span></span></span></th>
        <th width="11%" class='midnight-blue' style="width: 15%;text-align: right"><span class="midnight-blue" style="width:5%;"><span class="midnight-blue" style="width:5%;"><span class="midnight-blue" style="width:5%;">
          <?php  echo 'T.P.C: '.' '.number_format($tcosto,2); ?>
        </span></span></span></th>
        <th width="11%" class='midnight-blue' style="width: 20%;text-align: right"><span class="midnight-blue" style="width:10%;"><?php echo 'UTILIDAD: '.' '.number_format($tutilidad,2);?></span></th>
      </tr>
    </table>
</page>
