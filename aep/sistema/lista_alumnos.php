<?php
session_start();
if(empty($_SESSION['active'])) {
  header("Location: ../");
}
require_once 'includes/session.php';
require_once 'includes/header.php';
require_once 'includes/Modals/modal_alumnos.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1>
          <i class="app-menu__icon fa fa-user-graduate"></i> Lista de ALumnos
              <button class="btn btn-primary" type="button" onclick="openModalAlumno()">Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="importar.php">Importar excel de alumnos</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableAlumnos">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Codigo</th>
                      <th>Nota o Puntaje</th>
                      <th>DNI</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Facultad</th>
                      <th>Escuela</th>
                      <th>Año</th>
                      <th>Observaciones</th>
                      <th>Estatus</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php require_once 'includes/footer.php'; ?>