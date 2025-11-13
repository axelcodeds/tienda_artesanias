<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica si las variables del formulario están definidas
    if (isset($_POST['nombre_usuario'], $_POST['clave'])) {

        $nombre_usuario = $_POST['nombre_usuario'];
        $clave = $_POST['clave'];

        require '../vendor/autoload.php';
        $usuario = new deadpool\usuario;

        // Llamada al método login
        $resultado = $usuario->login($nombre_usuario, $clave);

        if ($resultado) {
            header('Location: dashboard.php');
        } else {
            exit(json_encode(array('estado' => FALSE, 'mensaje' => 'Error al iniciar sesión')));
        }

    } else {
        exit(json_encode(array('estado' => FALSE, 'mensaje' => 'Faltan datos en el formulario')));
    }
}
