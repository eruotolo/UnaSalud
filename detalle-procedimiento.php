<!-- Conexion a la base de datos -->
<?php include('config/database.php') ?>

<!-- Consulta bdd -->
<?php

$id_proc = $_POST['id_proc'];
$query = "SELECT *
FROM procedimientos C
INNER JOIN usuarios U
ON C.id_usuario = U.id_usuario
JOIN categorias CA
ON C.id_categoria = CA.id_cat
WHERE id_proc = $id_proc";
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
            <title>Una salud - Procedimientos</title>
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
                            <div class="col-7 ps-2 ">
                                <?php include('includes/buscador.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gris">

                    <div class="col-5">
                        <div class="content-tabs-link">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3 ps-lg-5 pt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        Charlas y conversatorios
                                        <hr />
                                    </button>
                                    <button class="nav-link active " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        Procedimientos
                                        <hr />
                                    </button>

                                    <button class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                        Otros documentos
                                        <hr />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="menu-content-detail">
                                    <div class="row col-12">
                                        <div class="categoria">
                                            <h5 class="h5">Procedimientos</h5>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <h1><?php echo $row['nombre'] ?></h1>
                                        <h4><?php echo $row['nombre_usuario'] ?></h4>
                                        <div class="col-10">
                                            <p>Fecha publicación: <?php echo date("d-m-Y", strtotime($row['create_at'])); ?></p>

                                        </div>
                                    </div>
                                    <div class="row col-12 ">
                                        <div class="col-6 v-line">
                                            <iframe width="90" height="90" src="https://www.youtube.com/embed/<?php echo $row['link_video'] ?>" title="Standly - Panamera (Video Oficial)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <a href="https://www.youtube.com/embed/<?php echo $row['link_video'] ?>" target="_blank" class="menu-content-detail-img">
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
                                                    <li class="menu-content-detail-link-doc"><img src="assets/img/biblioteca/BIBLIOTECA-Una-salud-16.svg" alt=""><a href=""><?php echo $row['nombre_doc'] ?></a>
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
                            <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <!-- Consulta bdd -->
                                <?php
                                if (!empty($_REQUEST["nume"])) {
                                    $_REQUEST["nume"] = $_REQUEST["nume"];
                                } else {
                                    $_REQUEST["nume"] = '1';
                                }
                                if ($_REQUEST["nume"] == "") {
                                    $_REQUEST["nume"] = "1";
                                }
                                $articulos = mysqli_query($conn, "SELECT * FROM charlas  ;");
                                $num_registros = @mysqli_num_rows($articulos);
                                $registros = '4';
                                $pagina = $_REQUEST["nume"];
                                if (is_numeric($pagina))
                                    $inicio = (($pagina - 1) * $registros);
                                else
                                    $inicio = 0;
                                $busqueda = mysqli_query($conn, "SELECT *
                        FROM charlas C
                        INNER JOIN usuarios U
                        ON C.id_usuario = U.id_usuario
                        JOIN categorias CA
                        ON C.id_categoria = CA.id_cat
                        JOIN categorias_2 CA2
                        ON C.id_categoria_2 = CA2.id_cat_2
                        ORDER BY C.id_char DESC 
                        LIMIT $inicio,$registros;");
                                $paginas = ceil($num_registros / $registros);

                                ?>
                                <?php while ($row = mysqli_fetch_assoc($busqueda)) { ?>
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
                                <?php } ?>
                                <div class="container-fluid  col-12">
                                    <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
                                        <li class="page-item">
                                            <?php
                                            if ($_REQUEST["nume"] == "1") {
                                                $_REQUEST["nume"] == "0";
                                                echo  "";
                                            } else {
                                                if ($pagina > 1)
                                                    $ant = $_REQUEST["nume"] - 1;
                                                echo "<a class='page-link' aria-label='Anterior' href='biblioteca.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Anterior</span></a>";
                                                echo "<li class='page-item '><a class='page-link' href='biblioteca.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
                                            }
                                            echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
                                            $sigui = $_REQUEST["nume"] + 1;
                                            $ultima = $num_registros / $registros;
                                            if ($ultima == $_REQUEST["nume"] + 1) {
                                                $ultima == "";
                                            }
                                            if ($pagina < $paginas && $paginas > 1)
                                                echo "<li class='page-item'><a class='page-link' href='biblioteca.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
                                            if ($pagina < $paginas && $paginas > 1)
                                                echo "
                                    <li class='page-item'><a class='page-link' aria-label='Siguiente' href='biblioteca.php?nume=" . ceil($ultima) . "'><span class='sr-only'>Siguiente</span><span aria-hidden='true'>&raquo;</span></a>
                                    </li>";
                                            ?>
                                    </ul>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!-- Consulta bdd -->
                        <?php
                        if (!empty($_REQUEST["nume"])) {
                            $_REQUEST["nume"] = $_REQUEST["nume"];
                        } else {
                            $_REQUEST["nume"] = '1';
                        }
                        if ($_REQUEST["nume"] == "") {
                            $_REQUEST["nume"] = "1";
                        }
                        $articulos = mysqli_query($conn, "SELECT * FROM documentos  ;");
                        $num_registros = @mysqli_num_rows($articulos);
                        $registros = '4';
                        $pagina = $_REQUEST["nume"];
                        if (is_numeric($pagina))
                            $inicio = (($pagina - 1) * $registros);
                        else
                            $inicio = 0;
                        $busqueda = mysqli_query($conn, "SELECT * 
                        FROM documentos
                        WHERE id_charla_doc IS NULL
                        AND id_procedimiento_doc IS NULL 
                        ORDER BY id_doc DESC
                        LIMIT $inicio,$registros;");
                        $paginas = ceil($num_registros / $registros);

                        ?>
                        <?php while ($row = mysqli_fetch_assoc($busqueda)) { ?>
                            <div class="menu-content-box">
                                <h1><?php echo $row['nombre_doc'] ?></h1>
                                <h4><?php echo $row['autor'] ?></h4>
                                <div class="col-12">
                                    <p>Fecha publicación: <?php echo date("d-m-Y", strtotime($row['create_at'])); ?></p>

                                </div>
                                <div class="icon-option">
                                    <a href="<?php echo $row['ruta_doc'] ?>" readfile="<?php echo $row['nombre_doc'] ?>"><img class="img-menu-sponsor" src="assets/img/biblioteca/BIBLIOTECA-Una-salud-16.svg" alt="logo"></a>
                                    <a href="<?php echo $row['ruta_doc'] ?>" download="<?php echo $row['nombre_doc'] ?>"><img class="img-menu-sponsor" src="assets/img/biblioteca/descarga-unasalud-06.svg" alt="logo"></a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="container-fluid  col-12">
                                    <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
                                        <li class="page-item">
                                            <?php
                                            if ($_REQUEST["nume"] == "1") {
                                                $_REQUEST["nume"] == "0";
                                                echo  "";
                                            } else {
                                                if ($pagina > 1)
                                                    $ant = $_REQUEST["nume"] - 1;
                                                echo "<a class='page-link' aria-label='Anterior' href='biblioteca.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Anterior</span></a>";
                                                echo "<li class='page-item '><a class='page-link' href='biblioteca.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
                                            }
                                            echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
                                            $sigui = $_REQUEST["nume"] + 1;
                                            $ultima = $num_registros / $registros;
                                            if ($ultima == $_REQUEST["nume"] + 1) {
                                                $ultima == "";
                                            }
                                            if ($pagina < $paginas && $paginas > 1)
                                                echo "<li class='page-item'><a class='page-link' href='biblioteca.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
                                            if ($pagina < $paginas && $paginas > 1)
                                                echo "
                                    <li class='page-item'><a class='page-link' aria-label='Siguiente' href='biblioteca.php?nume=" . ceil($ultima) . "'><span class='sr-only'>Siguiente</span><span aria-hidden='true'>&raquo;</span></a>
                                    </li>";
                                            ?>
                                    </ul>
                                </div>
                        
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
<?php
    }
}
?>