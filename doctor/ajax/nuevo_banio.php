<?php
date_default_timezone_set('America/Lima');
	$fila =0;
if ( empty($_POST['txtid']) || empty($_POST['txtf']) || empty($_POST['txtiddoctor']) || empty($_POST['textcodigo']) || empty($_POST['textdescrip']) || empty($_POST['texttotal'])){  
        $errors[] = "Verifique Datos";
}  elseif (
         !empty($_POST['txtid']) && !empty($_POST['txtf']) && !empty($_POST['txtiddoctor'] && !empty($_POST['textcodigo']) && !empty($_POST['textdescrip']) && !empty($_POST['texttotal'])) 
        
        ) {
            

    require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/baniocontroller.php");
    require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/banio.php");

        $id =strip_tags($_POST["txtid"],ENT_QUOTES); 
        $fecha = strip_tags($_POST["txtf"],ENT_QUOTES);
        $iddoc = strip_tags($_POST["txtiddoctor"],ENT_QUOTES); 
        $codigo = strip_tags($_POST["textcodigo"],ENT_QUOTES); 
        $descrip = strip_tags($_POST["textdescrip"],ENT_QUOTES); 
        $total = strip_tags($_POST["texttotal"],ENT_QUOTES); 
        $idprod = strip_tags($_POST["txtidprod"],ENT_QUOTES); 
//        $idprod = $_POST['txtidprod'];
	
        $banio = new banio();
        $controlbanio = new baniocontroller();
        
        $banio->setCodigo($codigo);
        $banio->setDescripcion($descrip);
        $banio->setId_mascota($id);
        $banio->setIddoctor($iddoc);
        $banio->setPrecio($total);
        $banio->setFecha($fecha);
        $banio->setFacturado(0);
        $banio->setIdprod($idprod);
        
        
        $fila = $controlbanio->insert($banio); 
        
        }
        
        echo $fila;
        
           
?>