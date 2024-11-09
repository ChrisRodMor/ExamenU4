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
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
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
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="sticky-md-top product-sticky">
                    <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                      <div class="carousel-inner bg-light rounded position-relative">
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                        <div class="card-body position-absolute bottom-0 end-0">
                          <ul class="list-inline ms-auto mb-0 prod-likes">
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-zoom-in f-18"></i>
                              </a>
                            </li>
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-zoom-out f-18"></i>
                              </a>
                            </li>
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-rotate-clockwise f-18"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="carousel-item active">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-1.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-2.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-5.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-6.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-7.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-8.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                      </div>
                      <ol class="list-inline carousel-indicators position-relative product-carousel-indicators my-sm-3 mx-0">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="list-inline-item w-25 h-auto active">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-1.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-2.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-5.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-6.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-7.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-8.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <span class="badge bg-success f-14">In stock</span>
                  <h2 class="my-3">Colchón Matrimonial Victory</h2>
                  <div class="star f-18 mb-3">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    <i class="far fa-star text-muted"></i>
                    <span class="text-sm text-muted">(4.0)</span>
                  </div>
                  <h3 class="mt-4 mb-sm-3 mb-2 f-w-500">Detalles</h3>
                  <div>
                    <h4>
                      Los buenos días empiezan en tu dormitorio, especialmente en este colchón matrimonial Spring Air modelo Victory.
                    </h4>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-form-label col-lg-3 col-sm-12">Colors <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
                      <div class="form-check form-check-inline color-checkbox mb-0">
                        <input class="form-check-input" type="radio" name="product_color" checked />
                        <i class="fas fa-circle text-primary"></i>
                      </div>
                      <div class="form-check form-check-inline color-checkbox mb-0">
                        <input class="form-check-input" type="radio" name="product_color" />
                        <i class="fas fa-circle text-secondary"></i>
                      </div>
                      <div class="form-check form-check-inline color-checkbox mb-0">
                        <input class="form-check-input" type="radio" name="product_color" />
                        <i class="fas fa-circle text-danger"></i>
                      </div>
                      <div class="form-check form-check-inline color-checkbox mb-0">
                        <input class="form-check-input" type="radio" name="product_color" />
                        <i class="fas fa-circle text-dark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                    <label class="col-form-label col-lg-3 col-sm-12">
                      <span class="d-block">Size</span>
                      <a class="link-primary text-sm text-decoration-underline">Size Chart?</a></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                      <div class="row g-2">
                        <div class="col-auto">
                          <input type="radio" class="btn-check" id="btnrdolite1" name="btn_radio2" checked />
                          <label class="btn btn-sm btn-light-primary" for="btnrdolite1">Small</label>
                        </div>
                        <div class="col-auto">
                          <input type="radio" class="btn-check" id="btnrdolite2" name="btn_radio2" />
                          <label class="btn btn-sm btn-light-primary" for="btnrdolite2">Medium</label>
                        </div>
                        <div class="col-auto">
                          <input type="radio" class="btn-check" id="btnrdolite3" name="btn_radio2" />
                          <label class="btn btn-sm btn-light-primary" for="btnrdolite3">Large</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-form-label col-lg-3 col-sm-12">Stock <span class="text-danger">*</span></label>
                    <h4 class="col-lg-6 col-md-12 col-sm-12">
                      15
                    </h4>
                  </div>
                  <h3 class="mb-4"><b>$10999.99</b><span class="mx-2 f-16 text-muted f-w-400 text-decoration-line-through">$399.00</span></h3>
                  <div class="row">
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-primary">Buy Now</button>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-outline-secondary">Add to cart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header pb-0">
              <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="ecomtab-tab-1"
                    data-bs-toggle="tab"
                    href="#ecomtab-1"
                    role="tab"
                    aria-controls="ecomtab-1"
                    aria-selected="true">Features
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-3"
                    data-bs-toggle="tab"
                    href="#ecomtab-3"
                    role="tab"
                    aria-controls="ecomtab-3"
                    aria-selected="true">Overview
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                  <div class="table-responsive">

                    <div class="table-responsive">
                      <p class="text-muted">
                        Cuenta con una unidad de 510 resortes continuos que aseguran una perfecta estabilidad; además, los materiales poseen una tecnología repelente a
                        los ácaros y demás bichos portadores de enfermedades, así como un retardante de fuego que previene la propagación de flamas en caso de siniestro.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">

                  <table class="table table-borderless mb-0">
                    <tbody>
                      <tr>
                        <td class="text-muted py-1 border-top-0">Brand :</td>
                        <td class="py-1 border-top-0">Spring Air</td>
                      </tr>
                      <tr>
                        <td class="text-muted py-1">Tags :</td>
                        <td class="py-1">Muebles | Hogar | Baño</td>
                      </tr>
                      <tr>
                        <td class="text-muted py-1">Categories :</td>
                        <td class="py-1">Hogar y Muebles</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="ecomtab-4" role="tabpanel" aria-labelledby="ecomtab-tab-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                          <div class="chat-avtar">
                            <img class="img-radius img-fluid wid-40" src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg" alt="User image" />
                            <div class="bg-success chat-badge"></div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-1">Harriet Wilson</h6>
                          <p class="text-muted text-sm mb-1">2 hour ago</p>
                          <div class="star">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-muted"></i>
                          </div>
                          <p class="mb-0 text-muted mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                          <div class="chat-avtar">
                            <img class="img-radius img-fluid wid-40" src="<?= BASE_PATH ?>assets/images/user/avatar-2.jpg" alt="User image" />
                            <div class="bg-success chat-badge"></div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-1">Lou Olson</h6>
                          <p class="text-muted text-sm mb-1">2 hour ago</p>
                          <div class="star">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                          </div>
                          <p class="mb-2 text-muted mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500.</p>
                          <a href="#" class="link-primary mb-1">https://phoenixcoded.net/</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-3">
                    <button class="btn btn-link-primary">View more comments</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">

              <div class="container mt-5">
                <!-- Presentación 1 -->
                <h2 class="text-primary mb-3">Presentación 1: Colchón Matrimonial Victory</h2>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                      <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Código</th>
                        <th>Peso (gramos)</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>Stock Min</th>
                        <th>Stock Max</th>
                        <th>Precio Actual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2</td>
                        <td>Colchón Matrimonial Victory</td>
                        <td>comavi01</td>
                        <td>10000</td>
                        <td class="text-success">Activo</td>
                        <td><img src="colchon_victory.jpg" alt="Imagen del colchón" width="50"></td>
                        <td>15</td>
                        <td>1</td>
                        <td>25</td>
                        <td>$10,999.99</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Órdenes de Presentación 1 -->
                <h4 class="text-secondary mb-3">Órdenes de Presentación 1</h4>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead class="table-secondary">
                      <tr>
                        <th>ID Orden</th>
                        <th>Folio</th>
                        <th>Total</th>
                        <th>Pagado</th>
                        <th>ID Cliente</th>
                        <th>ID Dirección</th>
                        <th>ID Estado Orden</th>
                        <th>ID Tipo Pago</th>
                        <th>ID Cupón</th>
                        <th>Cantidad</th>
                        <th>ID Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>82712</td>
                        <td>$8,999.99</td>
                        <td class="text-success">Pagado</td>
                        <td>4</td>
                        <td>13</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Presentación 2 -->
                <h2 class="text-primary mb-3">Presentación 2: Colchón Queen Memory Foam</h2>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                      <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Código</th>
                        <th>Peso (gramos)</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>Stock Min</th>
                        <th>Stock Max</th>
                        <th>Precio Actual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>3</td>
                        <td>Colchón Queen Memory Foam</td>
                        <td>comqmf01</td>
                        <td>12000</td>
                        <td class="text-success">Activo</td>
                        <td><img src="colchon_memory_foam.jpg" alt="Imagen del colchón" width="50"></td>
                        <td>10</td>
                        <td>2</td>
                        <td>20</td>
                        <td>$12,499.99</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Órdenes de Presentación 2 -->
                <h4 class="text-secondary mb-3">Órdenes de Presentación 2</h4>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead class="table-secondary">
                      <tr>
                        <th>ID Orden</th>
                        <th>Folio</th>
                        <th>Total</th>
                        <th>Pagado</th>
                        <th>ID Cliente</th>
                        <th>ID Dirección</th>
                        <th>ID Estado Orden</th>
                        <th>ID Tipo Pago</th>
                        <th>ID Cupón</th>
                        <th>Cantidad</th>
                        <th>ID Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>4</td>
                        <td>82730</td>
                        <td>$12,499.99</td>
                        <td class="text-success">Pagado</td>
                        <td>3</td>
                        <td>14</td>
                        <td>2</td>
                        <td>1</td>
                        <td>3</td>
                        <td>1</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>82731</td>
                        <td>$24,999.98</td>
                        <td class="text-danger">No pagado</td>
                        <td>6</td>
                        <td>15</td>
                        <td>3</td>
                        <td>2</td>
                        <td>4</td>
                        <td>2</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>82732</td>
                        <td>$37,499.97</td>
                        <td class="text-success">Pagado</td>
                        <td>5</td>
                        <td>16</td>
                        <td>4</td>
                        <td>3</td>
                        <td>5</td>
                        <td>3</td>
                        <td>3</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
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
    // quantity start
    function increaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById(temp).value = value;
    }

    function decreaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? (value = 1) : '';
      value--;
      document.getElementById(temp).value = value;
    }
    // quantity end
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>