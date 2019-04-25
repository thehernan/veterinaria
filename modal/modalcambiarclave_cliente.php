

<div class="modal fade" id="cambioclaveclient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cambio clave </h4>
            </div>
            <div class="modal-body">
                <form id="formcambioclaveclient"> <!-- -->             		
                      		
                    <input  id="id" name="id" type="hidden" >
<!--                    <input  id="clavebd" name="clavebd" type="hidden" >-->

<!--                    <div class="form-group">
                            <label for="claveingre">Antigua clave:</label>
                            <input class="form-control" id="claveingre" name="claveingre" type="password" required >
                    </div>-->

                     <div class="form-group">
                            <label for="nclave">Nueva Clave:</label>
                            <input class="form-control" id="nclave" name="nclave" type="password" required>
                    </div>

                    <div class="form-group">
                            <label for="repnclave">Repetir Clave:</label>
                            <input class="form-control" id="repnclave" name="repnclave" type="password" required>
                    </div>

                   
                      
                    <button type="submit" class="btn btn-primary">Guardar</button>
               </form>
              
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