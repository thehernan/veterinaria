<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/proveedorcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/proveedor.php");
$controp = new proveedorcontroller();

$proveedor = new proveedor();


?>



<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Clientes
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Nombre / Razón Social</th>
                                            <!--<th>Nombres</th>-->
                                            <th>Telefonos</th>
                                            <!--<th>Ruc</th>-->
                                            <th>RUC / DNI</th>
                                            <th>Dirección</th>
                                            <th>Email</th>
                                            <th>+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        $s=1;
                                    
                                        foreach ($controp->listar() as $proveedor){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php echo $proveedor->getNombre() ?></td>
                                            <!--<td></td>-->
                                            <td class="center"><?php echo $proveedor->getTelf1().' / '.$proveedor->getTelf2() ?></td>
                                            <!--<td class="center"><?php // echo $row['ruc']; ?></td>-->
                                            <td class="center"><?php echo $proveedor->getNdoc() ?></td>
                                            <td class="center"><?php echo $proveedor->getDireccion() ?></td>
                                            <td class="center"><?php echo $proveedor->getEmail() ?></td>
                                            <td class="center"><button  cod='<?php echo $proveedor->getId(); ?>'  class="btn btn-success asignarproveedor" type="button" >+</button></td>
                                        </tr>
                                    <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                                                 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       </div>
            </div>
