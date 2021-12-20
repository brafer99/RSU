            <div class="row">
                  <center>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 
                                <h3>Campos Obligatorios:</h3><br/>
                                <form 
                                <?php if($var_accion=="Seleccionar"){
                                    echo 'action="modificar.php"';
                                } else{
                                    echo "";                           
                                }?> 
                                method="POST" enctype="multipart/form-data" role="form">                   
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_noticia_id; ?>" name="noticia_id" id="noticia_id"  placeholder="ID">
                                </div>
                                <div class = "form-group">
                                    <label for="titulo"><b>1. Título:</b></label>
                                    <textarea required class="form-control" name="noticia_titulo" rows="2" placeholder="Ingrese aquí el título"
                                    ><?php echo $var_noticia_titulo; ?></textarea>
                                </div>
                                <br/>

                                <div class="row">
                                    <div class="col form-group">
                                    <label for="areas"><b>2. Área:</b></label>
                                    <select required class="custom-select" name="noticia_area_id" id="noticia_area_id">
                                        <?php if(isset($var_noticia_area_id_2)) { ?>
                                            <option selected="" value="<?php echo $var_noticia_area_id_2; ?>" ><?php echo $var_area_sigla; ?></option> 
                                        <?php } else{?>
                                            <option value="" selected disabled hidden> Selecciona una opción </option> 
                                        <?php }?>
                                        <?php foreach($lista_areas as $area){ ?>
                                            <option value="<?php echo $area['sql_area_id']; ?>"> <?php echo $area['sql_area_sigla']; ?></option> 
                                        <?php } ?>
                                    </select>
                                    </div>                               
                                    <div class="col form-group">
                                    <label for="estado"><b>3. Estado de evento: </b></label>
                                    <select class="custom-select" name="noticia_estado_id" id="noticia_estado_id" required>
                                        <?php if(isset($var_noticia_estado_id_2)) { ?>
                                            <option selected="" value="<?php echo $var_noticia_estado_id_2; ?>" ><?php echo $var_estado_nombre; ?></option> 
                                        <?php } else{?>
                                            <option value="" selected disabled hidden> Selecciona una opción </option> 
                                        <?php }?>
                                        <?php foreach($lista_estados as $estado){ ?>
                                            <option value="<?php echo $estado['sql_estado_id']; ?>"> <?php echo $estado['sql_estado_nombre']; ?></option> 
                                        <?php } ?>
                                    </select> 
                                    </div>
                                </div>                                                     
                               <!-- Imagenes: -->
                               <br/>

                               
                                <div class ="form-group">
                                    <label for="noticia_imagen"><b>4. Imagen:</b> (Flyer, Logotipo, Publicidad, etc.)</label><br/> 
                                    
                                <?php if($var_accion=="Seleccionar"){ ?>
                                    
                                </br><label for="noticia_imagen">Imagen actual:</label><br/>                                                                
                                <?php }?>                                    
                                    <?php if($var_noticia_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../assets/img/noticias/<?php echo $var_noticia_imagen;?>" width="150" alt="">    
                                    <?php } ?><br/>
                                
                              <?php if($var_accion=="Seleccionar"){ ?>
                                    
                                </br><label for="noticia_imagen">Cambiar imagen:</label><br/>                                                                
                                <?php }?>  
                                    
                                    <input type="file" class="form-control" name="noticia_imagen" id="noticia_imagen" placeholder="ID">
                                </div>

                                
                                <br/><br/><br/>
                                <h3>Campos Opcionales:</h3> <br/>          

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="noticia_fecha"><b>Fecha:</b> (opcional) </label>
                                        <input type="text" class="form-control" value="<?php echo $var_noticia_fecha; ?>" name="noticia_fecha" id="noticia_fecha"  placeholder="Fecha">
                                    </div>

                                    <div class="col form-group">
                                        <label for="noticia_hora"><b>Hora:</b>  (opcional)</label>
                                        <input type="text" class="form-control" value="<?php echo $var_noticia_hora; ?>" name="noticia_hora" id="noticia_hora"  placeholder="Hora">
                                    </div>
                                </div>                

                                <div class = "form-group">
                                    <label for="noticia_enlace"><b>Enlace de transmisión, Meet, Zoom, etc:</b>  (opcional)</label>
                                    <input type="text" class="form-control" value="<?php echo $var_noticia_enlace; ?>" name="noticia_enlace" id="noticia_enlace"  placeholder="Enlace">
                                </div>

                               <div class = "form-group">
                                    <label for="noticia_graba"><b>Enlace de grabación:</b>  (opcional)</label>
                                    <input type="text" class="form-control" value="<?php echo $var_noticia_graba; ?>" name="noticia_graba" id="noticia_graba"  placeholder="Enlace">
                                </div>

                                <div class = "form-group">
                                    <label for="noticia_lugar"><b>Lugar:</b> (opcional)</label>
                                    <input type="text" class="form-control" value="<?php echo $var_noticia_lugar; ?>" name="noticia_lugar" id="noticia_lugar"  placeholder="Lugar">
                                </div>

                                <div class = "form-group">
                                    <label for="descripcion"><b>Descripción adicional:</b>  (opcional)</label>
                                    <textarea class="form-control" name="noticia_descripcion" rows="5" placeholder="Ingrese texto"
                                    ><?php echo $var_noticia_descripcion; ?></textarea>
                                </div>  
                                <center>

                                <?php if($var_accion=="Seleccionar"){ ?>                  
                                <div class="btn-group" role="group" aria-label="Toolbar with button groups">
                                    <button type="submit" name="accion" value= "Modificar" class="btn btn-warning btn-lg">Guardar</button>                                  
                                </div>                                                                   
                                <?php }?>

                                <?php if($var_accion!="Seleccionar"){ ?>                               
                                <div class="btn-group" role="group" aria-label="Toolbar with button groups">
                                    <button type="submit" name="accion" value="Agregar" class="btn btn-success btn-lg">Agregar</button>                                  
                                </div>                                                               
                                <?php }?>


                                <div class="btn-group" role="group" aria-label="Toolbar with button groups">
                                    <a href="noticia.php"><button type="button" class="btn btn-info btn-lg" ">Cancelar</button></a>
                                </div>
                                
                                </center>  
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
               </center>                         
            </div>