
<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/codigosunatcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/codigosunat.php");

$codigosunatc= new codigosunatcontroller();
?>
<div class="modal fade" id="codigosunat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Codigo Sunat </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover datatable" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Codigo</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $codigosu = new codigosunat();
                            $i = 0;
                            foreach ($codigosunatc->listar() as $codigosu){


                            ?>
                            <tr class="odd gradeX">
                                <td><?= $i++;  ?></td>
                                <td><?php  echo $codigosu->getCodigo(); ?></td>
                                <td><?php echo $codigosu->getDescripcion(); ?></td>
                                
                               


                                <td class="center"><button  class="btn btn-success" type="button" onclick="cargarcodsunat(<?php echo $codigosu->getId(); ?>,'<?php echo $codigosu->getCodigo().' - '.$codigosu->getDescripcion(); ?>')" ><i class="glyphicon glyphicon-pushpin"></i></button></td>
                                   
                            </tr>
                        <?php }  ?>
                        </tbody>
                                </table>
                            </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->