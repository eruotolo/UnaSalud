<? include('master/head.php') ?>
<!-- Conexion a la base de datos -->
<?php include('config/database.php') ?>

<!-- Consulta bdd -->
<?php
$id_proc = $_POST['id_proc'];
$query = "SELECT *
FROM documentos
WHERE id_charla_doc IS NULL
AND id_procedimiento_doc IS NULL";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    while ($row  = mysqli_fetch_array($query_run)) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Una salud - Documentos</title>
            <link rel="icon" type="image/x-icon" href="assets/favicon.svg" />

            <!-- Fuente Open Sans -->

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

            <!-- Slider -->
            <link href="css/slider.css" rel="stylesheet" />

            <!-- Google fonts-->
            <link rel="preconnect" href="https://fonts.gstatic.com" />
            <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />

            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />

            <!-- Carrusel Equipo -->
            <link href="css/carrousel.css" rel="stylesheet" />

        </head>

        <body id="page-top">
            <!-- MENU DE NAVEGACION-->
            <?php include('includes/nav.php')?>

            <!-- HEADER SLIDER-->

            <div class="container">
                <!-- SECCION NAVTABS BIBLIOTECA-->
                <div class="col-12">
                    <div class="row menu-top">
                        <div class="col-5">
                            <h1>Biblioteca</h1>
                        </div>
                        <div class="col-7 ps-2 ">
                            <?php include('includes/buscador.php') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 menu-left">
                            <div class="nav flex-column nav-pills me-3" id="charlas" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Charlas y conversatorios
                                    <hr>
                                </button>
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Procedimientos
                                    <hr>
                                </button>
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Otros documentos
                                    <hr>
                                </button>
                            </div>
                        </div>
                        <div class="col-7 menu-right">
                            <div class="menu-content-detail">
                                <div class="row col-12">
                                    <div class="categoria">
                                        <h5><?php echo $row['nombre_cat'] ?></h5>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <h1><?php echo $row['nombre'] ?></h1>
                                    <h4><?php echo $row['nombre_usuario'] ?></h4>
                                    <div class="col-10">
                                        <p>Publicado: <?php echo $row['create_at'] ?></p>
                                    </div>
                                </div>
                                <div class="row col-12 ">
                                    <div class="col-6">
                                        <img src="assets/img/equipo/Una-salud-equipo-11.png" alt="orange tree" />
                                        <a href="<?php echo $row['link_video'] ?>" target="_blank" class="menu-content-detail-img">
                                            <img src="assets/img/biblioteca/BIBLIOTECA-Una-salud-15.svg" alt="">
                                            Ver video
                                        </a>
                                        <div class="menu-content-detail-link">
                                            <p><?php echo $row['descripcion'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <ul>
                                            <?php
                                            $id_proc = $row['id_proc'];
                                            $query = "SELECT *
                                    FROM documentos D
                                    INNER JOIN procedimientos P
                                    ON D.id_procedimiento_doc = P.id_proc
                                    WHERE id_procedimiento_doc = $id_proc";
                                            $result_task = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_Array($result_task)) {
                                            ?>
                                                <li class="menu-content-detail-link"><img src="assets/img/biblioteca/BIBLIOTECA-Una-salud-16.svg" alt=""><a href=""><?php echo $row['nombre_doc'] ?></a>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <div class="float-right-item">
                                        <a class="btn color3" href="biblioteca.php">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-12">

                    <div class="col-8">

                    </div>


                </div>
                <div class="col-5">


                </div>

            </div>

            <!-- Footer-->
            <?php include('includes/footer.php')?>

            <!-- Feedback Modal-->

            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/carrousel.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/slider.js"></script>
            <!-- Carrucel Equipo JS -->
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <!-- * *                               SB Forms JS                               * *-->
            <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        </body>

        </html>

<?php
    }
}
?>