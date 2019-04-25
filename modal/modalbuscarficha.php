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
                                            <th>Nombre / Razón Social</th>
                                            <th>Paciente</th>
                                            <th>Doctor Atención</th>      
                                            <th>Total</th>
                                            
                                            <th>Facturar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         
                                        $s=1;
                                        $sql="SELECT
                                        masc.id_mascota AS n,
                                        cl.nombre AS client,
                                        cltipo.op,
                                        cl.direccion,
                                        cl.dni,
                                        cl.email,
                                        masc.nombre,
                                        CONCAT(
                                                doc.nombre,
                                                ' ',
                                                doc.apellidos
                                        ) AS doct,
                                        facturado,
                                        doc.iddoctor,
                                        cl.id_cliente,
                                        hist.id_historial,
                                        sum(serv.precio) as total
                                FROM
                                        historialmedico AS hist
                                INNER JOIN historialservicios as serv on serv.id_historial=hist.id_historial
                                INNER JOIN doctor AS doc ON doc.iddoctor = hist.iddoctor
                                INNER JOIN mascota AS masc ON masc.id_mascota = hist.id_mascota
                                INNER JOIN cliente AS cl ON cl.id_cliente = masc.id_cliente
                                INNER JOIN cliente_tipo_documento AS cltipo ON cltipo.id_tipo_documento = cl.id_tipo_documento
                                WHERE
                                        facturado = FALSE
                                AND hist.activo = 1 group by hist.id_historial order by hist.id_historial ASC";
                                        $execute=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($execute)){
                                            
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php $i=$s++; echo $i; ?></td>
                                            <td><?php  echo $row['n']; ?></td>
                                            <td><?php echo $row['client']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td class="center"><?php echo $row['doct']; ?></td>
                                            <td class="center"><?php echo number_format($row['total'],2); ?></td>
                                           
                                                
                                                <?php if ($row['facturado']==0){ ?>
                                            
                                           
                                            
                                          
                            <td class="center"><button  class="btn btn-success" type="button" onclick="cargarhistventa('<?php echo $row['client'] ?>','<?php echo $row['direccion'] ?>','<?php echo $row['dni'] ?>','<?php echo $row['email'] ?>','<?php echo $row['id_cliente'] ?>',
                                '<?php echo $row['doct'] ?>','<?php echo $row['iddoctor'] ?>','<?php echo $row['op'] ?>',<?php echo $row['id_historial'] ?>,<?php echo $row['n'] ?>)" ><i class="fa fa-money"></i></button></td>
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