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

	$idcli= $_GET['idc'];
	$idmas= $_GET['idm'];
	$tipo=1;
	//$id_vendedor=$_SESSION['user_id'];
	$sqlbus="SELECT * FROM historialmedico where id_mascota='".$idmas."'";
    $sql_count=mysqli_query($conexion,$sqlbus);
                           // echo $sqlbus;

	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No se encontro Historial')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

if ($tipo==1){
	$idcli= $_GET['idc'];
	$idmas= $_GET['idm'];
$sql_factura=mysqli_query($conexion,"SELECT * FROM mascota m inner join cliente c on c.id_cliente=m.id_cliente 
where m.id_mascota='".$idmas."';");
	$rw_factura=mysqli_fetch_row($sql_factura);
						$mascota=$rw_factura[0];
						$nombre=$rw_factura[1]; 
						$especie=$rw_factura[2]; 
						$raza=$rw_factura[3]; 
						$sexo=$rw_factura[4]; 
						$pelaje=$rw_factura[5]; 
						$fn=$rw_factura[6];  
						$fa=$rw_factura[7];
						$ex=$rw_factura[8];
						$fo=$rw_factura[9];
						$dvi=$rw_factura[12];		
						$due=$rw_factura[16].' '.$rw_factura[17];						
						$fc=$rw_factura[11];
						$dir=$rw_factura[18];
                       

}
	$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/historial_html.php');
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
        $html2pdf->Output('historial.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    
