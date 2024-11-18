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
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Profile</a></li>
                  <li class="breadcrumb-item" aria-current="page">User Card</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">User Card</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->

          <a href="detailsClient">
            <div class="col-md-6 col-xl-4" style="max-width: 350px;">
              <div class="card user-card">
                <div class="card-body">
                  <div class="user-cover-bg">
                    <img src="<?= BASE_PATH ?>/assets/images/application/img-user-cover-1.jpg" alt="image" class="img-fluid" />
                  </div>
                  <div class="chat-avtar card-user-image">
                    <img src="<?= BASE_PATH ?>/assets/images/user/avatar-1.jpg" alt="user-image" class="img-thumbnail rounded-circle" />
                    <i class="chat-badge bg-success"></i>
                  </div>
                  <div class="d-flex">
                    <div class="flex-grow-1 ms-2">
                      <h6 class="mb-1">Marshall Parker</h6>
                      <p class="text-muted text-sm mb-0">Email:
                      <p class="text-primary">mapa_46@gmail.com</p>
                      </p>
                      <p class="text-muted text-sm mb-0">Phone: 6127384765</p>
                    </div>
                  </div>
                  <div class="saprator my-2">
                    <span>Level</span>
                  </div>
                  <div class="text-center">
                    <span class="badge bg-light-secondary border rounded-pill border-secondary bg-transparent f-14 me-1 mt-1">Normal (0% Discount)</span>
                  </div>
                </div>
              </div>
          </a>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
    </div>
    <!-- [ Main Content ] end -->
    <?php

    include "../layouts/footer.php";
    include "../layouts/scripts.php";

    ?>

  </body>
  <!-- [Body] end -->

</html>