<?php
    error_reporting(0); //hide php errors
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");
	include('../../convertirmoneda.php');

	$des= $_GET['des'];
	$hasta= $_GET['hasta'];
	$doctor= $_GET['doctor'];
	
	$tipo=1;
	//$id_vendedor=$_SESSION['user_id'];
	
	 $sqlbus='SELECT det.cantidad,CONCAT(c.nombre," ",c.apellidos) as vcliente,det.codigo,det.descripcion,
det.precio  
 from documento as doc INNER JOIN cliente as c 
 on doc.id_cliente=c.id_cliente  inner JOIN detalle as det on doc.id_documento=det.id_documento where doc.fecha BETWEEN "'.$des.'" and "'.$hasta.'" and doc.iddoctor='.$doctor;
    $sql_count=mysqli_query($conexion,$sqlbus);
                           // echo $sqlbus;
	
	 
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No se encontro Productividad')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

if ($tipo==1){
	
//	$des= $_GET['des'];
//	$hasta= $_GET['hasta'];
//	$doctor= $_GET['doctor'];
//	
//	
$sql_factura=mysqli_query($conexion,'SELECT concat(nombre," ",apellidos) from doctor where iddoctor='.$doctor);
						
	$rw_factura=mysqli_fetch_row($sql_factura);
//						$cantidad=$rw_factura[0];
//						$uv=$rw_factura[1]; 
//						$c=$rw_factura[2]; 
//						$d=$rw_factura[3]; 
//						$pc=$rw_factura[4]; 
//						$p=$rw_factura[5]; 
//						$tv=$rw_factura[6];  
//						$tc=$rw_factura[7];
//						$u=$rw_factura[8];
						$doc=$rw_factura[0];
                       
//	  $sqsum='SELECT sum(preciocompra/prod.factor * det.cantidad) as ttventa,
//sum(det.cantidad*det.precio) ttcosto,
//sum((preciocompra/prod.factor * det.cantidad)-(det.cantidad*det.precio))as tutilidad
//from documento as doc
//inner JOIN detalle as det on doc.id_documento=det.id_documento
//INNER JOIN producto as prod on prod.id_producto=det.id_producto where doc.fecha BETWEEN "'.$des.'" and "'.$hasta.'" and doc.iddoctor="'.$doctor.'"';
//	
//	 $sql=mysqli_query($conexion,$sqsum);
//	 $fila=mysqli_fetch_assoc($sql);
//	 $tv=$fila['ttventa'];
//	 $tc=$fila['ttcosto'];
//	 $tu=$fila['tutilidad'];
					   

}
	$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/productividad_doc_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('productividad_doc.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    
