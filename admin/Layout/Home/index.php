<?php
include('../Config/Database.php');
//recordamos la sesion

session_start();
$usuario = $_SESSION['usuarios'];
if (!isset($usuario)) {
    header("location: ../index.php");
}

$query = "SELECT * FROM usuarios WHERE email = '$usuario'";
$run = mysqli_query($conn, $query);
$row = $run->fetch_assoc();
$rol = $row['id_rol'];

if ($rol == 1) {
    $_SESSION["admin"] = "OK";
}
?>


<?php
if (@$_SESSION["admin"] == "OK") {
?>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header ">
                        <a class="btn bg-gradient-info" href="?page=12">Registrar usuario</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Roles</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *
                                        FROM usuarios U
                                        INNER JOIN roles R
                                        on U.id_rol = R.id";
                                    $result_task = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_Array($result_task)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $row['nombre_usuario'] ?></h6>
                                                        <p class="text-xs text-secondary mb-0"><?php echo $row['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['nombre'] ?></p>
                                            </td>
                                            <?php
                                            if ($row['is_activo'] == 1) {
                                                $success = "success";
                                                $msg = "Activo";
                                            } elseif ($row['is_activo'] == 0) {
                                                $success = "danger";
                                                $msg = "Inactivo";
                                            }
                                            ?>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-<? echo $success; ?>"><?php echo $msg; ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <form action="Home/edit.php" method="post">
                                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario'] ?>">
                                                    <input class="btn btn-default" type="submit" name="edit" value="Edit">
                                                </form>
                                            </td>
                                            <td>
                                            <a href="../Controller/Usuarios.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-default" data-toggle="tooltip" data-original-title="Eliminar">
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

<?php
}
?>