<?php 

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historialcontroller.php");
$historiacontrol= new historialcontroller();

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
   
    $arrayhistoria = $historiacontrol->selecthistoriaid($id);
//    var_dump($arrayhistoria);
    foreach ($arrayhistoria as $historia){
//        echo $historia->getAnalisisfoto();
        echo'<img src="data:image/jpg;base64 , ' .$historia->getAnalisisfoto(). '" alt="No adjunto">' ;
    }
}




        
?>

