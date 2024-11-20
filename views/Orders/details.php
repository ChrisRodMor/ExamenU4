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
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home">Home</a></li>
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

                <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Tabla: Información del Cliente -->
                                <div class="table-responsive mb-4">
                                <h2 class="text-primary mb-3">Información del Cliente</h2>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Chir</td>
                                                <td>weap@alu.uabcs.mx</td>
                                                <td>612233313222</td>
                                                <td>Nivel 3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Tabla: Productos Comprados -->
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
                                            <tr>
                                                <td>Comedor Miguel con 4 Sillas</td>
                                                <td>comi01</td>
                                                <td>1</td>
                                                <td>$450</td>
                                                <td>$450</td>
                                            </tr>
                                            <tr>
                                                <td>Colchón Matrimonial Zero</td>
                                                <td>comazo01</td>
                                                <td>1</td>
                                                <td>$8999.99</td>
                                                <td>$8999.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Tabla: Información de la Orden -->
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
                                                <td>82713</td>
                                                <td>$8999.99</td>
                                                <td>Cancelada</td>
                                                <td>Efectivo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Tabla: Dirección y Cupón -->
                                <div class="table-responsive">
                                <h2 class="text-primary mb-3">Dirección y Cupón</h2>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Dirección</th>
                                                <th>Código Postal</th>
                                                <th>Ciudad</th>
                                                <th>Estado</th>
                                                <th>Cupón</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Calle El Diseño, 11</td>
                                                <td>19200</td>
                                                <td>Azuqueca de Henares</td>
                                                <td>Guadalajara</td>
                                                <td>10% off</td>
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
        <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->


        <?php

        include "../layouts/footer.php";
        include "../layouts/scripts.php";

        ?>

    </body>
    <!-- [Body] end -->

</html>