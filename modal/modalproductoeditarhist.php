<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
$controlprod = new productocontroller();
$producto = new producto();
?>

         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Productos Topico
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripción</th>
                                            
                                         
                                            <th>Unid. Venta</th>

                                          
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($controlprod->listartopicosserv('topicos') as $producto){


                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $producto->getDescripcion(); ?></td>

                                        
                                            <td class="center"><?php echo $producto->getUnidmedv(); ?></td>
                                           
                                          
                                            <td><input type="text" name="precio_<?= $producto->getId() ?>" id="precio_<?= $producto->getId() ?>" value='<?= $producto->getPrecio(); ?>' readonly="readonly"> </td>
                                            <td class="center"><input type="text" name="cantidad_<?= $producto->getId() ?>" id="cantidad_<?= $producto->getId() ?>" value="1"></td>
                                            <td class="center">
                                                

                                                <button class='btn btn-primary' onclick="agregarprodhist(<?php echo $producto->getId().','.$idhistoria ?>)"><i class='fa fa-plus fa-fw'></i></button>

                                              
                                            </td>
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