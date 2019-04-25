

<?php
date_default_timezone_set('America/Lima');
//	$valida= false;
        $idhistoria=0;
		if ( empty($_POST['txtid']) || empty($_POST['txtf'] || empty($_POST['txtiddoctor']))  ){  //|| empty($_POST['txtat'])  || empty($_POST['txtm'])  || empty($_POST['txtr'])
			$errors[] = "Verifique Datos";
		}  elseif (
			 !empty($_POST['txtid']) &&  !empty($_POST['txtf'] && !empty($_POST['txtiddoctor'])) //&& !empty($_POST['txtr']) !empty($_POST['txtat']) && && !empty($_POST['txtm'])
        ) {

	@session_start();
        $iduser=$_SESSION['user_id'];
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/historialcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/tempcontroller.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialmedico.php");
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/temp.php");
        
        require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/historialservicio.php");

        $historialcontrol = new historialcontroller();
        $tempcontrol = new tempcontroller();
        $historial = new historialmedico();
        $temp = new Temp();


        $iddoctor= strip_tags($_POST["txtiddoctor"],ENT_QUOTES);
        $mascota =strip_tags($_POST["txtid"],ENT_QUOTES);
//            $registro = strip_tags($_POST["txtr"],ENT_QUOTES);
//            $medicamento = strip_tags($_POST["txtm"],ENT_QUOTES);
//            $atendido = strip_tags($_POST["txtat"],ENT_QUOTES);
        $fecha = strip_tags($_POST["txtf"],ENT_QUOTES);

        $fc = strip_tags($_POST["txtfc"],ENT_QUOTES);
        $fr = strip_tags($_POST["txtfr"],ENT_QUOTES);
        $p = strip_tags($_POST["txtp"],ENT_QUOTES);
        $pam = strip_tags($_POST["txtpam"],ENT_QUOTES);
        $ps = strip_tags($_POST["txtps"],ENT_QUOTES);
        $pd = strip_tags($_POST["txtpd"],ENT_QUOTES);
        $d = strip_tags($_POST["txtd"],ENT_QUOTES);
        $cpp = strip_tags($_POST["txtcpp"],ENT_QUOTES);
        
        /////////////////////////
        $tempe = strip_tags($_POST["txttemp"],ENT_QUOTES);
        $descrip = strip_tags($_POST["textdescrip"],ENT_QUOTES);
        $diagnostico = strip_tags($_POST["textdiagnostico"],ENT_QUOTES);
        $tratamiento = strip_tags($_POST["texttratamiento"],ENT_QUOTES);
        $observa = strip_tags($_POST["textobservacion"],ENT_QUOTES);
        
        /////////////
        $consulta = strip_tags($_POST["textservicio1"],ENT_QUOTES);
        $tratamientoc = strip_tags($_POST["textservicio2"],ENT_QUOTES);
        $anlisis = strip_tags($_POST["textservicio3"],ENT_QUOTES);
        $vacuna = strip_tags($_POST["textservicio4"],ENT_QUOTES);
        $servicio = strip_tags($_POST["textservicio5"],ENT_QUOTES);
        
        $cirujia= strip_tags($_POST["textservicio6"],ENT_QUOTES);
        $intenado = strip_tags($_POST["textservicio7"],ENT_QUOTES);
        
        ///////////// servicios ///////////////////////////////////
        
        $servicios = array();
        
        
//        $servicio = null;
        if(!empty($_POST['servicio1'])){
            $histservicio = new historialservicio();
//            $idproducto= $_POST["servicio1"];
//            $precio = $_POST["textservicio1"];
            $histservicio->setIdproducto($_POST["servicio1"]);
            $histservicio->setPrecio($_POST["textservicio1"]);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio2'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio2']);
            $histservicio->setPrecio($_POST['textservicio2']);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio3'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio3']);
            $histservicio->setPrecio($_POST['textservicio3']);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio4'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio4']);
            $histservicio->setPrecio($_POST['textservicio4']);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio5'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio5']);
            $histservicio->setPrecio($_POST['textservicio5']);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio6'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio6']);
            $histservicio->setPrecio($_POST['textservicio6']);
            array_push($servicios, $histservicio);
  
        }
         if(!empty($_POST['servicio7'])){
            $histservicio = new historialservicio();
            $histservicio->setIdproducto($_POST['servicio7']);
            $histservicio->setPrecio($_POST['textservicio7']);
            array_push($servicios, $histservicio);
  
        }
        
      /////////////////// fin de servicios ///////////////////////////
        
        
        

//        echo 'iddocto '.$iddoctor;
        $historial->setIddoctor($iddoctor);
        $historial->setIdmascota($mascota);
        $historial->setFecha($fecha);
        $historial->setFc($fc);
        $historial->setFr($fr);
        $historial->setP($p);
        $historial->setPam($pam);
        $historial->setPs($ps);
        $historial->setPd($pd);
        $historial->setd($d);
        $historial->setCpp($cpp);
        //////
        $historial->setTemperatura($tempe);
        $historial->setDescripcion($descrip);
        $historial->setDiagnostico($diagnostico);
        $historial->setTratamiento($tratamiento);
        $historial->setObservacion($observa);
        $historial->setConsultacosto($consulta);
        $historial->setTratamientocosto($tratamientoc);
        $historial->setAnalisiscosto($anlisis);
        $historial->setVacunacosto($vacuna);
        $historial->setServicioscosto($servicio);
        
        $historial->setCirujia($cirujia);
        $historial->setInternado($intenado);
        
        

//        foreach ($tempcontrol->selectid($iduser, 'historia') as $temp){
//            echo $temp->getDescripcion();
//
//        }

           
            
//            var_dump($analisis);
            $analisis = $_FILES['fileanalisis'];
            $tipo = $analisis['type'];
            $limite_kb = 16384;
        
        if ($tipo == "image/jpg" || $tipo=="image/jpeg" || $tipo== "image/png" && $_FILES['fileanalisis']['size'] <= $limite_kb * 1024 ){
            
            
            $analisisb64 = base64_encode(file_get_contents($analisis["tmp_name"]));
            
//             $permitidos = array("image/jpg", "image/jpeg", "image/png");
            
      
            $historial->setAnalisisfoto($analisisb64);
            }
       
            
             $temparray = $tempcontrol->selectid($iduser, 'historia','admin');
//             
//             var_dump($temparray);
//             var_dump($historial);
//             var_dump($servicios);
            echo $idhistoria =$historialcontrol->insert($historial, $temparray,$servicios);

            if ($idhistoria!=0)
                {
               $tempcontrol->delete($iduser,'admin','historia');
               }



                   

               


        
//         else {
//           $valida=false;
//        }




//        $datos = array();
//        
//        
//        $tempres = new Temp();
//        foreach ($temparray as $tempres){
        
        
        
//             $array = [
//            "idhistoria"=>$mascota,
//            "idmascota"=>$mascota,
//            "iddoctor"=>$iddoctor,
//             "consulta"=>$consulta,
//             "tratamiento"=>$tratamientoc,
//             "analisis"=>$anlisis,
//             "vacuna"=>$vacuna,
//             "servicio"=>$servicio,
//             "cirujia"=>$cirujia,
//             "internado"=>$intenado
                     
                     
//            "valida"=>$valida,
//            "descripcion" => $tempres->getDescripcion(),
//            "cantidad" => $tempres->getCantidad(),
//            "precio"=> $tempres->getPrecio(),
//            "importe"=> $tempres->getCantidad()*$tempres->getPrecio()
               
//                     ];
//
//            array_push($datos, $array);

//        }


//        echo json_encode($datos);
        
 
}