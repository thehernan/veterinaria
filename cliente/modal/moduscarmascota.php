              <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Mascotas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Nombre</th>
                                            <th>Especie</th>
                                            <th>Raza</th>
                                            <th>Sexo</th>
                                            <th>Pelaje</th>
                                            <th>Dueño</th>
                                            <th>+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        $s=1;
                                        $sql="SELECT * FROM mascota m inner join cliente c on c.id_cliente=m.id_cliente where c.id_cliente='".$_SESSION['user_id']."' ";
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row= mysqli_fetch_row($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php echo $row[2]; ?></td>
                                            <td class="center"><?php echo $row[3]; ?></td>
                                            <td class="center"><?php echo $row[4]; ?></td>
                                            <td class="center"><?php echo $row[5]; ?></td>
                                            <td class="center"><?php echo $row[16].' '.$row[17]; ?></td>
                                            <td class="center"><button  cod='<?php echo $row[0];?>' class="btn btn-success asignarmasc" type="button" >
                                                   
                                                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
                                                </button></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                                                 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
            </div>