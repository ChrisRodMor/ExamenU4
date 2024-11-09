<?php
include_once "../../app/config.php";
include_once '../../app/authController.php';

$AuthController = new AuthController();
if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
  $user = $AuthController->getUserByID($_SESSION['id']);
} else {
  header('Location: login');
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

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">


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
                                <li class="breadcrumb-item"><a href="<?= BASE_PATH ?>/dashboard/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                                <li class="breadcrumb-item" aria-current="page">Perfil</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Perfil</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->










            <!-- [ Main Content ] start -->
  
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-primary"></div>
                    <div class="row">
                        <div class="col-lg-5 col-xxl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body position-relative">
                                    <div class="text-center mt-3">
                                        <div class="chat-avtar d-inline-flex mx-auto">
                                            <!-- Mostrar la foto de perfil -->
                                            <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                src="<?= BASE_PATH ?>/assets/images/user/<?= $user['avatar']; ?>"
                                                alt="User image" />
                                            <i class="chat-badge bg-success me-2 mb-2"></i>
                                        </div>
                                        <!-- Mostrar nombre completo del user -->
                                        <h5 class="mb-0"><?= $user['name'] . ' ' . $user['lastname']; ?></h5>
                                        <ul class="list-inline mx-auto my-4">
                                            <li class="list-inline-item">
                                                <a href="#" class="avtar avtar-s text-white bg-dribbble">
                                                    <i class="ti ti-brand-dribbble f-24"></i>
                                                </a>
                                            </li>
                                            <!-- Agregar otros enlaces sociales si es necesario -->
                                        </ul>
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <h5 class="mb-0">86</h5>
                                                <small class="text-muted">Post</small>
                                            </div>
                                            <div class="col-4 border border-top-0 border-bottom-0">
                                                <h5 class="mb-0">40</h5>
                                                <small class="text-muted">Project</small>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">4.5K</h5>
                                                <small class="text-muted">Members</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0"
                                    id="user-set-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link list-group-item list-group-item-action active"
                                        id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile"
                                        role="tab" aria-controls="user-set-profile" aria-selected="true">
                                        <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Profile
                                            Overview</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xxl-9">
                            <div class="tab-content" id="user-set-tabContent">
                                <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel"
                                    aria-labelledby="user-set-profile-tab">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal information</h5>
                                        </div>
                                        <div class="card-body position-relative">
                                            <div
                                                class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                <p class="mb-0 text-muted me-1">Email</p>
                                                <p class="mb-0"><?= $user['email']; ?></p>
                                                <!-- Correo del user -->
                                            </div>
                                            <div
                                                class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                <p class="mb-0 text-muted me-1">Phone</p>
                                                <p class="mb-0"><?= $user['phone_number']; ?></p>
                                                <!-- Teléfono del user -->
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-between w-100">
                                                <p class="mb-0 text-muted me-1">Role</p>
                                                <p class="mb-0"><?= $user['role']; ?></p> <!-- Rol del user -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Creation information</h5>
                                        </div>
                                        <div class="card-body position-relative">
                                            <div
                                                class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                <p class="mb-0 text-muted me-1">Created by</p>
                                                <p class="mb-0"><?= $user['created_by']; ?></p>
                                                <!-- Nombre del creador -->
                                            </div>
                                            <div
                                                class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                                                <p class="mb-0 text-muted me-1">Created at</p>
                                                <p class="mb-0"><?= $user['created_at']; ?></p>
                                                <!-- Fecha de creación -->
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-between w-100">
                                                <p class="mb-0 text-muted me-1">Updated at</p>
                                                <p class="mb-0"><?= $user['updated_at']; ?></p>
                                                <!-- Fecha de actualización -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        

            <!-- [ Main Content ] end -->












        </div>
    </div>

    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">Made with &#9829; by Team <a href="https://themeforest.net/user/phoenixcoded"
                            target="_blank"> Phoenixcoded</a></p>
                </div>
                <div class="col-sm-6 ms-auto my-1">
                    <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                        <li class="list-inline-item"><a href="<?= BASE_PATH ?>/index.html">Home</a></li>
                        <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/"
                                target="_blank">Documentation</a></li>
                        <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/"
                                target="_blank">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Required Js -->
    <script src="<?= BASE_PATH ?>/assets/js/plugins/popper.min.js"></script>
    <script src="<?= BASE_PATH ?>/assets/js/plugins/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= BASE_PATH ?>/assets/js/fonts/custom-font.js"></script>
    <script src="<?= BASE_PATH ?>/assets/js/pcoded.js"></script>
    <script src="<?= BASE_PATH ?>/assets/js/plugins/feather.min.js"></script>


    <script>
        layout_change('light');
    </script>

    <script>
        layout_sidebar_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_caption_change('true');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>

    <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
        <div class="offcanvas-header justify-content-between">
            <h5 class="offcanvas-title">Settings</h5>
            <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="ti ti-x"></i></button>
        </div>
        <div class="pct-body customizer-body">
            <div class="offcanvas-body py-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="pc-dark">
                            <h6 class="mb-1">Theme Mode</h6>
                            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
                            <div class="row theme-color theme-layout">
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="true"
                                            onclick="layout_change('light');">
                                            <span class="btn-label">Light</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="false"
                                            onclick="layout_change('dark');">
                                            <span class="btn-label">Dark</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="default"
                                            onclick="layout_change_default();" data-bs-toggle="tooltip"
                                            title="Automatically sets the theme based on user's operating system's color scheme.">
                                            <span class="btn-label">Default</span>
                                            <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                                                <i class="ph-duotone ph-cpu"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Sidebar Theme</h6>
                        <p class="text-muted text-sm">Choose Sidebar Theme</p>
                        <div class="row theme-color theme-sidebar-color">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="true"
                                        onclick="layout_sidebar_change('dark');">
                                        <span class="btn-label">Dark</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="false"
                                        onclick="layout_sidebar_change('light');">
                                        <span class="btn-label">Light</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Accent color</h6>
                        <p class="text-muted text-sm">Choose your primary theme color</p>
                        <div class="theme-color preset-color">
                            <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Sidebar Caption</h6>
                        <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
                        <div class="row theme-color theme-nav-caption">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="true"
                                        onclick="layout_caption_change('true');">
                                        <span class="btn-label">Caption Show</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="false"
                                        onclick="layout_caption_change('false');">
                                        <span class="btn-label">Caption Hide</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pc-rtl">
                            <h6 class="mb-1">Theme Layout</h6>
                            <p class="text-muted text-sm">LTR/RTL</p>
                            <div class="row theme-color theme-direction">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="false"
                                            onclick="layout_rtl_change('false');">
                                            <span class="btn-label">LTR</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="true"
                                            onclick="layout_rtl_change('true');">
                                            <span class="btn-label">RTL</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item pc-box-width">
                        <div class="pc-container-width">
                            <h6 class="mb-1">Layout Width</h6>
                            <p class="text-muted text-sm">Choose Full or Container Layout</p>
                            <div class="row theme-color theme-container">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="false"
                                            onclick="change_box_container('false')">
                                            <span class="btn-label">Full Width</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="true"
                                            onclick="change_box_container('true')">
                                            <span class="btn-label">Fixed Width</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-grid">
                            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
                        </div>
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

</body>
<!-- [Body] end -->

</html>