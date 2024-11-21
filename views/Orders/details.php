<?php
include_once "../../app/config.php";
include_once "../../app/OrderController.php";

if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    echo '<h1>Error: No se proporcionó un ID de orden válido.</h1>';
    exit;
}

$orderController = new OrderController();
$order = $orderController->getOrderByID($_GET['order_id']);

if (!$order) {
    echo '<h1>Error: No se encontró la orden con el ID proporcionado.</h1>';
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include "../layouts/head.php"; ?>
</head>
<body>
    <?php include "../layouts/sidebar.php"; ?>
    <?php include "../layouts/nav.php"; ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="products">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Detail Order</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Detail Order</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] -->
            <div class="row">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Información de la Orden -->
                            <div class="table-responsive mb-4">
                                <h2 class="text-primary mb-3">Información de la Orden</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Folio</th>
                                            <th>Total</th>
                                            <th>Estatus</th>
                                            <th>Forma de Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= htmlspecialchars($order['folio']) ?></td>
                                            <td>$<?= number_format($order['total'], 2) ?></td>
                                            <td><?= htmlspecialchars($order['order_status']['name']) ?></td>
                                            <td><?= htmlspecialchars($order['payment_type']['name']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Productos Comprados -->
                            <div class="table-responsive mb-4">
                                <h2 class="text-primary mb-3">Productos Comprados</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Código</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order['presentations'] as $presentation): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($presentation['description']) ?></td>
                                                <td><?= htmlspecialchars($presentation['code']) ?></td>
                                                <td><?= htmlspecialchars($presentation['pivot']['quantity']) ?></td>
                                                <td>$<?= number_format($presentation['current_price']['amount'], 2) ?></td>
                                                <td>$<?= number_format($presentation['pivot']['quantity'] * $presentation['current_price']['amount'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Dirección -->
                            <div class="table-responsive mb-4">
                                <h2 class="text-primary mb-3">Dirección</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Calle y Número</th>
                                            <th>Código Postal</th>
                                            <th>Ciudad</th>
                                            <th>Provincia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= htmlspecialchars($order['address']['street_and_use_number'] ?? 'No especificado') ?></td>
                                            <td><?= htmlspecialchars($order['address']['postal_code'] ?? 'No especificado') ?></td>
                                            <td><?= htmlspecialchars($order['address']['city'] ?? 'No especificado') ?></td>
                                            <td><?= htmlspecialchars($order['address']['province'] ?? 'No especificado') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Cupón -->
                            <div class="table-responsive">
                                <h2 class="text-primary mb-3">Cupón</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Código del Cupón</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= htmlspecialchars($order['coupon']['code'] ?? 'No aplica') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/footer.php"; ?>
    <?php include "../layouts/scripts.php"; ?>
</body>
</html>
