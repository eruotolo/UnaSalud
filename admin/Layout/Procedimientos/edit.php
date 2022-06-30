<? include('master/head.php') ?>
<?php
include('../../Config/Database.php');
session_start();

$id_proc = $_POST['id_proc'];
$query = "SELECT * FROM procedimientos WHERE id_proc = $id_proc";
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
                Editar Procedimiento
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
                                    <h6>Editar Procedimiento </h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-8">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_proc" id="id_proc" value="<?php echo $row['id_proc'] ?> ">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Titulo</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Autor</label>
                                                        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $row['autor'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Correo</label>
                                                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo'] ?>" </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $row['descripcion'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group mb-4">
                                                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                                            <input class="form-control" id="link_video" name="link_video" value="<?php echo $row['link_video'] ?>" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="id_categoria" id="id_categoria" required>
                                                            <?php try {
                                                                $sql = 'SELECT id_cat, nombre_cat FROM categorias';
                                                                foreach ($conn->query($sql) as $rowc) {
                                                                    if ($row['nombre_cat']) {
                                                                        $selected = 'selected="selected"';
                                                                    } else {
                                                                        $selected = '';
                                                                    }
                                                            ?>
                                                                    <option <?= $selected ?> value="<?= $rowc['id_cat'] ?>"><?= $rowc['nombre_cat'] ?></option>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn bg-gradient-danger" href="../index.php?page=3">Volver</a>
                                                    <button type="submit" name="update" class="btn btn-default">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>



                                        <?php

                                        if (isset($_POST['update'])) {

                                            $nombre = $_POST['nombre'];
                                            $descripcion = $_POST['descripcion'];
                                            $link_video = $_POST['link_video'];
                                            $id_categoria = $_POST['id_categoria'];
                                            $autor = $_POST['autor'];
                                            $correo = $_POST['correo'];
                                            $query = "UPDATE procedimientos 
                                                    SET nombre='$nombre',descripcion='$descripcion',link_video='$link_video',id_categoria='$id_categoria',autor='$autor',correo='$correo'
                                                    WHERE id_proc = $id_proc";
                                            $result = mysqli_query($conn, $query);

                                            /* Redireccionar */
                                            echo '<script type="text/javascript">
                                            window.location.href = "../index.php?page=4";
                                            </script>';
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