<?php 
require_once 'functions/excel.php';

activeErrorReporting();
noCli();

require_once ('PHPExcel/Classes/PHPExcel.php');




$objPHPExcel = new PHPExcel();

$desde = $_POST['from'];
$hasta = $_POST['to'];


require_once ("config/DataSource.php");
//
//
$data_source = new DataSource();
$data_tabla = $data_source->ejecutarconsulta("SELECT fecha,serie,numero,pro.nombre,pro.numerodoc,det.descripcion,det.cantidad,det.precio,det.cantidad*det.precio as importe,'Entrada' as op,det.id_producto from compra as c inner JOIN detalle_compra as det
on c.id_compra=det.id_compra INNER JOIN proveedor as pro on c.id_proveedor=pro.id_proveedor where fecha BETWEEN ? and ?
union ALL
SELECT fecha,serie,numero,cl.nombre,cl.dni,de.descripcion,de.cantidad,de.precio,de.cantidad*de.precio as importe,'Salida' as op,de.id_producto from documento as d INNER JOIN detalle as de 
on d.id_documento=de.id_documento INNER JOIN cliente as cl on cl.id_cliente=d.id_cliente where fecha BETWEEN ? and ? order by  id_producto,fecha ASC;",array($desde,$hasta,$desde,$hasta));

        


// Set document properties
$objPHPExcel->getProperties()->setCreator("vtechnology")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);            

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'Fecha')
            ->setCellValue('C1', 'Serie')
            ->setCellValue('D1', 'Numero')
            ->setCellValue('E1', 'Razón Social o Denominación')
            ->setCellValue('F1', 'RUC')
            ->setCellValue('G1', 'Descripción')
            ->setCellValue('H1', 'Cantidad')
            ->setCellValue('I1', 'Precio')
            ->setCellValue('J1', 'Total')
            
            ->setCellValue('K1', 'Operación')
            ->setCellValue('L1', 'Cant - Saldo.F')
            ->setCellValue('M1', 'Costo Unit. - Saldo.F')
            ->setCellValue('N1', 'Costo Total - Saldo.F');


            

    $i = 2;
    $sumcantidad=0;
    $ultimo =0;
   foreach ($data_tabla as $clave => $valor){
       $op = $data_tabla[$clave]["op"];
       $cantidad = $data_tabla[$clave]["cantidad"];
       $precio = $data_tabla[$clave]["precio"];
       $importe = $precio * $cantidad;
       $primero = $data_tabla[$clave]["id_producto"];
       
       if($primero!=$ultimo){
           $ultimo = $primero;
           $sumcantidad=0;
       }
       
       
       if($op=='Entrada'){
           $sumcantidad = $sumcantidad+$cantidad;
           
       }else {
           $sumcantidad = $sumcantidad-$cantidad;
           
       }
  
       
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $i-1)
            ->setCellValue("B".$i, $data_tabla[$clave]["fecha"])
            ->setCellValue("C".$i, $data_tabla[$clave]["serie"])
            ->setCellValue("D".$i, $data_tabla[$clave]["numero"])
            ->setCellValue("E".$i, $data_tabla[$clave]["nombre"])
            ->setCellValue("F".$i, $data_tabla[$clave]["numerodoc"])
            ->setCellValue("G".$i, $data_tabla[$clave]["descripcion"]) 
            ->setCellValue("H".$i, $cantidad)
            ->setCellValue("I".$i, number_format($precio,2))
            ->setCellValue("J".$i, number_format($importe,2))
            ->setCellValue("K".$i, $op)
            ->setCellValue("L".$i, $sumcantidad)
            ->setCellValue("M".$i, $precio)
            ->setCellValue("N".$i, $sumcantidad*$precio);
           
         
        $i++;
        

}


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setTitle('Inventario');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;