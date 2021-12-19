           
            <div class="row">
                <center>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 

                                <h3>MODIFICAR <?php echo $var_categoria_nombre;?></h3>
                                <br/>


                                <form 
                                <?php if($var_accion=="Seleccionar"){
                                    echo 'action="modificar.php"';
                                } else{
                                    echo "";                           
                                }?> 
                                 method="POST" enctype="multipart/form-data" role="form">
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_nosotros_id; ?>" name="nosotros_id" id="nosotros_id"  placeholder="ID">
                                </div>


                                <div class="row">
                                    <div class="col form-group">
                                        <label for="nosotros_categoria_id"><b>1. Título:</b></label>
                                        <input readonly type="text" class="form-control" value="<?php 
                                        if(isset($var_nosotros_categoria_id_2)) {
                                            echo $var_categoria_nombre;
                                        }?>" 
                                        name="nosotros_categoria_id" id="nosotros_categoria_id">
                                    </div>  
                                </div> 
                                <br/>

                                <div class = "form-group">
                                    <label for="titulo"><b>2. Segundo título:</b> (Opcional)</label>
                                    <textarea class="form-control" name="nosotros_titulo" rows="2" placeholder="Ingrese aquí un título"
                                    ><?php echo $var_nosotros_titulo; ?></textarea>
                                </div>
                                
                                <br/>
                                <div class = "form-group">
                                    <label for="descripcion"><b>3. Descripción:</b> </label>
                                    <textarea class="form-control" name="nosotros_descripcion" rows="5" placeholder="Ingrese aquí la descripción"
                                    required><?php echo $var_nosotros_descripcion; ?></textarea>
                                </div>


                                <br/>
                                <!-- Imagenes: -->
                                <div class = "form-group">
                                    <label for="nosotros_imagen"><b>4. Imagen:</b> </label><br/> 
                                    <?php if($var_nosotros_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../assets/img/nosotros/<?php echo $var_nosotros_imagen;?>" width="200" alt="">    
                                    <?php } ?><br/><br/>
                                    <input type="file" class="form-control" name="nosotros_imagen" id="nosotros_imagen" placeholder="ID">
                                </div><br/>  
                                
                                
                                <?php
                                if(isset($var_categoria_nombre)){

                                
                                if($var_categoria_nombre=="REGLAMENTO")
                                
                                {?>
                                    <div class = "form-group">
                                    <label for="nosotros_pdf"><b>5. PDF: </b> (Solo reglamento):</label><br/> 
                                    <?php if($var_nosotros_pdf!=""){ 
                                         echo $var_nosotros_pdf."<br/>"; 
                                     } ?>
                                     <br/>
                                    <input type="file" class="form-control" name="nosotros_pdf" id="nosotros_pdf" placeholder="ID">
                                </div> 
                                <?php }}?>
                                <br/>                                  
                                
                                <center>

                                
                                <div class="btn-group" role="group" aria-label="">                                 
                                    <button type="submit" name="accion" <?php echo ($var_accion!="Seleccionar")? "disabled":""?> value= "Modificar" class="btn btn-warning btn-lg">Modificar</button>                                 
                                </div>
                                <div class="btn-group" role="group" aria-label="">                                 
                                    <a href="nosotros.php"><button type="button" class="btn btn-info btn-lg">Cancelar</button></a>
                                </div>
                                </center>

                                </form>

                            </div>
                        </div> 
                    </div>
                </div> 
                </center>                      
            </div>