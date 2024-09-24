<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets2/img/spellbee/logo.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets2/img/ ">
  <title>
    Add Hotel <?php echo $pagetitle ?>
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets2/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets2/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'> -->

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>assets2/css/style_pro.css" rel="stylesheet" />
  <link id="pagestyle" href="<?= base_url() ?>assets2/css/glstyle.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200   "> <!-- g-sidenav-hidden -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-pri mary  bg-gradient-light text-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard">
        <img src="<?= base_url() ?>assets2/img/gl/full logo inline for white background 1.png" class="navbar-brand-img h-100" alt="main_logo">
        <!-- <span class="ms-0 font-weight-bold text-dark">hotel</span> -->
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0">
          <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-dark <?php echo ($menu == 'profile ') ? 'active bg-dark' : ''; ?>" aria-controls="ProfileNav" role="button" aria-expanded="false">
            <img src="<?= base_url() ?>assets2/img/team-3.jpg" class="avatar">
            <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span>
          </a>
          <div class="collapse <?php echo ($menu == 'profile') ? 'show' : ''; ?>" id="ProfileNav" style>
            <ul class="nav ">
              <!-- <li class="nav-item">
                <a class="nav-link text-white <?php echo ($menu == 'profile') ? 'active' : ''; ?>" href="profile_view">
                  <span class="sidenav-mini-icon"> MP </span>
                  <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link text-dark " href="<?=base_url('admin/logout') ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <hr class="horizontal light mt-0">
        <li class="nav-item">
          <a class="nav-link text-dark <?php echo ($menu == 'admin_dashboard') ? 'active bg-dark' : ''; ?> " href="<?=base_url('admin_dashboard') ?>">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons ms-1 opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-2">Dashboard</span>
          </a>
        </li>


        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#room_type" class="nav-link text-dark <?php echo ($menu == 'room_type_creation' || $menu == 'all_room_type') ? 'active bg-dark' : ''; ?>" aria-controls="room_type" role="button" aria-expanded="false">
            <i class="material-symbols-outlined  opacity-10">menu_book</i>
            <span class="nav-link-text ms-2 ">Room Type</span>
          </a>
          <div class="collapse  <?php echo ($menu == 'room_type_creation' || $menu == 'all_room_type') ? 'show' : ''; ?> " id="room_type">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-dark <?php echo ($menu == 'room_type_creation') ? 'active' : ''; ?>" href="<?=base_url('room_type_creation') ?>">
                  <span class="sidenav-mini-icon"> CC </span>
                  <span class="sidenav-normal  ms-2  ps-1">Room Type Creation </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark <?php echo ($menu == 'all_room_type') ? 'active' : ''; ?>" href="<?=base_url('all_room_type') ?>">
                  <span class="sidenav-mini-icon"> AC </span>
                  <span class="sidenav-normal  ms-2  ps-1"> All Room Type</span>
                </a>
              </li>

            </ul>
          </div>
        </li>




         <!-- Hotel Room Details Section -->
      <li class="nav-item">
          <a data-bs-toggle="collapse" href="#room" class="nav-link text-dark <?php echo ($menu == 'hotel_room_add' || $menu == 'hotel_added_rooms') ? 'active bg-dark' : ''; ?>" aria-controls="room" role="button" aria-expanded="false">
              <i class="material-symbols-outlined opacity-10">menu_book</i>
              <span class="nav-link-text ms-2">Hotel Room Details</span>
          </a>
          <div class="collapse <?php echo ($menu == 'hotel_room_add' || $menu == 'hotel_added_rooms') ? 'show' : ''; ?>" id="room">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link text-dark <?php echo ($menu == 'hotel_room_add') ? 'active bg-dark' : ''; ?>" href="<?= base_url('hotel_room_add') ?>">
                          <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="material-icons ms-1 opacity-10">menu_book</i>
                          </div>
                          <span class="nav-link-text ms-2">Add Rooms</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-dark <?php echo ($menu == 'hotel_added_rooms') ? 'active bg-dark' : ''; ?>" href="<?= base_url('hotel_added_rooms') ?>">
                          <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="material-icons ms-1 opacity-10">menu_book</i>
                          </div>
                          <span class="nav-link-text ms-2">View Added Rooms</span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>


      

      <li class="nav-item">
          <a class="nav-link text-dark <?php echo ($menu == 'hotel_facilitys') ? 'active bg-dark' : ''; ?>" href="<?= base_url('hotel_facilitys') ?>">
              <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons ms-1 opacity-10">menu_book</i>
              </div>
              <span class="nav-link-text ms-2">Facilities</span>
          </a>
      </li>
       

      



  
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main bg-gradient-light navbar-expand-lg px-0 m-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav> -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-3 text-dark" href="javascript:;">
                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                          </path>
                          <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Hotel</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>

        <div class="sidenav-toggler sidenav-toggler-inner me-4 d-xl-block d-none ">
          <a href="javascript:;" class="nav-link text-body p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </div>



        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class=" pe-md-3 d-flex align-items-center d-xl-none">
            <img src="<?= base_url() ?>assets2/img/spellbee/logo web2.png" class="" style="max-width: 130px;" alt="main_logo">
          </div>
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown pe-2">
              <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons cursor-pointer text-dark">
              notifications
            </i>
                <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
                  <span class="small">11</span>
                  <span class="visually-hidden">unread notifications</span>
                </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex align-items-center py-1">
                      <div class="my-auto">
                        <span class="material-icons">
                          email
                        </span>
                      </div>
                      <div class="ms-2">
                        <h6 class="text-sm font-weight-normal mb-0">
                          New message from Laur
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
            <!-- <li class="nav-item dropdown d-flex align-items-center">
              <a href=" " class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Admin</span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton1">
                <li class="mb-2">
                  <di class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url() ?>assets2/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Name name </span>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          Admin
                        </p>
                      </div>
                    </div>
                    </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md mx-auto text-center" href="logout">
                    <button type="button" class="m-auto px-5 btn btn-info ">logout</button>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->