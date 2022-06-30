<?php
include('../Config/Database.php');
session_start();

?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Registrar usuario </h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-8 pt-5">
                        <form action="../Controller/Usuarios.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nombres</label>
                                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Miguel Campos" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Correo electronico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="correo@correo.cl" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Clave</label>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="ABC1234" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
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
                                                    <option <?= $selected ?> value="<?= $rowc['id'] ?>"><?= $rowc['nombre'] ?></option>
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
                                    <a class="btn bg-gradient-danger" href="../index.php">Volver</a>
                                    <input type="submit" class="btn btn-default" name="save_usuario" value="Publicar">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>