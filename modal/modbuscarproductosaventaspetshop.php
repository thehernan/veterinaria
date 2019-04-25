<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/productocontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/producto.php");
$controlprod = new productocontroller();
$producto = new producto();
?>
         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                             Lista de Productos Petshop
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripción</th>

                                            <th>Existencias</th>
<!--                                            <th>Unid. Venta</th>

                                            <th>Fechs exp.</th>
                                            <th>N° Lote</th>
                                            <th>R.S</th>-->
                                            <!--<th>Cantidad</th>-->
                                            <!--<th>Observación</th>-->
                                            <!--<th>CB</th>-->
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                        foreach ($controlprod->listartopicosserv('petshop') as $producto){


                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i++; ?></td>
                                            <td><?php echo $producto->getDescripcion(); ?></td>

                                            <td class="center"><?php echo $producto->getStock()*$producto->getFactor(); ?></td>
<!--                                            <td class="center"><?php // echo $row['unidmedventa']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['fecha_expiracion']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['nlote']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['rs']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['cantidad']*$row['factor']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['observacion']; ?></td>-->
                                            <!--<td class="center"><?php // echo $row['codigo']; ?></td>-->
                                            <td><?php //echo $row['precio']; ?><input type="text" name="precio_<?= $producto->getId() ?>" id="precio_<?= $producto->getId() ?>" value="<?php echo $producto->getPrecio() ?>"> </td>
                                            <td class="center"><input type="text" name="cantidad_<?= $producto->getId() ?>" id="cantidad_<?=$producto->getId() ?>" value="1"></td>
                                            <td class="center">
                                                

                                                <a class='btn btn-primary' onclick="agregarprod(<?php echo $producto->getId()?>,'<?php echo $producto->getCodigo()?>','<?php echo $producto->getDescripcion()?>','<?php echo $op ?>')"><i class='fa fa-plus fa-fw'></i></a>


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
