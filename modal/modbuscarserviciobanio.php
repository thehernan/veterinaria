

         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de servicios Baños
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
                                         require_once ("config/db.php");

                                         require_once ("config/conexion.php");

                                        $s=1;
                                        $sql="SELECT * FROM producto p inner join lote as l
                                        on p.id_producto = l.id_producto where  p.lote = 1 and  l.cantidad >0 and  categoria ='baños'
                                        UNION ALL
                                        SELECT * FROM producto p left join lote as l
                                        on p.id_producto = l.id_producto where   categoria ='baños'" ;
                                        //echo $sql;
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row= mysqli_fetch_row($execute)){


                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php echo $row[2]; ?></td>

                                        
                                            <td class="center"><?php echo $row[10]; ?></td>
                                           
                                          
                                            <td><input type="text" name="precio_<?= $row[0] ?>" id="precio_<?= $row[0] ?>" value='<?= number_format($row[14]/$row[16],2); ?>' > </td>
                                            <td class="center"><input type="text" name="cantidad_<?= $row[0] ?>" id="cantidad_<?= $row[0] ?>" value="1" readonly="readonly"></td>
                                            <td class="center">
                                                

                                                <button class='btn btn-primary' onclick="agregarprodbanio(<?php echo $row[0]?>,'<?php echo $row[1]?>','<?php echo $row[2]?>','<?php echo $op ?>')"><i class='fa fa-plus fa-fw'></i></button>

                                              
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
