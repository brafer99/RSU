            <div class="row">
                <center>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 
                                
                                <form 
                                <?php if($var_accion=="Seleccionar"){
                                    echo 'action="modificar.php"';
                                } else{
                                    echo "";                           
                                }?>                                 
                                method="POST" enctype="multipart/form-data" role="form">
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_autoridad_id; ?>" name="autoridad_id" id="autoridad_id"  placeholder="ID">
                                </div>
                                <div class = "form-group">
                                    <label for="nombre"><b>1. Área:</b></label>
                                    <textarea readonly class="form-control" name="autoridad_area_id" rows="2" ><?php 
                                    if(isset($var_autoridad_area_id_2)) {
                                        echo $var_area_nombre;
                                    }                                  
                                    ?></textarea>
                                </div>
                                <br/>
                                <div class = "form-group">
                                    <label for="nombre"><b>2. Nombre:</b></label>
                                    <textarea class="form-control" name="autoridad_nombre" rows="2" placeholder="Ingrese aquí el nombre de Autoridad"
                                    required><?php echo $var_autoridad_nombre; ?></textarea>
                                </div>                       
                                <br/>
                                <div class = "form-group">
                                    <label for="autoridad_imagen"><b>3. Imagen:</b></label><br/> 
                                    <?php if($var_autoridad_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../../assets/img/autoridades/<?php echo $var_autoridad_imagen;?>" width="200" alt="">    
                                    <?php } ?><br/><br/>
                                    <input required type="file" class="form-control" name="autoridad_imagen" id="autoridad_imagen" placeholder="ID">
                                </div>
                                <br/>          
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="autoridad_email"><b>4. Email:</b> (opcional) </label>
                                        <input type="email" class="form-control" value="<?php echo $var_autoridad_email; ?>" name="autoridad_email" id="autoridad_email"  placeholder="Email">
                                    </div>  
                                </div>  
                                <br/>
                                <center>
                                                        
                                <div class="btn-group" role="group" aria-label="">                                    
                                    <button type="submit" name="accion" <?php echo ($var_accion!="Seleccionar")? "disabled":""?> value= "Modificar" class="btn btn-warning btn-lg">Modificar</button>                              
                                </div>
                                <div class="btn-group" role="group" aria-label="">                                    
                                    <a href="autoridad.php"><button type="button" class="btn btn-info btn-lg">Cancelar</button></a>
                                </div> 
                                </center>                                 
                                </form>
                            </div>
                        </div> 
                    </div>
                </div> 
                </center>                       
            </div>