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

<body>

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
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!-- ORDERS -->
                    <div class="col-lg-12 col-xxl-12">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="orders" role="tabpanel">
                                <div class="container my-3">
                                    <div class="row">
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="border card">
                                                <div class="p-2 card-body">
                                                    <h6 class="mb-2">Folio: 82712</h6>
                                                    <ul class="list-group list-group-flush my-2">
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Total:</span>
                                                            <strong>$8999.99</strong>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Status:</span>
                                                            <span>Pendiente de pago</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Payment:</span>
                                                            <span>Efectivo</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Productos:</span>
                                                            <span>2</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2">
                                                            <strong>Productos incluidos:</strong>
                                                            <ul class="mb-0 ps-3">
                                                                <li>Comedor Miguel con 4 Sillas - $450</li>
                                                                <li>Colchón Matrimonial Zero - $8999.99</li>
                                                            </ul>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2">
                                                            <strong>Dirección del cliente:</strong>
                                                            <p class="mb-0 ps-3">
                                                                Calle articulo 743, 123, La Paz, Baja California Sur, 23088
                                                            </p>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Cupón aplicado:</span>
                                                            <span>10% off</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order 2 -->
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="border card">
                                                <div class="p-2 card-body">
                                                    <h6 class="mb-2">Folio: 82718</h6>
                                                    <ul class="list-group list-group-flush my-2">
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Total:</span>
                                                            <strong>$9599.97</strong>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Status:</span>
                                                            <span>Cancelada</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Payment:</span>
                                                            <span>Tarjeta</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Productos:</span>
                                                            <span>3</span>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2">
                                                            <strong>Productos incluidos:</strong>
                                                            <ul class="mb-0 ps-3">
                                                                <li>Tostador Record 2 Rebanadas - $299.99</li>
                                                                <li>Escurridor de Acero para Platos Farberware - $6299.99</li>
                                                                <li>AirPods Pro con Estuche de Carga - $2999.99</li>
                                                            </ul>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2">
                                                            <strong>Dirección del cliente:</strong>
                                                            <p class="mb-0 ps-3">
                                                                Calle Lope de Rueda, 32, Cabanillas del Campo, Guadalajara, 19171
                                                            </p>
                                                        </li>
                                                        <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                            <span>Cupón aplicado:</span>
                                                            <span>15% off</span>
                                                        </li>
                                                    </ul>
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
        </div>
        <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        </div>
        <div class="modal fade modal-lightbox post-modal-lightbox" id="lightboxModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-5.jpg" alt="images" class="modal-image w-100 img-fluid" />
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- [Page Specific JS] start -->
        <script>
            var lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            var elem = document.querySelectorAll('[data-lightbox]');
            for (var j = 0; j < elem.length; j++) {
                elem[j].addEventListener('click', function() {
                    var images_path = event.target;
                    if (images_path.tagName == 'DIV') {
                        images_path = images_path.parentNode;
                    }
                    if (images_path.tagName == 'I') {
                        images_path = images_path.parentNode.parentNode;
                    }
                    var recipient = images_path.getAttribute('data-lightbox');
                    var image = document.querySelector('.modal-image');
                    image.setAttribute('src', recipient);
                    lightboxModal.show();
                });
            }

            function removeClassByPrefix(node, prefix) {
                for (let i = 0; i < node.classList.length; i++) {
                    let value = node.classList[i];
                    if (value.startsWith(prefix)) {
                        node.classList.remove(value);
                    }
                }
            }
        </script>
        <!-- [Page Specific JS] end -->
        <?php

        include "../layouts/footer.php";
        include "../layouts/scripts.php";

        ?>

    </body>
    <!-- [Body] end -->

</html>

<style>
    .soc-profile-data {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        /* Espacio entre elementos */
    }

    .soc-profile-data p {
        margin: 0;
        /* Elimina márgenes adicionales */
        font-size: 1rem;
        /* Ajusta el tamaño de fuente */
    }

    .soc-profile-data strong {
        color: #333;
        /* Color de los encabezados */
    }
</style>