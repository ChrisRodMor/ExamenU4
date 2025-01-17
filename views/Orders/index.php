<?php
include_once "../../app/config.php";
include_once "../../app/OrderController.php";
include_once "../../app/ProductController.php";
include_once "../../app/ClientController.php";
include_once "../../app/AdressController.php";

$orderController = new OrderController();
$orders = $orderController->getOrders();

$productController = new ProductController();
$products = $productController->getProducts();

$clientController = new ClientController();
$clients = $clientController->getClients();
$client = [];

if (isset($_GET['id'])) {
    $client = $clientController->getClientByID($_GET['id']);
}

if (isset($_GET['client_id'])) {
    $clientId = intval($_GET['client_id']);

    $clientData = $clientController->getClientByID($clientId);

    if ($clientData) {
        echo json_encode($clientData);
    } else {
        echo json_encode(['error' => 'No se pudo obtener la información del cliente.']);
    }
} else {
    echo json_encode(['error' => 'ID del cliente no especificado.']);
}

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
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="products">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0)">Orders</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h2 class="mb-0">Orders</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="d-flex gap-2" style="margin-top: 15px; margin-bottom: 15px;">
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                        Crear Orden
                    </a>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#dateRangeModal">
                        Seleccionar rango de Fechas
                    </button>
                </div> -->

                <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="orders" role="tabpanel">
                                <div class="container my-3">
                                    <div class="row">
                                        <?php if (!empty($orders)) : ?>
                                            <?php foreach ($orders as $order) : ?>
                                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                    <div class="border card">
                                                        <div class="p-2 card-body">
                                                            <h6 class="mb-2">Folio: <?= htmlspecialchars($order['folio']); ?></h6>
                                                            <ul class="list-group list-group-flush my-2">
                                                                <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                                    <span>Total:</span>
                                                                    <strong>$<?= number_format($order['total'], 2); ?></strong>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                                    <span>Status:</span>
                                                                    <span>
                                                                        <?= match ($order['order_status_id']) {
                                                                            1 => 'Pendiente de pago',
                                                                            2 => 'Pagada',
                                                                            3 => 'Enviada',
                                                                            4 => 'Abandonado',
                                                                            5 => 'Pendiente de enviar',
                                                                            6 => 'Cancelada',
                                                                            default => 'N/A',
                                                                        }; ?>
                                                                    </span>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                                    <span>Payment:</span>
                                                                    <span>
                                                                        <?= match ($order['payment_type_id']) {
                                                                            1 => 'Efectivo',
                                                                            2 => 'Tarjeta',
                                                                            3 => 'Transferencia',
                                                                            default => 'Desconocido',
                                                                        }; ?>
                                                                    </span>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                                    <span>Productos:</span>
                                                                    <span><?= count($order['presentations']); ?></span>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2">
                                                                    <strong>Productos incluidos:</strong>
                                                                    <ul class="mb-0 ps-3">
                                                                        <?php foreach ($order['presentations'] as $product) : ?>
                                                                            <li><?= htmlspecialchars($product['description']) . ' - $' . number_format($product['current_price']['amount'], 2); ?></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2">
                                                                    <strong>Dirección del cliente:</strong>
                                                                    <p class="mb-0 ps-3">
                                                                        <?php if (!empty($order['client']) && !empty($order['client']['name']) && !empty($order['client']['email'])): ?>
                                                                            <?= htmlspecialchars($order['client']['name'] . ' - ' . $order['client']['email']); ?>
                                                                        <?php else: ?>
                                                                            <span>No hay clientes</span>
                                                                        <?php endif; ?>
                                                                    </p>
                                                                </li>
                                                                <li class="list-group-item px-0 py-2 d-flex justify-content-between">
                                                                    <span>Cupón aplicado:</span>
                                                                    <span><?= isset($order['coupon_id']) ? 'Sí' : 'No'; ?></span>
                                                                </li>
                                                            </ul>
                                                            <div class="d-flex justify-content-end mt-3">
                                                                <a href="detailsOrder?order_id=<?= htmlspecialchars($order['id']); ?>">
                                                                    <button class="btn btn-outline-primary btn-sm mb-1 mx-1 d-flex align-items-center justify-content-center" title="Info">
                                                                        <i class="ph-duotone ph-info"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editOrderModal<?= htmlspecialchars($order['id']) ?>" data-order-id="<?= htmlspecialchars($order['id']); ?>">
                                                                    <button class="btn btn-outline-warning btn-sm mx-1 d-flex align-items-center justify-content-center" title="Edit">
                                                                        <i class="ph-duotone ph-pencil"></i>
                                                                    </button>
                                                                </a>
                                                                
                                                                <form action="api-orders" method="POST" class="d-grid gap-2">
                                                                    <input type="hidden" name="global_token" value="<?php echo htmlspecialchars($globalToken); ?>">
                                                                    <input type="hidden" name="action" value="deleteOrder">
                                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($order['id']) ?>">
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm mx-1 d-flex align-items-center justify-content-center"><i class="ph-duotone ph-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- MODAL EDITAR -->
                                                <div class="modal fade" id="editOrderModal<?= htmlspecialchars($order['id']) ?>" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-dark text-light">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-light" id="editOrderModalLabel">Editar Orden</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="api-orders" method="POST">
                                                                    <input type="hidden" name="action" value="editOrder">
                                                                    <input type="hidden" name="global_token" value="<?= htmlspecialchars($globalToken) ?>">
                                                                    <input type="hidden" name="id" id="userId" value="<?= htmlspecialchars($order['id']) ?>">
                                                                    <!-- <div class="mb-3">
                                                                        <label for="folio" class="form-label text-light">Folio</label>
                                                                        <input type="text" class="form-control bg-dark text-light" id="folio" value="<?= htmlspecialchars($order['folio']); ?>" name="folio" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="total" class="form-label text-light">Monto de la orden</label>
                                                                        <input type="text" class="form-control bg-dark text-light" id="total" value="<?= htmlspecialchars($order['total']); ?>" name="total" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="is_paid" class="form-label text-light">¿Ha sido pagada?</label>
                                                                        <select class="form-select bg-dark text-light" id="is_paid" name="is_paid" required>
                                                                            <?php if (isset($order['is_paid'])): ?>
                                                                                <option value="" disabled selected>
                                                                                    <?= $order['is_paid'] == 1 ? 'Sí' : 'No'; ?>
                                                                                </option>
                                                                            <?php else: ?>
                                                                                <option value="" disabled selected>Seleccione una opción</option>
                                                                            <?php endif; ?>
                                                                            <option value="1">Sí</option>
                                                                            <option value="0">No</option>
                                                                        </select>
                                                                    </div> -->
                                                                    <!-- <div class="mb-3">
                                                                        <label for="client_id" class="form-label text-light">Cliente</label>
                                                                        <select class="form-select bg-dark text-light" id="clientId" name="client_id" required>
                                                                            <?php 
                                                                                $selectedClientName = '';
                                                                                if (isset($order['client_id'])) {
                                                                                    foreach ($clients as $client) {
                                                                                        if ($client['id'] == $order['client_id']) {
                                                                                            $selectedClientName = htmlspecialchars($client['name']);
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            <option value="" disabled selected>
                                                                                <?= !empty($selectedClientName) ? $selectedClientName : 'Seleccione un cliente'; ?>
                                                                            </option>

                                                                            <?php foreach ($clients as $client): ?>
                                                                                <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['name']) ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>   -->
                                                                    <!-- <div class="mb-3">
                                                                        <label for="address_id" class="form-label text-light">Dirección</label>
                                                                        <input type="text" class="form-control bg-dark text-light" id="address_id" name="address_id" readonly>
                                                                    </div> -->
                                                                    <div class="mb-3">
                                                                        <label for="order_status_id" class="form-label text-light">Estatus de la orden</label>
                                                                        <select class="form-select bg-dark text-light" id="order_status_id" name="order_status_id" required>
                                                                            <option value="<?= $order['order_status']['id'] ?>" disabled selected><?= htmlspecialchars($order['order_status']['name']) ?></option>
                                                                            <option value="1">Pendiente de pago</option>
                                                                            <option value="2">Pagada</option>
                                                                            <option value="3">Enviada</option>
                                                                            <option value="4">Abandonado</option>
                                                                            <option value="5">Pendiente de enviar</option>
                                                                            <option value="6">Cancelada</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- <div class="mb-3">
                                                                        <label for="payment_type_id" class="form-label text-light">¿Método de pago?</label>
                                                                        <select class="form-select bg-dark text-light" id="payment_type_id" value="<?= htmlspecialchars($order['payment_type_id']); ?>" name="payment_type_id" required>
                                                                            <option value="" disabled selected>Seleccione un método de pago</option>
                                                                            <option value="1">Efectivo</option>
                                                                            <option value="2">Tarjeta</option>
                                                                            <option value="3">Transferencia</option>
                                                                        </select>
                                                                    </div> -->
                                                                    <!-- <div class="mb-3">
                                                                        <label for="coupon_id" class="form-label text-light">Cupón</label>
                                                                        <select class="form-select bg-dark text-light" id="coupon_id" value="<?= htmlspecialchars($order['coupon_id']); ?>" name="coupon_id" required>
                                                                            <option value="" disabled selected>Seleccione un cupón promocional</option>
                                                                            <option value="1">10% OFF</option>
                                                                            <option value="2">15% OFF</option>
                                                                            <option value="3">100MXN OFF</option>
                                                                            <option value="4">50 MXN OFF</option>
                                                                            <option value="5">20% OFF</option>
                                                                            <option value="6">500MNX OFF</option>
                                                                            <option value="7">5% OFF</option>
                                                                            <option value="8">25% OFF (Cupón navideño)</option>
                                                                            <option value="9">200 MXN OFF</option>
                                                                        </select>
                                                                    </div> -->
                                                                    <!-- <div id="select-container-2">
                                                                        <div class="mb-3">
                                                                            <label for="modal2[0][id]" class="form-label text-light">Producto 1</label>
                                                                            <select class="form-select bg-dark text-light" id="modal2[0][id]" value="<?= htmlspecialchars($order['presentations[0][id]']); ?>" name="presentations[0][id]" required>
                                                                                <option value="" disabled selected>Seleccione un producto</option>
                                                                                <option value="1">Product1</option>
                                                                                <option value="2">Product2</option>
                                                                            </select>
                                                                            <label for="modal2[0][quantity]" class="form-label text-light mt-2">Cantidad producto 1</label>
                                                                            <input type="text" class="form-control bg-dark text-light" id="modal2[0][quantity]" value="<?= htmlspecialchars($order['presentations[0][quantity]']); ?>" name="presentations[0][quantity]" required>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <button type="button" class="btn btn-primary mt-3 add-select-btn" data-container="select-container-2">Agregar otro</button> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p>No se encontraron órdenes.</p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Contenedor para mostrar las variables -->
                                    <div class="mt-3">
                                        <p id="variablesDisplay" style="display: none;" class="text-success"></p>
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

        <!-- MODAL AGREGAR -->
        <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="addOrderModalLabel">Añadir Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="api-orders" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="action" value="addOrder">
                            <input type="hidden" name="global_token" value="<?php echo htmlspecialchars($globalToken); ?>">

                            <div class="mb-3">
                                <label for="folio" class="form-label text-light">Folio</label>
                                <input type="text" class="form-control bg-dark text-light" name="folio" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="total" class="form-label text-light">Monto de la Orden</label>
                                <input type="number" class="form-control bg-dark text-light" id="total" name="total" step="10" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="order_status_id" class="form-label text-light">Estatus de la orden</label>
                                <select class="form-select bg-dark text-light" name="order_status_id" required>
                                    <option value="" disabled selected>Estado de la orden</option>
                                    <option value="1">Pendiente de pago</option>
                                    <option value="2">Pagado</option>
                                    <option value="3">Enviada</option>
                                    <option value="4">Abonado</option>
                                    <option value="5">Pendiente de enviar</option>
                                    <option value="6">Cancelada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_type_id" class="form-label text-light">¿Método de pago?</label>
                                <select class="form-select bg-dark text-light" id="paymentTypeId" name="payment_type_id" required>
                                    <option value="" disabled selected>Seleccione un método de pago</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Tarjeta</option>
                                    <option value="3">Transferencia</option>
                                </select>
                            </div>
                            <!-- Productos dinámicos -->
                            <div id="select-container">
                                <div class="product-row">
                                    <label for="presentations[0][id]" class="form-label text-light">Producto</label>
                                    <select class="form-select bg-dark text-light" name="presentations[0][id]" required>
                                        <option value="" disabled selected>Seleccione un producto</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="presentations[0][quantity]" class="form-label text-light mt-2">Cantidad</label>
                                    <input type="number" class="form-control bg-dark text-light" min="0" name="presentations[0][quantity]" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3 add-select-btn">Agregar otro producto</button>
                            <div class="mb-3">
                                <label for="addressId" class="form-label text-light">Dirección</label>
                                <input type="number" class="form-control bg-dark text-light" min = "1" id="addressId" name="address_id" step="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="coupon_id" class="form-label text-light">Cupón</label>
                                <select class="form-select bg-dark text-light" id="couponId" name="coupon_id">
                                    <option value="" disabled selected>Seleccione un cupón promocional</option>
                                    <option value="1">10% OFF</option>
                                    <option value="2">15% OFF</option>
                                    <option value="3">100MXN OFF</option>
                                    <option value="4">50 MXN OFF</option>
                                    <option value="5">20% OFF</option>
                                    <option value="6">500MNX OFF</option>
                                    <option value="7">5% OFF</option>
                                    <option value="8">25% OFF (Cupón navideño)</option>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="is_paid" class="form-label text-light">¿Ha sido pagada?</label>
                                <select class="form-select bg-dark text-light" id="is_paid" name="is_paid" required>
                                    <option value="" disabled selected>¿La orden se pagó?</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div> -->

                            <div class="mb-3">
                                <label for="client_id" class="form-label text-light">Cliente</label>
                                <select class="form-select bg-dark text-light" id="clientId" name="client_id" required>
                                    <option value="" disabled selected>Seleccione un cliente</option>
                                    <?php foreach ($clients as $client): ?>
                                        <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL FILTRAR POR FECHA -->
        <div class="modal fade" id="dateRangeModal" tabindex="-1" aria-labelledby="dateRangeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dateRangeModalLabel">Seleccionar Rango de Fechas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="dateRangeForm">
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Fecha Inicial (Formato: YYYY-MM-DD)</label>
                                <input type="text" class="form-control" id="startDate" placeholder="Ejemplo: 2022-10-04" required>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">Fecha Final (Formato: YYYY-MM-DD)</label>
                                <input type="text" class="form-control" id="endDate" placeholder="Ejemplo: 2042-10-25" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="generateLinkButton">Guardar Fechas</button>
                    </div>
                </div>
            </div>
        </div>
        

        <?php

        include "../layouts/footer.php";
        include "../layouts/scripts.php";

        ?>

    </body>
    <!-- [Body] end -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        // Obtener el botón de agregar producto
        const addSelectButton = document.querySelector('.add-select-btn');

        // Asociar evento click al botón
        addSelectButton.addEventListener('click', () => {
        const containerId = addSelectButton.getAttribute('data-container'); // Contenedor asociado
        const container = document.getElementById(containerId);

        // Contar los productos ya existentes
        const itemCount = container.querySelectorAll('.product-row').length;

        // Crear un nuevo contenedor para los campos
        const newItem = document.createElement('div');
        newItem.className = 'product-row mb-3';

        // Crear label y select para producto
        const productLabel = document.createElement('label');
        productLabel.className = 'form-label text-light';
        productLabel.for = `presentations[${itemCount}][id]`;
        productLabel.textContent = `Producto ${itemCount + 1}`;

        const newSelect = document.createElement('select');
        newSelect.className = 'form-select bg-dark text-light';
        newSelect.id = `presentations[${itemCount}][id]`;
        newSelect.name = `presentations[${itemCount}][id]`;
        newSelect.required = true;
        newSelect.innerHTML = `
            <option value="" disabled selected>Seleccione un producto</option>
            <option value="1">Producto 1</option>
            <option value="2">Producto 2</option>
        `;

        // Crear label e input para cantidad
        const quantityLabel = document.createElement('label');
        quantityLabel.className = 'form-label text-light mt-2';
        quantityLabel.for = `presentations[${itemCount}][quantity]`;
        quantityLabel.textContent = `Cantidad producto ${itemCount + 1}`;

        const newQuantity = document.createElement('input');
        newQuantity.className = 'form-control bg-dark text-light';
        newQuantity.id = `presentations[${itemCount}][quantity]`;
        newQuantity.name = `presentations[${itemCount}][quantity]`;
        newQuantity.type = 'number';
        newQuantity.required = true;

        // Agregar los nuevos campos al contenedor
        newItem.appendChild(productLabel);
        newItem.appendChild(newSelect);
        newItem.appendChild(quantityLabel);
        newItem.appendChild(newQuantity);

        // Agregar el nuevo conjunto de campos al contenedor principal
        container.appendChild(newItem);
    });
});

document.getElementById('clientId').addEventListener('change', function() {
    const clientId = this.value;

    if (!clientId) {
        document.getElementById('address_id').value = '';
        return;
    }

    fetch(`get_client_address.php?client_id=${clientId}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.addresses && data.addresses.length > 0) {
                // Tomar la primera dirección como ejemplo
                const address = data.addresses[0].street_and_use_number;
                document.getElementById('address_id').value = address;
            } else {
                document.getElementById('address_id').value = 'No se encontraron direcciones';
            }
        })
        .catch(error => {
            console.error('Error al obtener las direcciones:', error);
            document.getElementById('address_id').value = 'Error al cargar las direcciones';
        });
});

// Variables globales para almacenar las fechas
let startDateGlobal = null;
    let endDateGlobal = null;

    // Manejo del botón para guardar fechas
    document.getElementById('generateLinkButton').addEventListener('click', function () {
        const startDate = document.getElementById('startDate').value.trim();
        const endDate = document.getElementById('endDate').value.trim();

        // Validación básica del formato de fecha (YYYY-MM-DD)
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/;

        if (!startDate.match(dateRegex) || !endDate.match(dateRegex)) {
            alert('Por favor, introduce las fechas en el formato correcto (YYYY-MM-DD).');
            return;
        }

        if (new Date(startDate) > new Date(endDate)) {
            alert('La fecha inicial no puede ser mayor que la fecha final.');
            return;
        }

        // Asignar las fechas a las variables globales
        startDateGlobal = startDate;
        endDateGlobal = endDate;

        // Mostrar las variables en pantalla
        const variablesDisplay = document.getElementById('variablesDisplay');
        variablesDisplay.style.display = 'block';
        variablesDisplay.innerHTML = `
            <strong>Fecha Inicial:</strong> ${startDateGlobal}<br>
            <strong>Fecha Final:</strong> ${endDateGlobal}
        `;

        // Opcional: cerrar el modal después de guardar
        const modalElement = document.getElementById('dateRangeModal');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });

    </script>

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