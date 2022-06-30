<?php
date_default_timezone_set("America/Santiago");
$res_fecha= date("d-m-Y");
$res_hora= date("h:i a");

include ("../Config/Database.php");

    /* Traer datos del formulario de index.php */
if (isset($_POST['save_procedimiento'])){

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $link_video=$_POST['link_video'];
    $id_usuario=$_POST['id_usuario'];
    $id_categoria=$_POST['id_categoria'];
    $autor=$_POST['autor'];
    $correo=$_POST['correo'];

    /* Recibir tarea */

    $query = "INSERT INTO procedimientos (nombre,descripcion,link_video,id_usuario,id_categoria,autor,correo) 
            VALUES ('$nombre','$descripcion','$link_video','$id_usuario','$id_categoria','$autor','$correo')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed".$query);
        echo $result;
    }
    $_SESSION['message'] = 'Publicado con exito';
    $_SESSION['message_type'] = 'success';
    session_start();
    header("location: ../Layout/index.php?page=4"); 
}

if (isset($_GET["id_proc"])){

    $id_proc = $_GET["id_proc"];
    $query = "DELETE FROM procedimientos WHERE id_proc = $id_proc"; 
    $reuslt = mysqli_query($conn,$query);
    if($result){
        die("Query failed al intentar eliminar");
    }
    $_SESSION['message'] = 'Publicacion eliminada';
    $_SESSION['message_type'] = 'danger';
    session_start();
    header("location: ../Layout/index.php?page=4"); 
}

if (isset($_POST['save_doc'])){
    $nombre_doc = $_POST['nombre_doc'];
    $id_procedimiento_doc = $_POST['id_procedimiento_doc'];

    $nombreimg=$_FILES['file']['name']; 
    $archivo=$_FILES['file']['tmp_name'];
    $ruta_download = "admin/Layout/assets/archivos";
    $ruta = "../Layout/assets/archivos";
    $ruta_directorio = $ruta."/".$nombreimg;
    move_uploaded_file($archivo,$ruta_directorio);
    $ruta_real = $ruta_download."/".$nombreimg;

    $query = "INSERT INTO documentos (nombre_doc, ruta_doc, id_charla_doc , id_procedimiento_doc) 
            VALUES ('$nombre_doc','$ruta_real',NULL, '$id_procedimiento_doc')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Documento  Guardado';
    $_SESSION['message_type'] = 'success';
    header("location: ../Layout/index.php?page=4"); 
    
}
?>