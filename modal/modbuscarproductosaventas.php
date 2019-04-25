<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
$controlprod = new productocontroller();
$producto = new producto();

?>
         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                             Lista de Productos Farmacia
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripción</th>
                                            <th>Unid. Venta</th>
                                            <th>Fecha exp.</th>
                                             <th>N° Lote</th>
                                             <th>R.S</th>
                                            <th>Existencias</th>
                                            

                                            
                                           
                                            
                                            <!--<th>Cantidad</th>-->
                                            <th>Observación</th>
                                            <th>CB</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($controlprod->listartopicosserv('farmacia') as $producto){
                                            $i++;

                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $producto->getDescripcion(); ?></td>

                                            <td class="center"><?php echo $producto->getUnidmedv(); ?></td>
                                            <td class="center"><?php echo $producto->getFecha_exp(); ?></td>
                                            <td class="center"><?php echo $producto->getNlote(); ?></td>
                                            <td class="center"><?php echo $producto->getRs(); ?></td>
                                            <td class="center"><?php echo $producto->getStock()*$producto->getFactor() ?></td>
                                            <td class="center"><?php echo $producto->getObservacion(); ?></td>
                                            <td class="center"><?php echo $producto->getCodigo(); ?></td>
                                            <td><?php //echo $row['precio']; ?><input type="text" name="precio_<?= $producto->getId() ?>" id="precio_<?= $producto->getId() ?>" value="<?php echo $producto->getPrecio(); ?>"> </td>
                                            <td class="center"><input type="text" name="cantidad_<?= $producto->getId() ?>" id="cantidad_<?= $producto->getId() ?>" value="1"></td>
                                            <td class="center">
                                              

                                                <a class='btn btn-primary' onclick="agregarprod(<?php echo $producto->getId()?>,'<?php echo $producto->getCodigo()?>','<?php echo $producto->getDescripcion()?>','<?php echo $op ?>');"><i class='fa fa-plus fa-fw'></i></a>


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
