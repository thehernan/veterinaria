<?php 
session_start();
$cli=$_GET['idc'];
$ma=$_GET['idm'];
//echo $cli.$ma;
	include("../../config/db.php");
	include("../../config/conexion.php"); 	
$sql="SELECT * FROM mascota m inner join cliente c on c.id_cliente=m.id_cliente where m.id_mascota='".$ma."' and m.id_cliente='".$cli."'";
//echo $sql;
 $execute=mysqli_query($conexion,$sql);
$fila=mysqli_fetch_row($execute);
?>
<!doctype html>
<html>
 
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="description" content="">
<title>DVI | Veterinaria</title>
<link rel="stylesheet" href="css/dvi.css">
</head>

<body>
<div id="imprimible" class="imprimible">
<div id="content_admin">
  <div class="seccion">			
	  <div class="bloque_mitad">
        	<center>
            <div class="mitad_dvi">
          <div class="rayasdiv">
            <img src="img/rayitas2.png" >
           </div>
            
            	<div class="bloque_superior">
                	<div id="text-superior">
                    VETERINARIA GRAU
                    </div>
                    <div id="text-centro-superior">
                    REGISTRO VETERINARIO DE IDENTIFICACION
                    <span>DOCUMENTO VETERINARIO DE IDENTIDAD</span>
                    </div>
                    <div id="text-derecha-superior">
                    	<div id="cui">CUI</div>
                    	<div id="abr_dvi">DVI <span id="dvi">0000</span><span id="num_dvi"> - <?php echo $fot=$fila[12]?></span></div>
                    </div>
                </div>
                
                <div class="bloque_inferior">
                
                <div class="marcadeagua">
            <img src="../../img/transpa.png" width="110px" height="auto">
           </div>
           
           <div class="logodvi">
            <img src="img/logodvi.png" width="110px" height="auto">
           </div>
           
           
                	<!--<div id="logo">
                    	<img src="img/logo.jpg" width="125" height="125">
                    </div>-->
                    
                    <div id="foto_dvi">
                      	<?php echo'<img src="data:image/jpg;base64 , ' .$fot=$fila[9]. '"  width="67" height="85"/>' ?>
               </div>
                	<div id="datos_dvi">
                    	<div class="tit_dat">Nombre</div>
                        	<div class="dato_animal"><?php echo $fot=$fila[1];?></div>
                        <div class="tit_dat">Especie</div>
                        	<div class="dato_animal"><?php echo $fot=$fila[2];?></div>
                        <div class="tit_dat">Fecha de Nacimiento</div>
                        	<div class="dato_animal"><?php echo $fot=$fila[6];?></div>
                        <div class="tit_dat">Sexo</div>
                        	<div class="dato_animal"><?php echo $fot=$fila[4];?></div>
                        <div class="tit_dat">Raza</div>  
                        	<div class="dato_animal"><?php echo $fot=$fila[3];?></div>                                              
                    </div>
                    <div class="fecha_dvi_animal">
                    	<div class="fech_dvi_data">
                        	<div class="tit_fecha">Fecha de Inscripcion</div>
                            <div class="fech_dato">
                            <?php 
							 $fot=$fila[11];
							echo $fecha = date('d-m-Y',strtotime($fot));
							?>
                            </div>
                        </div>
                        <div class="fech_dvi_data">
                        	<div class="tit_fecha">Fecha de Emision</div>
                            <div class="fech_dato">
                            <?php 
							echo date('d-m-Y')
							?>
                            </div>
                        </div>
                        <div class="fech_dvi_data_">
                        	<div class="tit_fecha">Fecha de Caducidad</div>
                            <div class="fech_dato_cad">
                            <?php 
							$fecha = date('d-m-Y');
							$nuevafecha = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;
							$nuevafecha = date ( 'd-m-Y' , $nuevafecha );
 
							echo $nuevafecha;
							?>
                            </div>
                        </div>
                    </div>
                	
                    <div class="datos_codf">
                    	<div class="dat_codf">
                        <span> I< PER00000001<4<<<<<<<<<<<<<<< </span>
                        </div>
                        <div class="dat_codf">
                        <span> 09 01200M1810057PER<<<<<<<<<<<<0 </span>
                        </div>
                        <div class="dat_codf">
                        <span><?php echo $fot=$fila[2];?><<<< <?php echo $fot=$fila[1];?> <<<<<<<<<<<<<<<</span>                    </div>
                    </div>
                </div>
            </div>
            </center>
        </div>
        
        
        
        
        
        
        
        
        
        <div class="bloque_mitad">
        
        	<center>
            <div class="mitad_dvi">
            	<div id="datos_prop">
                	<div id="propietario">Propietario: </div>
                    <div id="nombre_propietario"> <?php echo $fot=$fila[16];?> </div>
                    <div id="apellido_propietario"> <?php echo $fot=$fila[17];?></div>
                    <br><br>
                    <div id="domicilio">Domicilio: </div>
                    <div id="direccion"> <?php echo $fot=$fila[18];?> </div>
                    <br>
                    <div id="domicilio">Telefono: </div>
                    <div id="direccion"> <?php echo $fot=$fila[19].'-'.$fot=$fila[20];?> </div>
                    
                    
                </div>
                <div id="huella">
             <?php 
					    $fot=$fila[2];
					   if($fot=='CANINO' or $fot=='CAN'){
					   ?>
                    <img src="img/huellaperro.jpg" width="60px" height="63px">
                    <?php }else{?>
                       <img src="img/huellagato.jpg" width="60px" height="63px">
                    <?php }?>
                </div>
                
                <div id="estados">
                <div id="ciudades">
                    	<div class="dep"> 
                            <span>Distrito</span><br>
                            <span><?php echo $fot=$fila[30];?></span>
                            <br>
                       
                            <span>Observaciones</span>
                        </div>
                        <div class="dep"> 
                       		<span>Provincia</span><br>
                            <span><?php echo $fot=$fila[31];?></span>
                        </div>
                        <div class="dep">
                        	<span>Departamento</span><br>
                            <span>PIURA</span>
                        </div>
                    </div>
                    
                    <div id="img_cod">
                     
 <img src="../../barcode.php?text=<?php echo $fot=$fila[12]; ?>&size=45&orientation=horizontal&codetype=Code39&print=false&sizefactor=1" />
                    
                   

                    </div>
                    <div class="marcad">
                    MV.EDWIN CRISANTO LOZADA 
                    </div>
                    <div class="marcad2">
                    VET.GRAU
                    </div>
                   <!-- <div id="cod_barras">
                     <img src="../../barcode.php?text=<?php echo $fot=$fila[12]; ?>&size=20&orientation=vertical&codetype=Code39&print=false&sizefactor=0.4" />
                    </div>-->
                    
                
                </div>
            </div>
            </center>
        </div>
    </div>
    
</div>
</div>
  
 
</body>
</html>