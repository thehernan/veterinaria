   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Agregar Existencias
                        </div>
                            <div class="panel-body">
                                 <form id="modexistencias" name="modexistencias" method="post">
                                       
                                     <div class="row">
                                       
                                        <div class="col-lg-9">
                                         <div class="form-group">
                                        
                                             <input type="hidden" name="txtidproducto" id="txtidproducto" required class="form-control">
                                             <input type="hidden" name="txtlote" id="txtlote" required class="form-control">
                                        </div>
                                            
                                        <div class="form-group">
                                            <label id="lblfechaf"> Fecha de Fabricación</label>
                                            <input type="date" name="txtfecha" id="txtfecha" required class="form-control">
                                        </div>
                                         <div class="form-group">
                                             <label id="lblfechaexp">Fecha de Expiración</label>
                                            <input type="date" name="txtfechaexp" id="txtfechaexp" required class="form-control">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label id="lbllote">Lote No.</label>
                                            <input type="text" name="txtnlote" id="txtnlote" placeholder="Lote No." required class="form-control">
                                        </div>
                                       <div class="form-group">
                                           <label id="lblrs">R.S. No.</label>
                                            <input type="text" name="txtrs" id="txtrs" placeholder="R.S" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label id="lblcantidad">Cantidad X </label> 
                                            <input type="number" name="txtcant" id="txtcant" placeholder="Cantidad" required class="form-control">
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
                