<div class="modal fade" id="modalFormAlumno" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile-body">
                <form id="formAlumno" name="formAlumno">
                    <input type="hidden" name="idAlumno" id="idAlumno" value="">
                    <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del alumno" required>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Apellido</label>
                    <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Nota</label>
                    <input type="number" class="form-control" id="edad" name="edad" placeholder="Nota o puntaje">
                    </div>
                    <div class="form-group">
                    <label class="control-label">DNI</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="DNI">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <input class="form-control" type="number" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Facultad</label>
                    <input type="text" class="form-control" id="facultad" name="facultad" placeholder="Facultad">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Escuela</label>
                    <input type="text" class="form-control" id="escuela" name="escuela" placeholder="Escuela">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Año Academico</label>
                    <input type="number" class="form-control" id="fechaNac" name="fechaNac" placeholder="Año Academico">
                    </div>
                    <div class="form-group">
                    <label class="control-label">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" name="listStatus" id="listStatus" required>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>