<?php
require_once '../../includes/config.php';

if(!empty($_POST)) {
    if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['codigo']) || empty($_POST['edad']) || empty($_POST['cedula']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['facultad']) || empty($_POST['escuela']) || empty($_POST['fechaNac']) || empty($_POST['observaciones']) || empty($_POST['listStatus'])) {
        $arrResponse = array('status' => false,'msg' => 'Todos los campos son necesarios');
    } else {
        $idAlumno = $_POST['idAlumno'];
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtApellido'];
        $codigo = $_POST['codigo'];
        $edad = $_POST['edad'];
        $cedula = $_POST['cedula'];
        $telefono = intval($_POST['telefono']);
        $email = $_POST['email'];
        $facultad = $_POST['facultad'];
        $escuela = $_POST['escuela'];
        $fechaNac = $_POST['fechaNac'];
        $observaciones = $_POST['observaciones'];
        $status = $_POST['listStatus'];

        $sql = "SELECT * FROM alumnos WHERE (cedula = ? AND alumno_id != ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($cedula,$idAlumno));
        $request = $query->fetch(PDO::FETCH_ASSOC);

        if($request > 0) {
            $arrResponse = array('status' => false,'msg' => 'Cedula ya registrada');
        } else {
            if($idAlumno == 0) {
                $sql_insert = "INSERT INTO alumnos (nombre,apellido,codigo,edad,cedula,telefono,correo,facultad,escuela,fecha_nac,observaciones,estatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $query_insert = $pdo->prepare($sql_insert);
                $request = $query_insert->execute(array($nombre,$apellido,$codigo,$edad,$cedula,$telefono,$email,$facultad,$escuela,$fechaNac,$observaciones,$status));
                $option = 1;
            } else {
                $sql_update = "UPDATE alumnos SET nombre = ?,apellido = ?,codigo = ?,edad = ?,cedula = ?,telefono = ?,correo = ?,facultad = ?,escuela = ?,fecha_nac = ?,observaciones = ?,estatus = ? WHERE alumno_id = ?";
                $query_update = $pdo->prepare($sql_update);
                $request = $query_update->execute(array($nombre,$apellido,$codigo,$edad,$cedula,$telefono,$email,$facultad,$escuela,$fechaNac,$observaciones,$status,$idAlumno));
                $option = 2;
            }
            
            if($request > 0) {
                if($option == 1) {
                    $arrResponse = array('status' => true,'msg' => 'ALumno creado correctamente');
                } else {
                    $arrResponse = array('status' => true,'msg' => 'Alumno actualizado correctamente');
                }
            } 
        }
    }
    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
}