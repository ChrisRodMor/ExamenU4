<?php
include_once "../../app/config.php";
?>


<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php

  include "../layouts/head.php";

  ?>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">


  <?php

  include "../layouts/sidebar.php";

  ?>

  <?php

  include "../layouts/nav.php";

  ?>



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Profile</li>
                <li class="breadcrumb-item" aria-current="page">User List</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">User List</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->


      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card border-0 table-card user-profile-list">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="pc-dt-simple">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Creation date</th>
                      <th>Profile</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-inline-block align-middle">
                          <img
                            src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg"
                            alt="user image"
                            class="img-radius align-top m-r-15"
                            style="width: 40px" />
                          <div class="d-inline-block">
                            <h6 class="m-b-0">Jonathan Soto</h6>
                            <p class="m-b-0 text-primary">Administrador</p>
                          </div>
                        </div>
                      </td>
                      <td>jsoto@uabcs.mx</td>
                      <td>6123480678</td>
                      <td>2022-09-24T17:25:25.000000Z</td>
                      <td>
                        <a href="detailsUser">
                          <button class="btn btn-primary">Profile</button>
                        </a>
                        <div class="overlay-edit">
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-s btn btn-link-warning"><i class="ti ti-pencil f-18"></i></a>
                            </li>
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-inline-block align-middle">
                          <img
                            src="<?= BASE_PATH ?>assets/images/user/avatar-2.jpg"
                            alt="user image"
                            class="img-radius align-top m-r-15"
                            style="width: 40px" />
                          <div class="d-inline-block">
                            <h6 class="m-b-0">Niggel Alexis Altamirano Hernandez</h6>
                            <p class="m-b-0 text-primary">Administrador</p>
                          </div>
                        </div>
                      </td>
                      <td>nial_19@alu.uabcs.mx</td>
                      <!-- TODO: HACER UNA FUNCIÓN POR SI PHONE = NULL -->
                      <td>No encontrado</td>
                      <td>2022-09-24T17:25:25.000000Z</td>
                      <td>
                        <a href="detailsUser">
                          <button class="btn btn-primary">Profile</button>
                        </a>
                        <div class="overlay-edit">
                          <ul class="list-inline mb-0">
                            <!-- TODO: IMPLEMENTAR FUNCION PARA EDITAR -->
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-s btn btn-link-warning"><i class="ti ti-pencil f-18"></i></a>
                            </li>
                            <!-- TODO: IMPLEMENTAR FUNCIÓN PARA ELIMINAR -->
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal" style="margin-top: 15px; margin-bottom: 15px;">Crear Usuario</a>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>

  <!-- MODAL AGREGAR -->
  <modal class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-light">
        <div class="modal-header">
          <h5 class="modal-title text-light" id="addUserModalLabel">Añadir Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- TODO: HACER FUNCIONAR EL MODAL -->
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="UserName" class="form-label text-light">Nombre</label>
              <input type="text" class="form-control bg-dark text-light" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="UserLastName" class="form-label text-light">Apellido(s)</label>
              <input type="text" class="form-control bg-dark text-light" id="lastName" name="lastName" required>
            </div>
            <div class="mb-3">
              <label for="UserEmail" class="form-label text-light">Email</label>
              <input type="email" class="form-control bg-dark text-light" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="UserPhone" class="form-label text-light">Teléfono</label>
              <input type="tel" class="form-control bg-dark text-light" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
              <label for="UserRole" class="form-label text-light">Rol</label>
              <input type="text" class="form-control bg-dark text-light" id="role" name="role" required>
            </div>
            <div class="mb-3">
              <label for="UserPassword" class="form-label text-light">Contraseña</label>
              <input type="password" class="form-control bg-dark text-light" id="password" name="password" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </modal>

  <!-- [ Main Content ] end -->
  <!-- [Page Specific JS] start -->
  <script src="<?= BASE_PATH ?>assets/js/plugins/simple-datatables.js"></script>
  <script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
      sortable: false,
      perPage: 5
    });
  </script>
  <!-- [Page Specific JS] end -->

  <?php

  include "../layouts/footer.php";
  include "../layouts/scripts.php";

  ?>

</body>
<!-- [Body] end -->

</html>