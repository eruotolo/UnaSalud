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

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
            <link rel="icon" type="image/png" href="../assets/img/favicon.png">
            <title>
                Agregar Documentos
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
                                    <h6>Crear documentos</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-8">
                                        <form method="POST" action="../../Controller/Procedimientos.php" enctype="multipart/form-data">
                                            <input type="hidden" name="id_procedimiento_doc" id="id_procedimiento_doc" value="<?php echo $row['id_proc'] ?> ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Nombre Documento</label>
                                                        <input type="text" class="form-control" id="nombre_doc" name="nombre_doc" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Subir Documento</label>
                                                        <input type="file" class="form-control" id="file" name="file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn bg-gradient-danger" href="../index.php?page=4">Volver</a>
                                                    <input type="submit" class="btn btn-default" name="save_doc" value="Publicar">
                                                </div>
                                            </div>
                                        </form>
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