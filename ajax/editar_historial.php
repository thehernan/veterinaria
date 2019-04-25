

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
       
        $historial = new historialmedico();
      


        $iddoctor= strip_tags($_POST["txtiddoctor"],ENT_QUOTES);
     
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
     
        $id =  strip_tags($_POST["txtidhist"],ENT_QUOTES);

        
        
        

//        echo 'iddocto '.$iddoctor;
        $historial->setId($id);
        
        $historial->setIddoctor($iddoctor);
       
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
      
        
        

//        foreach ($tempcontrol->selectid($iduser, 'historia') as $temp){
//            echo $temp->getDescripcion();
//
//        }

           
            
//            var_dump($analisis);
            $analisis = $_FILES['fileanalisis'];
            $tipo = $analisis['type'];
            $limite_kb = 16384;
        
        if ($tipo == "image/jpg" || $tipo=="image/jpeg" || $tipo== "image/png" && $_FILES['fileanalisis']['size'] <= $limite_kb * 1024 && $_FILES['fileanalisis']['name']){
            
            
            $analisisb64 = base64_encode(file_get_contents($analisis["tmp_name"]));
            
//             $permitidos = array("image/jpg", "image/jpeg", "image/png");
            
      
            $historial->setAnalisisfoto($analisisb64);

            } else {
                 $historial->setAnalisisfoto('');
            }
            
           $fila =  $historialcontrol->updateficha($historial);
           
          
           
           if($fila > 0){
               
              echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Editado con éxito!</strong> 
					
			</div>';
               
               
           }else{
               echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No se realizarón cambios :(!</strong> 
					
			</div>';
               
           }
           
       

        
 
}