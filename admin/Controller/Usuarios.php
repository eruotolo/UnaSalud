<?php
date_default_timezone_set("America/Santiago");
$res_fecha= date("d-m-Y");
$res_hora= date("h:i a");

include ("../Config/Database.php");

    /* Traer datos del formulario de index.php */
if (isset($_POST['save_usuario'])){

    $id_rol=$_POST['id'];
    $nombre_usuario=$_POST['nombre_usuario'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    /* Recibir tarea */

    $query = "INSERT INTO usuarios(id_rol,nombre_usuario,email,password) 
            VALUES ('$id_rol','$nombre_usuario','$email','$password')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed".$query);
        echo $result;
    }
    header("location: ../Layout/index.php");
    $_SESSION['message'] = 'Publicado con exito';
    $_SESSION['message_type'] = 'success';
    session_start();
}

if (isset($_GET["id_usuario"])){

    $id_usuario = $_GET["id_usuario"];
    $query = "DELETE FROM usuarios WHERE id_usuario = $id_usuario"; 
    $reuslt = mysqli_query($conn,$query);
    if($result){
        die("Query failed al intentar eliminar");
    }
    $_SESSION['message'] = 'Publicacion eliminada';
    $_SESSION['message_type'] = 'danger';
    session_start();
    header("location: ../Layout/index.php?page=1"); 
}


?>

