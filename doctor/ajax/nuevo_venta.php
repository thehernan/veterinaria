

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
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/documentocontrolller.php");   
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historialcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/tempcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/documento.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
        
        
       
       
        
        $historialcontrol = new historialcontroller();
        $documentocontrol = new documentocontroller();
        $tempcontrol = new tempcontroller();
        $documento = new documento();
        $temp = new Temp();
      
//        $idmov = $_POST['tipomovi'];
        $idcliente =$_POST['txtid'];
//        $iddoc = $_POST['txtiddoc'];
//        $idarea = $_POST['area'];
        $op = $_POST['op'];
       
         $area = $_POST['area']; 
         
         ///////
         $comprobante = $_POST['txtcomprobante'];
         $cliente = $_POST['txtclien'];
         $clientedirec = $_POST['txtdireccion'];
         $clientetipodoc = $_POST['txttipodoc'];
         $clientedoc = $_POST['txtrucdni'];
         $clienteemail = $_POST['txtemail'];
         $total = $_POST['total'];
         
        $documento->setIdmov(1);
        $documento->setIdcliente($idcliente);
//        $documento->setIdoctor($iddoc);
        $documento->setIdarea($area);
        $documento->setIdusuario($iduser);
        
        ////
        $documento->setComprobante($comprobante);
        $documento->setTipodoccliente($clientetipodoc);
        $documento->setNumerodoccliente($clientedoc);
        $documento->setRazonsocial($cliente);
        $documento->setDireccion($clientedirec);
        $documento->setEmail($clienteemail);
        $documento->setTotal($total);
        
        
        
//        foreach ($tempcontrol->selectid($iduser, 'historia') as $temp){
//            echo $temp->getDescripcion();
//            
//        }
       
//    var_dump($documento);
   
     
             if(!empty($_POST['iddoctor'])){
             $iddoc = $_POST['iddoctor'];
             $documento->setIdoctor($iddoc);
            
        }
       
        
        
        $temparray = $tempcontrol->selectid($iduser, $op,'admin');
        
//        var_dump($temparray);
        echo $valida =$documentocontrol->insert($documento, $temparray);
        
     
        
        
		
            
            
                    if ($valida!=0) {
                        $tempcontrol->delete($iduser,'admin',$op);
                        
                        if(!empty($_POST['idhistorial'])){
                            $historialcontrol->update($_POST['idhistorial']);


                       }


                         if(!empty($_POST['idbanio'])){
                            require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/baniocontroller.php");
                           $controlbanio = new baniocontroller();
                            $controlbanio->facturar($_POST['idbanio']);


                       }
            
                        
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
        
        
      
   
		


  