<?php 
   
require_once ("../config/db.php");
require_once ("../config/conexion.php");

$datelocal = new DateTime();
//$date->modify('-2 hours');

//echo $datelocal->format('d-m-Y H:i:s');

$sql="SELECT c.inicio_normal as fecha,c.confirmar,CONCAT(cl.nombre,' ',cl.apellidos) as client,cl.telf1  "
        . "FROM eventos c inner join mascota m on m.id_mascota=c.id_cliente".
        " inner join cliente cl on cl.id_cliente=m.id_cliente where c.confirmar=0;";
$execute=mysqli_query($conexion,$sql);
$doctor = array();


$i=0;
$citas = array();

while($row=mysqli_fetch_array($execute)){
    
//    echo $row['fecha'];
////    echo $fechabd = $row['fecha'];
//    echo $row['fecha'];
    $datebd = new DateTime($row['fecha']);
    
    $datebd_h = new DateTime($row['fecha']);
    $datebd_h->modify('-2 hours');

//    echo $datebd->format('d-m-Y H:i:s').'<br>';
    
//    if($row['confirmar']==0){
        if($datebd_h <= $datelocal && $datelocal <= $datebd){
            $i++;
//            echo 'Fecha: '.$row['fecha'].' Cliente: '.$row['client'].' Telefono: '.$row['telf1'];
            $vfecha = new DateTime($row['fecha']);
            
            $array = [
            "i" => $i,
            "fecha" => $vfecha->format('H:i:s'),
            "cliente" => $row['client'],
            "celular"=> $row['telf1']];
          
            array_push($citas, $array);    
        }      
}


mysqli_close($conexion); 

echo json_encode($citas);


