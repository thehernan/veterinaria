<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Citas por atender
                        </div>
                        <div class="panel-body">
                             <div id="resultados_usu"></div>
                             <div class="table-responsive" id="resul">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>nota</th>
                                            <th>asunto</th>                               
                                            <th>Mascota</th>
                                             <th>Dueño</th>
                                            <th>Atender</th>
                                            <th>Mis Mascotas</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          require_once ("config/db.php");
			                                require_once ("config/conexion.php");
                                        $s=1;
                                        $sql="SELECT * FROM eventos c
                                                inner join mascota m on m.id_mascota=c.id_cliente
                                                inner join cliente cl on cl.id_cliente=m.id_cliente where c.atendido=0;";
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row= mysqli_fetch_row($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><strong><?php echo  $row[7].' - '.$row[8]; ?></strong></td>
                                            <td><?php echo $row[2]; ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                           
                                           
                                            <td class="center"><?php echo $row[13].' - ' .$row[14]; ?></td>
                                            <td class="center"><?php echo $row[28].' - ' .$row[29]; ?></td>
                                            <td>
                                                  <a href="nuevo_historial.php" <button type="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                                      <strong><?php echo $row[7]; ?></strong>
                                            </td>
                                            <td class="center">
                                               
                                                 <a class="btn btn-success" href="modmismacotas.php?cod=<?php echo $row[27]; ?> & nom=<?php echo $row[28].' '.$row[29];?> " <button type="button" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                                 <a href="#" class="btn btn-default" title="Borrar usuario" onclick="eliminarcitas('<?php echo $row[0]; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
                                                 
                                                 <?php if($row[12]==0){ ?>
                                                 <a href="#" class="btn btn-danger" title="Confirmar cita" onclick="confirmarcita('<?php echo $row[0]; ?>',1)"><i class="glyphicon glyphicon-minus"></i> </a>
                                                 <?php } else { ?>
                                                 <a href="#" class="btn btn-primary" title="Confirmar cita" ><i class="glyphicon glyphicon-check"></i> </a>
                                                 <?php } ?>
                                            </td>
                                           
                                        </tr>
                                    <?php } mysqli_close($conexion); ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>