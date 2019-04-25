

<?php
date_default_timezone_set('America/Lima');
//	$valida= false;
        
        
        if (empty($_POST['txtid'])   || empty($_POST['op'])  ){  //|| empty($_POST['txtiddoc']) || empty($_POST['tipomovi']) || empty($_POST['area']) empty($_POST['idhistorial'])
			echo "Verifique Datos";
		}  elseif (
			!empty($_POST['txtid'] )    //&& !empty($_POST['txtiddoc']) && !empty($_POST['tipomovi']) && !empty($_POST['area']&& !empty ($_POST['idhistorial'])
        ) {
               
      
	session_start();		
        $iduser=$_SESSION['user_id'];		
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/compracontrolller.php");   
       
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/tempcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/compra.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
        
        
       
       
        
      
        $controlc = new compracontroller();
        $tempcontrol = new tempcontroller();
        $documento = new compra();
        $temp = new Temp();
      
//        $idmov = $_POST['tipomovi'];
        $idcliente =$_POST['txtid'];
//        $iddoc = $_POST['txtiddoc'];
//        $idarea = $_POST['area'];
        $op = $_POST['op'];
       
//         $area = $_POST['area']; 
         
         ///////
         $comprobante = $_POST['txtcomprobante'];
//         $cliente = $_POST['txtclien'];
//         $clientedirec = $_POST['txtdireccion'];
       
       
//         $clienteemail = $_POST['txtemail'];
         $total = $_POST['total'];
         
         $serie =$_POST['txtserie'];
         $numero = $_POST['txtnumero'];
         $fecha = $_POST['txtfechac'];
        
         
        $documento->setSerie($serie);
        $documento->setNumero($numero);
        $documento->setFecha($fecha);
        $documento->setIdproveedor($idcliente);
//        $documento->setIdoctor($iddoc);
     
        
        ////
      
        
//        $documento->set($cliente);
//        $documento->setDireccion($clientedirec);
//        $documento->setEmail($clienteemail);
        $documento->setTotal($total);
        
        
        
//        foreach ($tempcontrol->selectid($iduser, 'historia') as $temp){
//            echo $temp->getDescripcion();
//            
//        }
       
//    var_dump($documento);
   
     
       
        
        
        $temparray = $tempcontrol->selectid($iduser, $op,'admin');
        
//        var_dump($temparray);
        echo $valida =$controlc->insert($documento, $temparray);
        
     
        
        
		
            
            
                    if ($valida!=0) {
                        $tempcontrol->delete($iduser,'admin',$op);
                        
                       

                    
            
                        
//                        $messages[] = "Nuevo Historial Registrado con éxito.";
                    } 
                    
//                    else {
////                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
//                    }
                
                    
                    
                    
                    
//                      
//                    $datos = array();
////                    $tempres = new Temp();
//            //        var_dump($temparray);
//
//                    foreach ($temparray as $temp){
//                         $array = [
//                        "idcliente"=>$idcliente,
//            //            "iddoctor"=>$iddoc,
//                        "valida"=>$valida,
//                        "descripcion" => $temp->getDescripcion(),
//                        "cantidad" => $temp->getCantidad(),
//                        "precio" =>$temp->getPrecio(),
//                        "importe"=> $temp->getCantidad()*$temp->getPrecio()];
//            //          
//                        array_push($datos, $array); 
//            //            
//                    }
//            //        
//            //        
//                    echo json_encode($datos);
                    
                    
            
         }
        
        
      
   
		


  