<?php 
$cli=$_GET['idc'];
$ma=$_GET['idm'];
echo $cli.$ma;

	include(".../config/db.php");
	include(".../config/conexion.php"); 	
$sql="SELECT * FROM mascota m inner join cliente c on c.id_cliente=m.id_cliente where m.id_mascota='".$ma."' and m.id_cliente='".$cli."'";
 $execute=mysqli_query($conexion,$sql);
echo $sql;
$fila=mysqli_fetch_assoc($execute);
?>
<!doctype html>
<html>
<img src=""
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="description" content="">
<title>DVI | Veterinaria</title>
<link rel="stylesheet" href="css/dvi.css">
</head>

<body>
<div id="header_menu">
	<p><b>Documento DVI</b></p>
</div>
 
<div id="content_admin">
	<h2>DVI</h2>
	<div class="seccion">			
		<div class="bloque_mitad">
        	<center>
            <div class="mitad_dvi">
            	<div class="bloque_superior">
                	<div id="text-superior">
                    VETERINARIA GRAUf
                    </div>
                    <div id="text-centro-superior">
                    REGISTRO VETERINARIO DE IDENTIFICACION
                    <span>DOCUMENTO VETERINARIO DE IDENTIDAD</span>
                    </div>
                    <div id="text-derecha-superior">
                    	<div id="cui">CUI</div>
                    	<div id="abr_dvi">DVI <span id="dvi">0000</span><span id="num_dvi"> - 2171</span></div>
                    </div>
                </div>
                
                <div class="bloque_inferior">
                	<!--<div id="logo">
                    	<img src="img/logo.jpg" width="125" height="125">
                    </div>-->
                    <div id="foto_dvi">
                    	<?php echo'<img src="data:image/jpg;base64 , ' .$fot=$fila['foto']. '"  width="48.19" height="70.87"/>' ?>
                    
                    </div>
                	<div id="datos_dvi">
                    	<div class="tit_dat">Nombre</div>
                        	<div class="dato_animal">JACK</div>
                        <div class="tit_dat">Especie</div>
                        	<div class="dato_animal">CANINO</div>
                        <div class="tit_dat">Fecha de Nacimiento</div>
                        	<div class="dato_animal">14/11/2016</div>
                        <div class="tit_dat">Sexo</div>
                        	<div class="dato_animal">MACHO</div>
                        <div class="tit_dat">Raza</div>  
                        	<div class="dato_animal">COCKER</div>                                              
                    </div>
                    <div class="fecha_dvi_animal">
                    	<div class="fech_dvi_data">
                        	<div class="tit_fecha">Fecha de Inscripcion</div>
                            <div class="fech_dato">
                            20 10 2016
                            </div>
                        </div>
                        <div class="fech_dvi_data">
                        	<div class="tit_fecha">Fecha de Emision</div>
                            <div class="fech_dato">
                            05 04 2017
                            </div>
                        </div>
                        <div class="fech_dvi_data_">
                        	<div class="tit_fecha">Fecha de Caducidad</div>
                            <div class="fech_dato_cad">
                            05 10 2018
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
                        <span>CANINO<<<< JACK <<<<<<<<<<<<<<< </span>
                        </div>
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
                    <div id="nombre_propietario"> YULIANA </div>
                    <div id="apellido_propietario"> ALAMO SERRANO</div>
                    <br><br>
                    <div id="domicilio">Domicilio: </div>
                    <div id="direccion"> Av. TACNA 912 - PIURA - CASTILLA </div>
                    <br>
                    <div id="domicilio">Telefono: </div>
                    <div id="direccion"> 933721871 </div>
                    
                    
                </div>
                <div id="huella">
                </div>
                
                <div id="estados">
                	<div id="ciudades">
                    	<div class="dep"> 
                            <span>Distrito</span><br>
                            <span>PIURA</span>
                            <br>
                            <br>
                            <span>Observaciones</span>
                        </div>
                        <div class="dep"> 
                       		<span>Provincia</span><br>
                            <span>PIURA</span>
                        </div>
                        <div class="dep">
                        	<span>Departamento</span><br>
                            <span>PIURA</span>
                        </div>
                    </div>
                    
                    <div id="img_cod">
                    </div>
                    <div id="cod_barras">
                    </div>
                    
                
                </div>
            </div>
            </center>
        </div>
    </div>
    
</div>
</body>
</html>