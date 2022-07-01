<?php session_start();?>
<div class="container-fluid perfil-imagen">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('assets/img/curved-images/curved-new.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="assets/img/img-perfil.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
          <?php echo $row['nombre_usuario']; ?>
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            <?php echo $row['email']; ?>
          </p>
        </div>
      </div>
      
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 col-xl-12 ">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Información</h6>
            </div>
            <div class="col-md-4 text-end">
              <a href="javascript:;">
                <!-- <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i> -->
              </a>
            </div>
          </div>
        </div>

        <div class="card-body ">
            <div class="row">
                <div class="col-4">
                    <p class="text-sm">
                        Identificador de Usuario:       <?php echo $row['id_usuario']; ?>
                    </p>
                </div>
                <div class="col-4">
                    <p class="text-sm">
                        Nombre:        <?php echo $row['nombre_usuario']; ?>
                    </p>
                </div>
                <div class="col-4">
                    <p class="text-sm">
                        Correo:        <?php echo $row['email']; ?>
                    </p>
                </div>
            </div>
         
        </div>
      </div>
    </div>
  </div>
</div>