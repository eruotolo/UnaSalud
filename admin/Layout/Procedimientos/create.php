<?php
include('../Config/Database.php');
session_start();
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Nuevo Procedimiento </h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-8">
                        <form action="../Controller/Procedimientos.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Titulo</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Titulo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Codigo Video Youtube</label>

                                        <div class="input-group mb-4">
                                            
                                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                            <input class="form-control" id="link_video" name="link_video" placeholder="Z_srrmbPAYw" type="text">
                                            
                                        </div>
                                        <p>codigo despues del '=' y antes del '&' en la url</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" hidden>
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
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Correo</label>
                                        <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@unasalud.cl" 
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i> Publicado por: <?php echo $row['nombre_usuario']; ?></span>
                                        <input hidden class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" type="text" required>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn bg-gradient-danger" href="../index.php?page=4">Volver</a>
                            <input type="submit" class="btn btn-default" name="save_procedimiento" value="Publicar">
                        </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>