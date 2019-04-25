         <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Lista de Fichas Clinicas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Ficha N°</th>
                                            <th>Cliente</th>
                                            <th>Paciente</th>
                                            <th>Atención</th>      
                                            <th>Total</th>
                                            
                                            <th>Facturar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         
                                        $s=1;
                                        $sql="SELECT	masc.id_mascota AS n, cl.nombre AS client,
                                        cl.direccion,	cl.dni,	cl.email,tdoc.op as tipodoc,	masc.nombre,	CONCAT(doc.nombre,' ',doc.apellidos) AS doct,
                                        facturado,doc.iddoctor,cl.id_cliente,	b.precio,b.id_banio
                                        FROM banio AS b  INNER JOIN doctor AS doc ON doc.iddoctor = b.id_doctor
                                         INNER JOIN mascota AS masc ON masc.id_mascota = b.id_mascota
                                         INNER JOIN cliente AS cl ON cl.id_cliente = masc.id_cliente INNER JOIN cliente_tipo_documento
                                               as tdoc on tdoc.id_tipo_documento=cl.id_tipo_documento   WHERE	facturado = FALSE order by id_banio ASC" ;
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php  echo $row['n']; ?></td>
                                            <td><?php echo $row['client']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td class="center"><?php echo $row['doct']; ?></td>
                                            <td class="center"><?php echo number_format($row['precio'],2); ?></td>
                                           
                                                
                                                <?php if ($row['facturado']==0){ ?>
                                            
                                           
                                            
                                          
                            <td class="center"><button  class="btn btn-success" type="button" onclick="cargarbanioventa('<?php echo $row['client'] ?>','<?php echo $row['direccion'] ?>','<?php echo $row['dni'] ?>','<?php echo $row['email'] ?>',<?php echo $row['id_cliente'] ?>,
                                '<?php echo $row['doct'] ?>','<?php echo $row['iddoctor'] ?>','<?php echo $row['tipodoc'] ?>',<?php echo $row['id_banio'] ?>,<?php echo $row['n'] ?>)" ><i class="fa fa-money"></i></button></td>
                                                <?php } ?>
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