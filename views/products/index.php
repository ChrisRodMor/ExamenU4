<?php
include_once "../../app/config.php";
include_once "../../app/ProductController.php";
include_once "../../app/BrandController.php";
include_once "../../app/CategoryController.php";
include_once "../../app/TagController.php";


$productController = new ProductController();
$products = $productController->getProducts();

$brandController = new BrandController();
$brands = $brandController->getBrands();

$categoryController = new CategoryController();
$categories = $categoryController->getCategories();

$tagController = new TagController();
$tags = $tagController->getTags();

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
              <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal" style = "margin-bottom: 15px;">Crear producto</a>
              <!-- Vista de productos -->
              <div class="row">
                <?php foreach ($products as $product): ?>
                  <div class="col-xl-4 col-sm-6">
                    <div class="product-card card">
                      <div class="card-img-top">
                        <a href="/application/ecom_product-details">
                          <img src="<?php echo htmlspecialchars($product['cover']); ?>" alt="image" class="img-prod img-fluid" loading="lazy" width="800" height="800" decoding="async" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="prod-title mb-2"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="prod-description text-muted mb-2"><?= htmlspecialchars($product['description']) ?></p>
                        <p class="prod-brand text-muted mb-3">Marca: <?= htmlspecialchars($product['brand']['name']) ?></p>
                        <div class="d-grid gap-2">
                          <a href="detailsProduct?slug=<?= htmlspecialchars($product['slug']) ?>" class="btn btn-primary">Detalles</a>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>

                          <!-- Formulario para eliminar producto -->
                          <form action="api-products" method="POST" class="d-grid gap-2">
                            <input type="hidden" name="global_token" value="<?php echo htmlspecialchars($globalToken); ?>">
                            <input type="hidden" name="action" value="deleteProduct">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>


              <!-- MODAL AGREGAR PRODUCTO -->
              <modal class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                      <div class="modal-header">
                        <h5 class="modal-title text-light" id="addProductModalLabel">Añadir Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="api-products" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="action" value="addProduct">
                          <input type="hidden" name="global_token" value="<?php echo htmlspecialchars($globalToken); ?>">

                          <!-- Nombre del producto -->
                          <div class="mb-3">
                            <label for="productName" class="form-label text-light">Nombre</label>
                            <input type="text" class="form-control bg-dark text-light" id="name" name="name" required>
                          </div>

                          <!-- Slug -->
                          <div class="mb-3">
                            <label for="productSlug" class="form-label text-light">Slug</label>
                            <input type="text" class="form-control bg-dark text-light" id="slug" name="slug" required>
                          </div>

                          <!-- Descripción -->
                          <div class="mb-3">
                            <label for="productDescription" class="form-label text-light">Descripción</label>
                            <textarea class="form-control bg-dark text-light" id="description" name="description" rows="3" required></textarea>
                          </div>

                          <!-- Características -->
                          <div class="mb-3">
                            <label for="productFeatures" class="form-label text-light">Características</label>
                            <input type="text" class="form-control bg-dark text-light" id="features" name="features" required>
                          </div>

                          <!-- Imagen -->
                          <div class="mb-3">
                            <label for="productImage" class="form-label text-light">Imagen</label>
                            <input type="file" class="form-control bg-dark text-light" id="cover" name="cover" accept="image/*" required>
                          </div>

                          <!-- Marca -->
                          <div class="mb-3">
                            <label for="productBrand" class="form-label text-light">Marca</label>
                            <select class="form-control bg-dark text-light" id="brand_id" name="brand_id" required>
                              <?php foreach ($brands as $brand): ?>
                                <option value="<?php echo htmlspecialchars($brand['id']); ?>">
                                  <?php echo htmlspecialchars($brand['name']); ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>

          <!-- Tags -->
          <div class="mb-3">
            <label for="productTags" class="form-label text-light">Tags</label>
            <select class="form-control bg-dark text-light select-multiple" id="productTags" name="tags[]" multiple style="height: auto; overflow-y: auto; max-height: 150px;" required>
              <?php foreach ($tags as $tag): ?>
                <option value="<?php echo htmlspecialchars($tag['id']); ?>">
                  <?php echo htmlspecialchars($tag['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div id="selectedTags" class="selected-items-container mt-3"></div>

          <!-- Categorías -->
          <div class="mb-3">
            <label for="productCategories" class="form-label text-light">Categorías</label>
            <select class="form-control bg-dark text-light select-multiple" id="productCategories" name="categories[]" multiple style="height: auto; overflow-y: auto; max-height: 150px;" required>
              <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['id']); ?>">
                  <?php echo htmlspecialchars($category['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div id="selectedCategories" class="selected-items-container mt-3"></div>

          <!-- Botones de modal -->
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
                      <h5 class="modal-title text-light" id="editProductModalLabel">Editar Producto</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="api-products" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="productName" class="form-label text-light">Nombre</label>
                          <input type="text" class="form-control bg-dark text-light" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                          <label for="productSlug" class="form-label text-light">Slug</label>
                          <input type="text" class="form-control bg-dark text-light" id="slug" name="slug" required>
                        </div>
                        <div class="mb-3">
                          <label for="productDescription" class="form-label text-light">Descripción</label>
                          <textarea class="form-control bg-dark text-light" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="productFeatures" class="form-label text-light">Características</label>
                          <input type="text" class="form-control bg-dark text-light" id="features" name="features" required>
                        </div>
                        <div class="mb-3">
                          <label for="productImage" class="form-label text-light">Imagen</label>
                          <input type="file" class="form-control bg-dark text-light" id="cover" name="cover" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                          <label for="productBrand" class="form-label text-light">Marca</label>
                          <select class="form-control bg-dark text-light" id="brand_id" name="brand_id" required>
                            <option value="1">Marca 1</option>
                            <option value="2">Marca 2</option>
                            <option value="3">Marca 3</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productTags" class="form-label text-light">Tags</label>
                          <select class="form-control bg-dark text-light select-multiple" id="productTags" style="height: auto; overflow-y: auto; max-height: 150px;">
                            <option value="1">Muebles</option>
                            <option value="2">Hogar</option>
                          </select>
                        </div>

                        <div id="selectedTags" class="selected-items-container mt-3"></div>

                        <div class="mb-3">
                          <label for="productCategories" class="form-label text-light">Categories</label>
                          <select class="form-control bg-dark text-light select-multiple" id="productCategories" style="height: auto; overflow-y: auto; max-height: 150px;">
                            <option value="3">Cocina y Electrodomésticos</option>
                            <option value="4">Celulares</option>
                          </select>
                        </div>

                        <div id="selectedCategories" class="selected-items-container mt-3"></div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
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

  function setupMultiSelect(selectElementId, selectedContainerId) {
    const selectElement = document.getElementById(selectElementId);
    const selectedContainer = document.getElementById(selectedContainerId);

    // Agregar elemento seleccionado
    function addSelectedItem(itemText, itemValue) {
      const item = document.createElement("div");
      item.classList.add("selected-item");
      item.setAttribute("data-value", itemValue);

      item.innerHTML = `
        ${itemText}
        <span class="remove-item" onclick="removeSelectedItem('${selectElementId}', '${itemValue}')">&times;</span>
      `;

      selectedContainer.appendChild(item);
    }

    // Detectar cambios en el select
    selectElement.addEventListener("change", (event) => {
      const selectedOptions = Array.from(event.target.selectedOptions);
      selectedOptions.forEach((option) => {
        if (!document.querySelector(`#${selectedContainerId} [data-value="${option.value}"]`)) {
          addSelectedItem(option.text, option.value);
        }
      });
    });
  }

  // Remover elemento seleccionado
  function removeSelectedItem(selectElementId, itemValue) {
    const selectElement = document.getElementById(selectElementId);
    Array.from(selectElement.options).forEach((option) => {
      if (option.value === itemValue) {
        option.selected = false;
      }
    });

    const selectedItem = document.querySelector(`[data-value="${itemValue}"]`);
    if (selectedItem) {
      selectedItem.remove();
    }
  }

  // Inicializar multiselect para tags y categories
  setupMultiSelect("productTags", "selectedTags");
  setupMultiSelect("productCategories", "selectedCategories");
</script>


  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>

<style>
  /* CSS PERSONALIZADO */
  .selected-items-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .selected-item {
    background-color: #04a9f5;
    color: white;
    padding: 4px 8px;
    border-radius: 16px;
    display: flex;
    align-items: center;
  }

  .selected-item .remove-item {
    margin-left: 8px;
    cursor: pointer;
    color: #ffffff;
    font-weight: bold;
  }
</style>