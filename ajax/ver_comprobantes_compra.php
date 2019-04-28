<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/compracontrolller.php");

$compracontrol = new compracontroller();

if(isset($_POST['dpdesde']) && isset($_POST['dphasta']) && isset($_POST['cbtipocomprobante']) && isset($_POST['txtbuscar'])
        && isset($_POST['txtserie']) && isset($_POST['txtnumero'])){
    
    $desde =$_POST['dpdesde'] ;
    $hasta = $_POST['dphasta'];
    $comprobante = $_POST['cbtipocomprobante'];
    $buscar = $_POST['txtbuscar'];
    $serie = $_POST['txtserie'];
    $numero = $_POST['txtnumero'];
    
    
}

$documentos = $compracontrol->select($desde,$hasta, $comprobante, $buscar,$serie,$numero);



?>


<table class="table  table-hover table-bordered" id="tabladocumento">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Serie</th>
            <th>Número</th>
            <th>RUC/ DNI</th>
            <th>Nombre / Rz. Social</th>
            <th>Total</th>
            <th>Imprimir</th>
            <!--<th>Acciones</th>-->
        </tr>
    </thead>
<!--                                <tfoot>
        <tr>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Serie</th>
            <th>Número</th>
            <th>RUC/ DNI</th>
            <th>Nombre / Rz. Social</th>
            <th>Total</th>
            <th>Est. Local</th>
            <th>Est. Sunat</th>
            <th>Imprimir</th>
            <th>Acciones</th>
        </tr>
    </tfoot>-->
    <tbody >
        <?php
        foreach ($documentos as $documento) {


            echo '<tr>';

            echo '<td>' . $documento->getFecha() . '</td>';
            echo '<td>' . $documento->getComprobante() . '</td>';
            echo '<td>' . $documento->getSerie() . '</td>';
            echo '<td>' . $documento->getNumero() . '</td>';
            echo '<td>' . $documento->getNumerodoccliente() . '</td>';
            echo '<td>' . $documento->getRazonsocial() . '</td>';
            echo '<td>' . $documento->getTotal() . '</td>';

            echo '<td><button type= "button" onclick ="printcompra('.$documento->getId().')"><i class="glyphicon glyphicon-print"></i></button> </div></td>';
                                           
            echo '</tr>';
        }
        ?>



    </tbody>

</table>
<div class="pagination">
    <nav>
        <ul class="pagination"></ul>

    </nav>

</div>
