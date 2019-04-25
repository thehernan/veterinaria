   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Modificar  Usuarios
                        </div>
                            <div class="panel-body">
                                 <form id="modicaalumno" name="modicaalumno" method="post">
                                        <div id="resultados_ajaxnu"></div>
                                     <div class="row">
                                       
                                        <div class="col-lg-6">
                                         <div class="form-group">
                                        
                                            <input type="hidden" name="txtid" id="txtid" required class="form-control">
                                        </div>
                                            
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" name="txtape" id="txtape" placeholder="apellidos" required class="form-control">
                                        </div>
                                         <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" name="txtnom" id="txtnom" placeholder="nombres" required class="form-control">
                                        </div>
                                    
                                             <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="txtpro" id="txtpro" placeholder="procedencia" required class="form-control">
                                        </div>
                                               <div class="form-group">
                                            <label>Domicilio</label>
                                            <input type="text" name="txtdomi" id="txtdomi" placeholder="domicilio" required class="form-control">
                                        </div> 
                                              <div class="form-group">
                                            <label>Estado civil</label>
                                     
                                                    <select name="txtec" id="txtec" placeholder="estado civil" required class="form-control">
                                                <?php
                                                  
                                                      $sql="SELECT * FROM t_estadocivil";
                                                       
                                                      $exe=mysqli_query($conexion,$sql)or die("error al cargar");
                                                     
                                                ?>
                                               <?php  while($fi=mysqli_fetch_array($exe)){ ?>
                                                        <option value="<?php echo $fi['idEstadocivil']; ?>"><?php echo $fi['descripcion']; ?></option>
                                                      <?php } ?>
                                                  </select>
                                        </div>
                                         </div>
                                        <div class="col-lg-6">
                                         
                                    
                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input type="text" name="txtdni" id="txtdni" placeholder="dni" required class="form-control">
                                        </div>    
                                          <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="text"  name="txttele" id="txttele" required  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>sexo</label>
                                         
                                       <select name="txtcose" id="txtcose" placeholder="Como se entero" required class="form-control">
                                                <?php
                                                  
                                                      $sql="SELECT * FROM t_sexo";
                                                       
                                                      $exe=mysqli_query($conexion,$sql)or die("error al cargar");
                                                     
                                                ?>
                                               <?php  while($fi=mysqli_fetch_array($exe)){ ?>
                                                        <option value="<?php echo $fi['idSexo']; ?>"><?php echo $fi['descripcion']; ?></option>
                                                      <?php } ?>
                                                  </select>
                                        
                                        </div>
                                            
                                      
                                            
                                        <div class="form-group">
                                            <label>F.Nacimiento</label>
                                           <input type="date" name="txtfn" id="txtfn" placeholder="Fecha Nacimiento" required class="form-control">
                                        </div>      
                                    
                                            <input type="submit" name="btngrabar" id="btngrabar" value="Grabar" class="btn btn-primary">
                                     </div>
                                         
                                      </div>
                             
                                 </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    
                     </div>
                </div>
                