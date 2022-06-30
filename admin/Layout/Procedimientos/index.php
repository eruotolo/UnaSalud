<?php
include('../Config/Database.php');
session_start();
?>


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>Procedimientos</h3>
                    <a class="btn bg-gradient-info" href="?page=9">Nuevo Procedimiento</a>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulo</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripcion</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autor</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *
                                        FROM procedimientos C
                                        INNER JOIN usuarios U
                                        ON C.id_usuario = U.id_usuario
                                        JOIN categorias CA
                                        ON C.id_categoria = CA.id_cat";
                                    $result_task = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_Array($result_task)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $row['nombre'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['descripcion'] ?></p>
                                                <p class="text-xs text-secondary mb-0"><?php echo $row['link_video'] ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['nombre_cat'] ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['autor'] ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $row['create_at'] ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <form action="Procedimientos/create-doc.php" method="post">
                                                    <input type="hidden" name="id_proc" id="id_proc" value="<?php echo $row['id_proc'] ?>">
                                                    <input class="btn bg-gradient-warning" type="submit" name="edit" value="Documentos">
                                                </form>
                                            </td>
                                            <td class="align-middle">
                                                <form action="Procedimientos/edit.php" method="post">
                                                    <input type="hidden" name="id_proc" id="id_proc" value="<?php echo $row['id_proc'] ?>">
                                                    <input class="btn btn-default" type="submit" name="edit" value="Editar">
                                                </form>
                                            </td>
                                            <td class="align-middle">

                                                <a href="../Controller/Procedimientos.php?id_proc=<?php echo $row['id_proc'] ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Edit user">
                                                    Elimnar
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h3>Documentos Procedimientos</h3>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre documento</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ruta</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pertenece</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Publicado</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accion</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *
                                        FROM documentos D
                                        INNER JOIN procedimientos P
                                        ON D.id_procedimiento_doc = P.id_proc";
                                    $result_task = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_Array($result_task)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $row['nombre_doc'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['ruta_doc'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0"><?php echo $row['nombre'] ?></p>
                                                <p class="text-xs text-secondary mb-0"><?php echo $row['id_procedimiento_doc'] ?></p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $row['create_at'] ?></span>
                                            </td>



                                            <td>
                                                <a href="../Controller/Documentos.php?id_doc=<?php echo $row['id_doc'] ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Edit user">
                                                    Elimnar
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>