
<?php 
   

require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");

$productocontrol = new productocontroller();
$producto = new producto();


$productos = array();
$i=1;
foreach ($productocontrol->listar() as $producto){
    $stock=$producto->getstock();
     $stockmin=$producto->getStockmin();
    $editar = '<button type="button" onclick="modalproducto('.$producto->getId().')" class="btn btn-primary modiunida" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
    $agregar = '<button type="button" onclick="agregarstock('.$producto->getId().')" class="btn btn-success" data-toggle="modal" data-target=".bd-agregarstock"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>';
    $eliminar = '<button type="button" onclick="eliminarproducto('.$producto->getId().')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
    
     if($stock<=$stockmin){
            $color = '#F7C5C4';
     }else {
        $color = '#FFFFFF';
     }
$array = [
    "item" => $i,
    "descripcion" => $producto->getdescripcion(),
    "preciov" =>  $producto->getPrecio(),
    "precioc" =>  $producto->getPrecioc(),
    "stockmin"=> number_format($producto->getStockmin(),2),
    "stockmax"=> number_format($producto->getStockmax(),2),
    "stockc"=> number_format($producto->getstock(),2),
    "unidmedc" => $producto->getUnidmedc(),
    "stockv" => number_format($producto->getStock()*$producto->getFactor(),2),
    "unimedv" =>$producto->getUnidmedv(),
    "observacion" =>$producto->getObservacion(),
    "abreviatura" =>$producto->getidunidmed(),
    "codigo" =>$producto->getCodigo(),
    
    "acciones" => $editar.' '.$agregar.' '.$eliminar
];
array_push($productos, $array);
    $i++;
}

//$data[] = $daopersona->buscar("",1);
//$json_data = array(
////        "Ruc"   => $persona->getRucDni(),
////        "Nombre"    => $persona->getNombre().' '.$persona->getApellido(),
////        "Domiciliof" => $persona->getDomiciliofiscal(),
////        "Domicilior" => $persona->getDomicilioreal(),
////        "Telefono" => $persona->getTelefono(),
//        "data" => $data
//        );


echo '{"data":'.json_encode($productos).'}';  // send data as json format
//echo json_encode($personas);




  