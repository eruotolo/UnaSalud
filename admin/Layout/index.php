<?php 
include('../Config/Database.php');
//recordamos la sesion
session_start();
$usuario = $_SESSION ['usuarios'];
if (!isset($usuario)) {
  echo '
				<script type="text/javascript">
					window.location.href = "../index.php?page=6";
				</script>';
}
if(isset($_GET["page"])){
  $page=$_GET["page"];
  }else{
        $page=1;  
}

$query = "SELECT * FROM usuarios WHERE email = '$usuario'";
$run = mysqli_query ($conn,$query);
$row = $run->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">

<?php include('master/head.php') ?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('master/aside.php')?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('master/nav.php')?>

    <!-- FIN Navbar -->
    <div class="container-fluid py-4">
    
    <?php 
        if($page==1){
            include('Home/index.php');
        }else if($page==2){
            include('Perfil/index.php');
        }else if($page==3){
          include('Charlas/index.php');
        }else if($page==4){
          include('Procedimientos/index.php');
        }else if($page==5){
          include('Documentos/index.php');
        }else if($page==6){
          include('Perfil/index.php');
        }else if($page==7){
          include('Charlas/create.php');
        }else if($page==8){
          include('Charlas/edit.php');
        }else if($page==9){
          include('Procedimientos/create.php');
        }else if($page==10){
          include('Procedimientos/edit.php');
        }else if($page==11){
          include('Charlas/create-doc.php');
        }else if($page==12){
          include('Home/create.php');
        }else if($page==13){
          include('Home/edit.php');
        }else if($page==14){
          include('Documentos/create.php');
        }
    ?>

      <!-- FOOTER -->
      <?php include('master/footer.php')?>
      <!-- FIN FOOTER -->
    </div>
  </main>

<?php include('master/script.php')?>
</body>

</html>