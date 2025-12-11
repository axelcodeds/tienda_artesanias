<?php
// Mostrar errores (solo en pruebas)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar autoload (ruta correcta en el hosting)
require __DIR__ . '/../vendor/autoload.php';

$artesania = new deadpool\artesania;

// -----------------------------------------------------------------------------
// REGISTRAR
// -----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'Registrar') {

    if (empty($_POST['nombre_artesania'])) exit("Completar nombre");
    if (empty($_POST['descripcion'])) exit("Completar descripción");
    if (empty($_POST['categoria_id'])) exit("Seleccionar categoría");
    if (empty($_POST['precio'])) exit("Ingresar precio");

    $_params = [
        'nombre_artesania' => $_POST['nombre_artesania'],
        'descripcion'      => $_POST['descripcion'],
        'foto'             => subirFoto(),
        'precio'           => $_POST['precio'],
        'categoria_id'     => $_POST['categoria_id'],
        'fecha'            => date('Y-m-d'),
        'estado'           => 1
    ];

    if ($artesania->registrar($_params)) {
        header("Location: ./artesanias/index.php");
        exit;
    } else {
        exit("Error al registrar");
    }
}

// -----------------------------------------------------------------------------
// ACTUALIZAR
// -----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'Actualizar') {

    $_params = [
        'nombre_artesania' => $_POST['nombre_artesania'],
        'descripcion'      => $_POST['descripcion'],
        'precio'           => $_POST['precio'],
        'categoria_id'     => $_POST['categoria_id'],
        'fecha'            => date('Y-m-d'),
        'estado'           => 1,
        'id'               => $_POST['id']
    ];

    // Foto anterior
    $_params['foto'] = $_POST['foto_temp'];

    // Nueva foto
    if (!empty($_FILES['foto']['name'])) {
        $_params['foto'] = subirFoto();
    }

    if ($artesania->actualizar($_params)) {
        header("Location: ./artesanias/index.php");
        exit;
    } else {
        exit("Error al actualizar");
    }
}

// -----------------------------------------------------------------------------
// ELIMINAR
// -----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    if ($artesania->eliminar($_GET['id'])) {
        header("Location: ./artesanias/index.php");
        exit;
    } else {
        exit("Error al eliminar");
    }
}



// -----------------------------------------------------------------------------
// SUBIR FOTO 
// -----------------------------------------------------------------------------
function subirFoto() {

    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        return '';
    }

    // La carpeta estará en: /htdocs/uploads/
    $carpeta = __DIR__ . '/../upload/';

    // Crear carpeta si no existe
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0775, true);
    }

    // Nombre único
    $nombreArchivo = time() . '_' . basename($_FILES['foto']['name']);
    $rutaDestino = $carpeta . $nombreArchivo;

    // Mover archivo subido
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
        return $nombreArchivo;
    }

    return '';
}
