<?php
require '../vendor/autoload.php';

$artesania = new deadpool\artesania;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['nombre_artesania']))
            exit('Completar nombre');
        
        if(empty($_POST['descripcion']))
            exit('Completar descripcion');

        if(empty($_POST['categoria_id']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccionar una Categoria válida');

        
        $_params = array(
            'nombre_artesania'=>$_POST['nombre_artesania'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')
        );
        $rpt = $artesania->registrar($_params);
        if($rpt)
            header('Location: artesanias/index.php');
        else
            print 'Error al registrar la artesania';
        

    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['nombre_artesania']))
        exit('Completar nombre');
    
    if(empty($_POST['descripcion']))
        exit('Completar descripcion');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'nombre_artesania'=>$_POST['nombre_artesania'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    if(!empty($_POST['foto_temp']))
        $_params['foto'] = $_POST['foto_temp'];
    
    if(!empty($_FILES['foto']['name']))
        $_params['foto'] = subirFoto();

    $rpt = $artesania->actualizar($_params);
    if($rpt)
        header('Location: artesanias/index.php');
    else
        print 'Error al actualizar';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $artesania->eliminar($id);
    
    if($rpt)
        header('Location: artesanias/index.php');
    else
        print 'Error al eliminar';


}


function subirFoto() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];


    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];


}
