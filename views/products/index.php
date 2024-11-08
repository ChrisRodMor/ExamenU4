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
    <div class="pc-content ">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/application/ecom_product#">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Products</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Products</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="ecom-wrapper">
            <div class="offcanvas-xxl offcanvas-start ecom-offcanvas" tabindex="-1" id="offcanvas_mail_filter" style="height: auto;">
              <div class="p-0 sticky-xxl-top offcanvas-body"></div>
            </div>
            <div class="ecom-content">

            <!-- TODO: Implementar funcionalidad a botones -->
              <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">Crear producto</a>
              <div class="row">
                <div class="col-xl-4 col-sm-6">
                  <div class="product-card card">
                    <div class="card-img-top">
                      <a href="/application/ecom_product-details">
                        <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" alt="image" class="img-prod img-fluid" loading="lazy" width="800" height="800" decoding="async"  />
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="prod-title mb-2">Apple Watch - Series 4</h5>
                      <p class="prod-description text-muted mb-2">Reloj inteligente de última generación con múltiples funcionalidades.</p>
                      <p class="prod-brand text-muted mb-3">Marca: Apple</p>
                      <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary btn-sm">Ver detalle</a>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL AGREGAR PRODUCTO -->
              <modal class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addProductModalLabel">Añadir Producto</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="productName" class="form-label">Nombre</label>
                          <input type="text" class="form-control bg-dark text-light" id="productName" required>
                        </div>
                        <div class="mb-3">
                          <label for="productSlug" class="form-label">Slug</label>
                          <input type="text" class="form-control bg-dark text-light" id="productSlug" required>
                        </div>
                        <div class="mb-3">
                          <label for="productDescription" class="form-label">Descripción</label>
                          <textarea class="form-control bg-dark text-light" id="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="productFeatures" class="form-label">Características</label>
                          <input type="text" class="form-control bg-dark text-light" id="productFeatures" required>
                        </div>
                        <div class="mb-3">
                          <label for="productImage" class="form-label">Imagen</label>
                          <input type="file" class="form-control bg-dark text-light" id="productImage" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                          <label for="productBrand" class="form-label">Marca</label>
                          <select class="form-control bg-dark text-light" id="productBrand" required>
                            <option value="1">Marca 1</option>
                            <option value="2">Marca 2</option>
                            <option value="3">Marca 3</option>
                          </select>
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

              <!-- MODAL EDITAR PRODUCTO -->
              <modal class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="editProductName" class="form-label">Nombre del Producto</label>
                          <input type="text" class="form-control bg-dark text-light" id="editProductName" required>
                        </div>
                        <div class="mb-3">
                          <label for="editProductSlug" class="form-label">Slug</label>
                          <input type="text" class="form-control bg-dark text-light" id="editProductSlug" required>
                        </div>
                        <div class="mb-3">
                          <label for="editProductDescription" class="form-label">Descripción</label>
                          <textarea class="form-control bg-dark text-light" id="editProductDescription" rows="3" required></textarea>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php

  include "../layouts/footer.php";

  ?>

  <?php

  include "../layouts/scripts.php";

  ?>


  <!-- [Page Specific JS] start -->
  <script>
    // scroll-block
    var tc = document.querySelectorAll('.scroll-block');
    for (var t = 0; t < tc.length; t++) {
      new SimpleBar(tc[t]);
    }
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>