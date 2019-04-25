         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Productos
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Descripción</th>
                                            
                                            <th>Existencias</th>
                                            <th>Unid. Venta</th>
                                            
                                            <th>Fechs exp.</th>
                                            <th>N° Lote</th>
                                            <th>R.S</th>
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
                                             require_once ("config/db.php");
			                     
                                             require_once ("config/conexion.php");
                                                      
                                        $s=1;
                                        $sql="SELECT * FROM producto p inner join lote as l 
                                        on p.id_producto = l.id_producto where  p.lote = 1 and  l.cantidad >0 
                                        UNION ALL
                                        SELECT * FROM producto p left join lote as l 
                                        on p.id_producto = l.id_producto where  p.lote = 0";
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php echo $row['descripcion']; ?></td>
                                            
                                            <td class="center"><?php echo $row['stock']*$row['factor']; ?></td>
                                            <td class="center"><?php echo $row['unidmedventa']; ?></td>
                                            <td class="center"><?php echo $row['fecha_expiracion']; ?></td>
                                            <td class="center"><?php echo $row['nlote']; ?></td>
                                            <td class="center"><?php echo $row['rs']; ?></td>
                                            <!--<td class="center"><?php // echo $row['cantidad']*$row['factor']; ?></td>-->
                                            <td class="center"><?php echo $row['observacion']; ?></td>
                                            <td class="center"><?php echo $row['codigo']; ?></td>
                                            <td><?php //echo $row['precio']; ?><input type="text" name="precio" id="precio" value="<?php echo number_format($row['precio']/$row['factor'],2); ?>"> </td>
                                            <td class="center"><input type="text" name="cantidad" id="cantidad" value="1"></td>
                                            <td class="center">
                                                <!--<button  cod='<?php echo $row['id_producto'];?>' pre='<?php echo $row['precio'];?>' st='<?php echo $row['stock'];?>' factor='<?php echo $row['factor'];?>'  class="btn btn-success btnAgregaVenta" type="button" >+</button>-->
                                                
                                            	<a class='btn btn-primary' onclick="agregarprod(<?php echo $row['id_producto']?>,'<?php echo $row['codigo']?>','<?php echo $row['descripcion']?>','<?php echo $op ?>')"><i class='fa fa-plus fa-fw'></i></a>
                                              
                                                
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
