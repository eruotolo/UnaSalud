<!-- Conexion a la base de datos -->
<?php include('config/database.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Una salud - Biblioteca</title>
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

    <!-- icons -->

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body id="page-top">
    <!-- MENU DE NAVEGACION-->
    <?php include('includes/nav.php') ?>
    <!-- HEADER SLIDER-->

    <div class="container">
        <div class="col-12">
            <div class="row menu-top">
                <div class="col-5">
                    <div class="d-flex align-items-start me-3 ps-lg-5 pt-1">
                        <h1>Biblioteca</h1>
                    </div>
                </div>


                <div class="col-7 ps-2 ">
                    <?php include('includes/buscador.php') ?>
                </div>
            </div>
        </div>
        <div class="row gris">

            <div class="col-5">
                <div class="content-tabs-link">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 ps-lg-6 pt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a href="biblioteca.php" class="boton-volver"> Volver</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-charlas-tab">
                        <!-- Consulta bdd -->
                        <?php

                        $buscar = $_POST['buscar'];



                        if (!empty($buscar)) {
                            $query = "SELECT *
                            FROM charlas C
                            INNER JOIN usuarios U
                            ON C.id_usuario = U.id_usuario
                            JOIN categorias CA
                            ON C.id_categoria = CA.id_cat
                            JOIN categorias_2 CA2
                            ON C.id_categoria_2 = CA2.id_cat_2
                            WHERE nombre LIKE '%$buscar%' or autor LIKE '%$buscar%'";
                            $resultado = mysqli_query($conn, $query);
                        }
                        ?>
                        <?php
                        while ($row = mysqli_fetch_array($resultado)) {
                        ?>
                            <?php
                            if (isset($row['id_char'])) {
                            ?>
                                <div class="menu-content">
                                    <div class="etiquetas">
                                        <div class="categoria">
                                            <h5 class="h5"><?php echo $row['nombre_cat'] ?></h5>
                                        </div>
                                        <div class="categoria2">
                                            <h5 class="h5"><?php echo $row['nombre_cat_2'] ?></h5>
                                        </div>
                                        <!--<a href="" class="btn color2"> Medio ambiente </a> -->
                                    </div>
                                    <div class="row col-12">
                                        <h1><?php echo $row['nombre'] ?></h1>
                                        <h4><?php echo $row['autor']; ?></h4>
                                    </div>
                                    <div class="row col-12 pt-2">
                                        <div class="col-10">
                                            <p>Fecha publicación: <?php echo date("d-m-Y", strtotime($row['create_at'])); ?></p>
                                        </div>
                                        <div class="col-2">
                                            <form action="detalle-charla.php" method="post">
                                                <input type="hidden" name="id_char" id="id_char" value="<?php echo $row['id_char'] ?>">
                                                <input class="btn color3 ps-xxl-4 pe-xxl-4" type="submit" name="edit" value="Ver">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        $buscar = $_POST['buscar'];
                        if (!empty($buscar)) {
                            $query = "SELECT *
                            FROM procedimientos C
                            INNER JOIN usuarios U
                            ON C.id_usuario = U.id_usuario
                            JOIN categorias CA
                            ON C.id_categoria = CA.id_cat
                            WHERE nombre LIKE '%$buscar%' or autor LIKE '%$buscar%'";
                            $resultado = mysqli_query($conn, $query);
                        }
                        ?>
                        <?php
                        while ($row = mysqli_fetch_array($resultado)) {
                        ?>
                            <?php
                            if (isset($row['id_proc'])) {
                            ?>
                                <div class="menu-content">
                                    <div class="etiquetas">
                                        <div class="categoria">
                                            <h5 class="h5">Procedimientos</h5>
                                        </div>

                                        <!--<a href="" class="btn color2"> Medio ambiente </a> -->
                                    </div>
                                    <div class="row col-12">
                                        <h1><?php echo $row['nombre'] ?></h1>
                                        <h4><?php echo $row['autor']; ?></h4>
                                    </div>
                                    <div class="row col-12 pt-2">
                                        <div class="col-10">
                                            <p>Fecha publicación: <?php echo date("d-m-Y", strtotime($row['create_at'])); ?></p>
                                        </div>
                                        <div class="col-2">

                                            <form action="detalle-procedimiento.php" method="post">
                                                <input type="hidden" name="id_proc" id="id_proc" value="<?php echo $row['id_proc'] ?>">
                                                <input class="btn color3 ps-xxl-4 pe-xxl-4" type="submit" name="edit" value="Ver">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <!-- Footer-->
    <?php include('includes/footer.php') ?>
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