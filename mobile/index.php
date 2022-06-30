<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Una Salud</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.svg"/>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Google Fonts Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
<section class="cabezal">
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand logo" href="../index.php"><img src="assets/img/logo-Una-salud-18.svg" alt="Logo"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>

<section id="main">

    <div class="slider">
        <h3>Una Salud</h3>
        <h6>Interacciones entre <br>salud humana, animal <br>y ambiental</h6>
        <div class="lema-slider">
            <p>Proyecto de Coperación <br>Académica <strong>Chile-Argentina</strong></p>
        </div>
    </div>

    <div class="campos-colapsable">
        <div class="container">
            <div class="row">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                El Proyecto
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h6>Una Salud Chile-Argentina es un Proyecto Colaborativo binacional liderado por la
                                    Universidad San Sebastián, Sede Patagonia y la Universidad de Río Negro, Sede Valle
                                    Medio - Alto Valle.</h6>
                                <br>
                                <h6>El objetivo es compartir experiencias y transferir conocimientos entre
                                    investigadores, académicos y estudiantes de ambas universidades, que permitan
                                    reflexionar sobre el desarrollo sostenible de la zona austral de Chile y Argentina
                                    bajo el concepto ‘Una Salud’.</h6>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                ¿Qué es una salud?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <img src="assets/img/img-que-es-01.png" alt="¿que es una salud?" class="img-fluid">

                                <h6>El concepto ‘Una salud’ postula que la salud de las personas está estrechamente
                                    conectada con la salud de los animales, la que a su vez se encuentra interconectada
                                    con la salud del medio ambiente en el que coexisten.</h6>
                                <br>
                                <h6>En este sentido, la Organización Mundial de la Salud (OMS), plantea la necesidad de
                                    aplicar a nivel mundial estrategias ‘One Health’ para facilitar la gestión integrada
                                    de la salud y con ello prevenir posibles eventos emergentes futuros.</h6>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                ¿Qué temas aborda el proyecto?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h6>Se abordan temas atingentes a ambos territorios, tales como:</h6>
                                <br>
                                <ul>
                                    <li>Enfermedades zoonóticas infecciosas.</li>
                                    <li>Salud en tiempos de pandemia.</li>
                                    <li>La necesidad de desarrollar nuevos
                                        antibacterianos.
                                    </li>
                                    <li>Sanidad animal.</li>
                                    <li>Monitoreo de la calidad del agua.</li>
                                    <li>Producción sostenible de alimentos.</li>
                                </ul>
                                <h6>El objetivo final es aportar al desarrollo social de las comunidades, promover el
                                    uso eficiente de los recursos naturales, y fomentar la resiliencia frente a
                                    desastres naturales.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="video-player">
        <iframe width="100%" height="550" src="https://www.youtube.com/embed/Z_srrmbPAYw" title="Charla"> </iframe>
    </div>

</section>


<!-- Optional JavaScript; choose one -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

</body>
</html>