<?php
date_default_timezone_set("America/Santiago");
$res_fecha= date("d-m-Y");
$res_hora= date("h:i a");

include ("../Config/Database.php");

    /* Traer datos del formulario de index.php */


if (isset($_GET["id_doc"])){

    $id_doc = $_GET["id_doc"];
    $query = "DELETE FROM documentos WHERE id_doc = $id_doc"; 
    $reuslt = mysqli_query($conn,$query);
    if($result){
        die("Query failed al intentar eliminar");
    }
    $_SESSION['message'] = 'Publicacion eliminada';
    $_SESSION['message_type'] = 'danger';
    session_start();
    header("location: ../Layout/index.php?page=5"); 
}

if (isset($_POST['save_doc'])){
    $nombre_doc = $_POST['nombre_doc'];
    $autor=$_POST['autor'];

    $nombreimg=$_FILES['file']['name']; 
    $archivo=$_FILES['file']['tmp_name'];
    $ruta_download = "admin/Layout/assets/archivos";
    $ruta = "../Layout/assets/archivos";
    $ruta_directorio = $ruta."/".$nombreimg;
    move_uploaded_file($archivo,$ruta_directorio);
    $ruta_real = $ruta_download."/".$nombreimg;

    $query = "INSERT INTO documentos (nombre_doc, ruta_doc, id_charla_doc , id_procedimiento_doc, autor) 
            VALUES ('$nombre_doc','$ruta_real',NULL, NULL,'$autor')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Documento  Guardado';
    $_SESSION['message_type'] = 'success';
    header("location: ../Layout/index.php?page=5"); 
    
}
 
?>

