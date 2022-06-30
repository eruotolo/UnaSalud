<? include('master/head.php') ?>
<?php
include('../../Config/Database.php');
session_start();

$id_usuario = $_POST['id_usuario'];
$query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    while ($row  = mysqli_fetch_array($query_run)) {

?>


        <!--
=========================================================
* Soft UI Dashboard - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
            <link rel="icon" type="image/png" href="../assets/img/favicon.png">
            <title>
                Editar Usuario
            </title>
            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!-- Nucleo Icons -->
            <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
            <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
            <!-- CSS Files -->
            <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        </head>

        <body class="g-sidenav-show bg-gray-100">
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">

                </nav>
                <!-- End Navbar -->



                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h6>Editar Usuario </h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-8">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario'] ?> ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $row['nombre_usuario'] ?>" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group mb-4">
                                                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                                            <input class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" type="email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group mb-4">
                                                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                                            <input class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Rol</label>
                                                            <select class="form-control" name="id" id="id" required>
                                                                <?php try {
                                                                    $db = new PDO("mysql:host=localhost;dbname=dbwctlmnbn81gg", "uhpua9t5w2jaf", "injjgxehgbgy");
                                                                    $sql = 'SELECT id, nombre FROM roles';
                                                                    foreach ($db->query($sql) as $rowc) {
                                                                        if ($row['nombre']) {
                                                                            $selected = 'selected="selected"';
                                                                        } else {
                                                                            $selected = '';
                                                                        }
                                                                ?>
                                                                        <option <?= $selected ?> value="<?= $rowc['id'] ?>">
                                                                            <?= $rowc['nombre'] ?></option>
                                                                <?php
                                                                    }
                                                                } catch (PDOException  $e) {
                                                                    echo "Error: " . $e;
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-6">
                                                    <label for="exampleFormControlTextarea1">Status</label>

                                                        <div class="form-group">
                                                            
                                                            <input type="radio" id="status" name="is_activo" value="1" checked>
                                                            <label for="contactChoice1">Activo</label>

                                                            <input type="radio" id="status" name="is_activo" value="0">
                                                            <label for="contactChoice2">Inactivo</label>

                                                          

                                                        </div>

                                                    </div>

                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <a class="btn bg-gradient-danger" href="../index.php?page=1">Volver</a>
                                                    <button type="submit" name="update" class="btn btn-default">Actualizar</button>

                                                </div>

                                            </div>

                                        </form>



                                        <?php

                                        if (isset($_POST['update'])) {
                                            $nombre_usuario = $_POST['nombre_usuario'];
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $is_activo = $_POST['is_activo'];
                                            $id_usuario = $_POST['id_usuario'];
                                            $is_activo = $_POST['is_activo'];

                                            $query = "UPDATE usuarios 
                                            SET nombre_usuario='$nombre_usuario',email='$email',password='$password',is_activo='$is_activo' 
                                            WHERE id_usuario = $id_usuario";
                                            $query_run = mysqli_query($conn, $query);

                                            if ($query_run) {
                                                /* Redireccionar */
                                                echo '<script type="text/javascript">
                                                    window.location.href = "../index.php?page=1";
                                                    </script>';
                                            } else {
                                                echo '<script> alert ("No se pudo actualizar el usuario")</script>';
                                                header("location: index.php");
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!--   Core JS Files   -->
                <script src="../assets/js/core/popper.min.js"></script>
                <script src="../assets/js/core/bootstrap.min.js"></script>
                <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
                <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
                <script>
                    var win = navigator.platform.indexOf('Win') > -1;
                    if (win && document.querySelector('#sidenav-scrollbar')) {
                        var options = {
                            damping: '0.5'
                        }
                        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                    }
                </script>
                <!-- Github buttons -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
                <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
        </body>

        </html>


<?php
    }
} else {
    echo '<script> alert ("No se a guardado")</script>';
}
?>