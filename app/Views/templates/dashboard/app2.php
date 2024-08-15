<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Diskominfo</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/landing/img/janala.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/dashboard/css/styles.min.css'); ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dis/tabler-icons.min.css" />
  <style>
    .sidebar-link.active {
      background-color: #007bff;
      color: white !important;
    }
    .sidebar-link.active i {
      color: white;
    }
  </style>
</head>

<body>
  <?php
    $current_url = $_SERVER['REQUEST_URI'];
  ?>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/dashboard" class="text-nowrap logo-img">
            <img src="<?= base_url('assets/landing/img/LOGO_JANALA.png'); ?>" width="200" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Ajukan Cuti</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= (preg_match('/^\/leave_requests\/create$/', $current_url)) ? 'active' : ''; ?>" href="/leave_requests/create" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Ajukan Cuti</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Absen Karyawan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?= (preg_match('/^\/attendance$/', $current_url)) ? 'active' : ''; ?>" href="/attendance" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Absen</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('assets/landing/img/janala.png'); ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Header End -->
      <div class="container-fluid">
        <!-- Row 1 -->
        <?= $this->renderSection('content'); ?>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/dashboard/libs/jquery/dis/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/libs/bootstrap/dis/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/js/sidebarmenu.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/js/app.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/libs/apexcharts/dis/apexcharts.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/libs/simplebar/dis/simplebar.js'); ?>"></script>
  <script src="<?= base_url('assets/dashboard/js/dashboard.js'); ?>"></script>
</body>

</html>
