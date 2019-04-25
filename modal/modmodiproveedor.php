<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/cliente_tipo_doccontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/cliente_tipo_doc.php");
$tipo_doc_control = new cliente_tipo_doccontroller();
$tipo_doc = new cliente_tipo_doc();


?> 

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Proveedor
                </div>
                    <div class="modal-body">
                         <form  method="post" name="modproveedor" id="modproveedor">

                             <div class="row">

                                <div class="col-lg-6">
                                    <input type="hidden" name="txtid" id="txtid">
<!--                                        <div class="form-group"> 
                                    <label>Apellidos</label>


                                    <input type="text" name="txtape" id="txtape" placeholder="apellidos" required class="form-control">
                                </div>-->
                                 <div class="form-group">
                                    <label>Nombre / Razón Social</label>
                                    <input type="text" name="txtnom" id="txtnom" placeholder="nombres" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Domicilio</label>
                                    <input type="text" name="txtdomi" id="txtdomi" placeholder="domicilio" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Distrito</label>
                                    <input type="text" name="txtdis" id="txtdis"  required="" class="form-control">
                                </div>

                                  <div class="form-group">
                                    <label>Provinvia</label>
                                    <input type="text" name="txtpro" id="txtpro"  required="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Tipo Doc</label>
                                    <select name="idtipodoc" id="idtipodoc" required="required" class="form-control">
                                        <option value=""> Seleccione </option>
                                        <?php foreach ($tipo_doc_control->listar() as $tipo_doc ){?>
                                        <option value="<?= $tipo_doc->getId() ?>"><?= $tipo_doc->getDocumento()?></option>

                                        <?php }?>

                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>N° DOC.</label>
                                    <input type="text" name="txtdni" id="txtdni" placeholder="dni"  class="form-control">
                                </div>    
<!--                                          <div class="form-group">
                                    <label>Ruc</label>
                                    <input type="text" name="txtruc" id="txtruc" placeholder="Ruc"  class="form-control">
                                </div>-->

                             </div>

                                 <div class="col-lg-6">

                                 <div class="form-group">
                                    <label>Telf1</label>
                                    <input type="text" name="txtt1" id="txtt1" placeholder="Telefono 1"  class="form-control">
                                </div>



                                <div class="form-group">
                                    <label>Telf2</label>
                                    <input type="text" name="txtt2" id="txtt2" placeholder="Telefono 2"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="txtema" id="txtema" placeholder="email"  class="form-control">
                                </div>    
                                 <div class="form-group">
                                    <label>Pagina Web</label>
                                    <input type="text" name="txtpw" id="txtpw" placeholder="web"  class="form-control">
                                </div>   
                                    <input type="submit" name="btngrabar" id="btngrabar" value="Grabar" class="btn btn-primary">
                             </div>

                              </div>


                         </form>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                
                
                </div>
             </div>
  
</div>