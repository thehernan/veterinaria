<?php
//if( !( isset($_SESSION) ) ){
//    include '../pages/is_logged.php';
//}

//
//require_once ("../dao/tempdao.php");
//require_once ("../model/temp.php");
//
//
//
//$daotemp = new TempDAO();



//$session_id= session_id();

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['op'])){$op=$_POST['op'];}
if (isset($_GET['op'])){$op=$_GET['op'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}
//if (isset($_POST['codigo'])){$codigo=$_POST['codigo'];}
//if (isset($_POST['descripcion'])){$descripcion=$_POST['descripcion'];}
if (isset($_POST['idhistorial'])){$idhist=$_POST['idhistorial'];}
//if (isset($_POST['idmov'])){$idmov=$_POST['idmov'];$movimiento = $daomov->selectid($idmov);}

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/detallehistorial.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/detallehistoriacontrolller.php");


if(empty($_SESSION['user_id'])){
    
    @session_start();
//    echo 'session';
}

if(empty($conexion)){
    require_once ("../config/db.php");
    require_once ("../config/conexion.php");
    
    
}
//$iduser = $_SESSION['user_id'];
	//Archivo de funciones PHP
//	include("../funciones.php");
if(isset($_GET['idhist'])){
    
   $idhistoria = $_GET['idhist']; 
}else{
    $idhistoria=$idhist;
    
}



if (!empty($id) and !empty($cantidad)>=0 and !empty($precio_venta)>=0   and !empty($idhist))
{   
//    echo $precio_venta;
    $control = new detallehistoriacontrolller();
    $dethistorial = new detallehistorial();
    
    $dethistorial->setCantidad($cantidad);
    $dethistorial->setPrecio($precio_venta);
    $dethistorial->setIdproducto($id);
    $dethistorial->setIdhistorial($idhist);
    
    $control->insertdetalle($dethistorial);
//    $sql = "INSERT INTO detalle_historial (cantidad,precio,id_producto,id_historial)".
//    "VALUES(".$cantidad.",".$precio_venta.",".$id.",".$idhist.")";
////    echo $sql;
//    $insert = mysqli_query($conexion,$sql);
   
//$insert_tmp=mysqli_query($con, "INSERT INTO temp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");

}
if (isset($_GET['id']) && isset($_GET['idprod']) && isset($_GET['cant']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	

$id_prod=intval($_GET['idprod']);	
$cant=intval($_GET['cant']);	


//$daotemp->borrarid($id_tmp);

     $sqldete = "call sp_eliminardetallehistoria($id_tmp,$id_prod,$cant)";
     
     mysqli_query($conexion,$sqldete);
//$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}
//$simbolo_moneda = new Moneda();



?>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
   
    <tr>
            <th class='text-center'>Codigo</th>
            <th>Descripción</th>

            <th class='text-right'>Cantidad</th>
            <th class='text-right'>Precio</th>
            <th class='text-right'>Importe</th>
            <th class='text-center'>Acciones</th>
    </tr>
  
    <?php
	$sumador_total=0;
        $cont=0;
        $sql="SELECT dh.id_detalle_h,p.codigo,p.descripcion,dh.cantidad,dh.precio,dh.cantidad*dh.precio as importe,dh.id_producto  FROM detalle_historial as dh INNER JOIN producto as p on 
            dh.id_producto=p.id_producto where id_historial=$idhistoria";
//        echo $sql;
        $resultarea=mysqli_query($conexion,$sql);
      
        while ($row=mysqli_fetch_row($resultarea)){
            
//            echo 'precio '.$row[2];
            $precio_vent=$row[4];
            $precio_venta_f=number_format($precio_vent,2);//Formateo variables
            
            $cantida = $row[3];
            $precio_total=$precio_vent*$cantida;
            $precio_total_f=number_format($precio_total,2);//Precio total formateado
           
            $sumador_total+=$precio_total;//Sumadors
            
            ?>
		<tr>
                    <td class='text-center'><?php echo $row[1];?></td>
                    
                   <td><?php echo $row[2];?></td>
                    <td class='text-right'><?php echo $cantida;?></td>
                    <td class='text-right'><?php echo $precio_venta_f;?></td>
                    <td class='text-right'><?php echo $precio_total_f;?></td>
                    <td class='text-center'><a href="#" onclick="eliminarproddethist('<?php echo $row[0] ?>','<?php echo $row[6] ?>','<?php echo $row[3] ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
            $cont++;
        }
        
	

//	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	
	$total_factura= $sumador_total;

?>

<tr>
    <td></td>
    <td class='text-right' colspan=4 ><h2 class="text-danger">Total S/ </h2></td>
    <td class='text-right'><h2 class="text-danger"><label ><?php echo number_format($total_factura,2);?></label></h2>
    <input type="hidden" id="txttotal" value="<?php echo $total_factura ?>" /></td>
	
</tr>
<input type="hidden" value="<?php echo $cont ?>" id="conttable"> <!-- contador de los elementos en la tabla -->

</table>