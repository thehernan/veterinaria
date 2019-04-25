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
.midnight-yellow{
	background:#ff0;
	padding: 4px 4px 4px;
	color:black;
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
           <td colspan="2" class='midnight-blue' style="width:50%;">PACIENTE</td>
        </tr>
		<tr>
           <td width="75%" style="width:50%;" >
			<?php 
				echo "<br> Nombre:";
				echo $nombre;
				echo "<br> Especie:";
				echo $especie;
				echo "<br> Raza: ";
				echo $raza;
				echo "<br> Sexo: ";
				echo $sexo;
				echo "<br> Pelaje: ";
				echo $pelaje;
				echo "<br> F-N: ";
				echo $fn;
				echo "<br> Fallecido: ";
				echo $fa;
				echo "<br> Estraviado: ";
				echo $ex;
				echo "<br> DVI: ";
				echo $dvi;
				echo "<br> N°. Ficha : ";
				echo str_pad($mascota, 6, "0", STR_PAD_LEFT);
			?>
      
</td>
           <td width="25%" style="width:50%;" >
           <?php 
				
				// echo'<img src="data:image/jpg;base64 , '.$fo. '"/>' 
			?>
          </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>DUEÑO</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA REGISTRO</td>
		   <td style="width:40%;" class='midnight-blue'>DIRECCIÓN</td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				
				echo $due;
			?>
		   </td>
		  <td style="width:25%;"><?php echo $fc;?></td>
		   <td style="width:40%;" >
          <?php echo $dir;?>
				
	      </td>
        </tr>
		
        
   
    </table>
      <?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($conexion, "SELECT * FROM historialmedico h
inner join doctor d on h.iddoctor=d.iddoctor where h.id_mascota='".$mascota."';");

while ($row=mysqli_fetch_array($sql))
	{
	$fc=$row["fc"];
	$fr=$row['fr'];
	$p=$row['p'];
	$pam=$row['pam'];
	$ps=$row['ps'];
	$pd=$row['pd'];
	$d=$row['d'];
	$cpp=$row['cpp'];
	$f=$row['horaatendio'];
	$id=$row['id_mascota'];
	$atendio=$row['nombre'].' '.$row['apellidos'];

	?>
    <!--datos de pulso y mas-->
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
	     <tr>
           <td colspan="7" class='midnight-yellow' style="width:80%;"> ATENDIDO : <span style="width: 40%; text-align: right"><?php echo $atendio;?> - FECHA : <span style="width: 50%; text-align: right"><?php echo $f;?></span></span></td>
            </tr>
         
             <tr>
	        <th class='midnight-blue' style="width: 5%;text-align:center">F.C</th>
	        <th class='midnight-blue' style="width: 5%">F.R</th>
	        <th class='midnight-blue' style="width: 5%"><span class="midnight-blue" style="width: 15%;text-align: right">P</span></th>
	        <th class='midnight-blue' style="width: 5%"><span class="midnight-blue" style="width: 15%;text-align: right">P.A.M</span></th>
	        <th class='midnight-blue' style="width: 5%">P.S</th>
	        <th class='midnight-blue' style="width: 5%;text-align: right">P.D</th>
	        <th class='midnight-blue' style="width: 10%;text-align: right">% D</th>
	        <th class='midnight-blue' style="width: 10%;text-align: right">C.P.P</th>
            <th class='midnight-blue' style="width: 10%;text-align: right">FECHA</th>
          </tr>
	    
	      <tr>
	        <td width="7%"  style="width: 5%; text-align: center"><?php echo $fc; ?></td>
	        <td width="9%"  style="width: 5%; text-align: left"><?php echo $fr;?></td>
	        <td width="27%"  style="width: 5%; text-align: left"><?php echo $p;?></td>
	        <td width="18%"  style="width: 5%; text-align: left"><?php echo $pam;?></td>
	        <td width="18%"  style="width: 5%; text-align: left"><?php echo $ps;?></td>
	        <td width="5%"  style="width: 5%; text-align: right"><?php  echo $pd;?></td>
	        <td width="5%"  style="width: 10%; text-align: right"><?php echo $d;?></td>
	        <td width="11%"  style="width: 10%; text-align: right"><?php echo $cpp;?></td>
              <td width="11%"  style="width: 10%; text-align: right"><?php echo $f;?></td>
          </tr>
	   
        </table>
    <!---->
    
    
	    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
	     <tr>
           <td colspan="2"  style="width:50%;">&nbsp;</td>
        </tr>
         
             <tr>
	       
	        <th class='midnight-blue' style="width: 70%">MEDICAMENTO</th>
	        <th class='midnight-blue' style="width: 10%;text-align: right">CANTIDAD</th>
	        <th class='midnight-blue' style="width: 10%;text-align: right">PRECIO</th>
             <th class='midnight-blue' style="width: 10%;text-align: right">IMPORTE</th>     
          </tr>
	      <?php
$nums=1;
$sumador_total=0;
$sql2=mysqli_query($conexion, "SELECT * FROM detalle_historial d
inner join producto p on p.id_producto=d.id_producto where d.id_historial='".$id."';");
 
while ($row1=mysqli_fetch_array($sql2))
	{
	$medicamento=$row1['descripcion'];	
	
	 		$precio_vent=$row1['precio'];
            $precio_venta_f=number_format($precio_vent,2);//Formateo variables
            
            $cantida = $row1['cantidad'];
            $precio_total=$precio_vent*$cantida;
            $precio_total_f=number_format($precio_total,2);//Precio total formateado
           $canti=number_format($cantida,3);
            $sumador_total+=$precio_total;//Sumadors
			
	$subtotal=number_format($sumador_total/1.18,2,'.','');
	$total_iva=$sumador_total-$subtotal;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$sumador_total;
	?>

	      <tr>
	     
	        <td width="50%"  style="width: 70%; text-align: left"><?php echo $medicamento;?></td>
	        <td width="10%"  style="width: 10%; text-align: right"><?php echo $canti; ?></td>
	        <td width="10%"  style="width: 10%; text-align: right"><?php echo $precio_venta_f; ?></td>
            <td width="10%"  style="width: 10%; text-align: right"><?php echo $precio_total_f; ?></td>
            
          
          </tr>
	  <?php 	}	?>
	  
        </table>
        <table>
          <tr>
    <td class='text-right'>----------------------------------------------------------------------------------------------------</td>
    <td align="left" class='text-right' style="width: 50%;">SUBTOTAL S/ </td>
    <td colspan="4" style="width: 50%; text-align: right"><?php echo number_format($subtotal,2);?></td>
    </tr> 
<tr>
    <td class='text-right'>----------------------------------------------------------------------------------------------------</td>
    <td align="left" class='text-right' style="width: 30%;">IGV 18% S/ </td>
    <td colspan="4"  style="width: 30%; text-align: right"><?php echo number_format($total_iva,2);?></td>
    </tr>
<tr>
    
    <td class='text-right' >----------------------------------------------------------------------------------------------------</td>
    <td align="left" class='text-right' style="width: 20%;" >TOTAL S/ </td>
    <td colspan="4" style="width: 20%; text-align: right"><?php echo number_format($total_factura,2);?></td>
    </tr>
        </table>
	 
<?php } ?>
</page>
