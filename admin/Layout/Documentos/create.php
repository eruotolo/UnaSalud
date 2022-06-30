<?php
include('../Config/Database.php');
session_start();

?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Crear Documentos </h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-8">
                        <form method="POST" action="../Controller/Documentos.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_charla_doc" id="id_charla_doc" value="<?php echo $row['id_char'] ?> ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nombre Documento</label>
                                        <input type="text" class="form-control" id="nombre_doc" name="nombre_doc" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor" value="" required>
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
                                    <a class="btn bg-gradient-danger" href="../index.php?page=3">Volver</a>
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