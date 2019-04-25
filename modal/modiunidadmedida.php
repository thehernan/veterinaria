   
<?php 
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/controller/codigosunatcontroller.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/sistemaveterinaria/model/codigosunat.php");

$codigosunatc= new codigosunatcontroller();
?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Modificar  Producto
                        </div>
                            <div class="panel-body">
                                 <form id="modicaunidadmedida" name="modicaunidadmedida" method="post">
                                        
                                     <div class="row">
                                      
                                        <div class="col-lg-6">
                                         <div class="form-group">
                                        
                                            <input type="hidden" name="txtid" id="txtid" required class="form-control">
                                        </div>
                                            
                                        <div class="form-group">
                                            <label> Codigo Barras</label>
                                            <input type="text" name="txtco" id="txtco"  readonly placeholder="CB" required class="form-control">
                                        </div>
                                            
                                         <div class="form-group">
                                          <label>Codigo Sunat</label>

                                          <input type="hidden" name="idcodsunat" id="idcodsunat">
                                          <input class="form-control" type="text" name="txtcodigosunat" id="txtcodigosunat" required>
<!---->                                         <!-- <input type="text" name="txtcodigosunat"  id="txtcodigosunat"  class="form-control"> <!-- placeholder="Codigo Sunat Obligatorio"  -->
                                          <!-- Button trigger modal -->

                                        </div>
                                            
<!--                                        <div class="form-group">
                                            <label>Codigo Sunat</label><br>

                                          <input type="hidden" name="idcodsunat" id="idcodsunat">
                                            Button trigger modal 
                                         <?php //  $codigosu = new codigosunat(); ?>
-->                                        <!--  <select name="idcodsuna" id="idcodsuna" required class="selectpicker" data-live-search="true" data-style="btn-danger">
                                                <option value=" "> Seleccionar </option>-->
                                              <?php 
                                                    
//                                              foreach ($codigosunatc->listar() as $codigosu){     
                                                ?>
                                                <!--<option value="<?php // echo $codigosu->getId();; ?>"><?php // echo $codigosu->getCodigo().' - '.$codigosu->getDescripcion(); ?> </option>-->                                                  
                                               <?php // }  ?>                                        
                                           
                                         <!--   </select>
                                          

                                        </div>-->
                                            
                                         <div class="form-group">
                                            <label>Descripción</label>
                                            <input type="text" name="txtdes" id="txtdes" placeholder="Descripción" required class="form-control">
                                        </div>
                                       <div class="form-group">
                                            <label>Precio Compra Promedio:</label>
                                            <div class="input-group">
                                            <span class="input-group-addon">S/.</span>
                                            <input type="text" class="form-control"  name="precioc" id="precioc" required aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        </div>
                                            <div class="form-group">
                                            <label>Precio Venta:</label>
                                            <div class="input-group">
                                            <span class="input-group-addon">S/.</span>
                                            <input type="text" class="form-control"  name="preciov" id="preciov" required aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        </div>
                                             <div class="form-group">
                                            <label>Unidad de compra:</label>
                                                 <!-- <input type="text" name="idunidmedcompra" id="idunidmedcompra" >-->
                                           <select  required class="form-control" name="umecom" id="umecom">
                                                <option value=" "> Seleccionar </option>
                                              <?php 
                                                    $sql2="SELECT * FROM unid_med_fis";
                                                    $exe=mysqli_query($conexion,$sql2);
                                                    while($fi=mysqli_fetch_array($exe)){
                                                    ?>       
                                           <option value="<?php echo $fi['descripcion']; ?>" ><?php echo $fi['descripcion']; ?></option>
                                               <?php } ?>
                                            </select>
                                        </div>   
                                            <div class="form-group">
                                            <label>Unidad de venta:</label>
                                               <!-- <input type="text"  name="idunidmedventa" id="idunidmedventa" >-->
                                        <select required class="form-control"  name="umeven" id="umeven">
                                                <option value=" "> Seleccionar </option>
                                              <?php 
                                                     $sql1="SELECT * FROM unid_med_fis";
                                                    $e=mysqli_query($conexion,$sql1);
                                                while($f=mysqli_fetch_array($e)){     
                                                ?>
                                           <option value="<?php echo $f['descripcion']; ?>"><?php echo $f['descripcion']; ?> </option>                                                  <?php }  ?>                                        
                                            </select>
                                                
                                                
                                                
                                         
                                        </div>   
                                         </div>
                                            <div class="col-lg-6">
                                             <div class="form-group">
                                            <label>Factor</label>
                                            <input type="number" min="1" name="factor" id="factor" placeholder="Factor" required class="form-control">
                                            </div> 
                                             <div class="form-group">
                                            <label>Stock Min.</label>
                                            <input type="number" min="1" name="stockmin" id="stockmin" placeholder="Factor" required class="form-control">
                                            </div> 
                                             <div class="form-group">
                                            <label>Stock Max.</label>
                                            <input type="number" min="1" name="stockmax" id="stockmax" placeholder="Factor" required class="form-control">
                                            </div> 
                                            <div class="form-group">
                                            <label>Tipo:</label>
                                           <select name="idunidmed" id="idunidmed" required class="form-control" >
                                                <option value=" "> Seleccionar </option>
                                              <?php 
                                                     $sql="SELECT * FROM unidadmedida";
                                                    $uni=mysqli_query($conexion,$sql);
                                                while($fila=mysqli_fetch_array($uni)){     
                                                ?>
                                           <option value="<?php echo $fila['id_unidad_medida']; ?>"><?php echo $fila['descripcion']; ?> </option>    
                                              <?php }  ?>                                        
                                            </select>
                                        </div>
                                                
                                          <div class="form-group">   
                                        <label> Fecha de Fabricación </label>
                                        <input type="date" name="fechafact" id="fechafact" class="form-control" required="">
                                         </div>
                                         <div class="form-group">
                                         <label> Fecha de Expiración </label>
                                         <input type="date" name="fechaexp" id="fechaexp" class="form-control" required="">
                                         </div>
                                         <div class="form-group">
                                        <label>N° Lote </label>
                                        <input type="text" name="nlote" id="nlote" class="form-control">
                                         </div>
                                         <div class="form-group">
                                        <label>R.S </label>
                                        <input type="text" name="rs" id="rs" class="form-control">
                                         </div>
                                         <div class="form-group">
                                        <label> Ajustar Inventario </label>
                                        <input type="text" name="invinicial" id="invinicial" class="form-control" required="required">
                                         </div>

                                            <div class="checkbox">
                                            <input id="lote" name="lote"  type="checkbox" value="1">
                                            <label for="lote">
                                                Lote
                                            </label>
                                            </div>
                                          <input type="submit" name="btngrabar" id="btngrabar" value="Grabar" class="btn btn-primary">
                            </div>
                                      
                                         
                                      </div>
                             
                                 </form>
                                
                                 <?php 
//                                           include './modal/modalcodigosunat.php';
                               
                               ?>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    
                     </div>
                </div>
                