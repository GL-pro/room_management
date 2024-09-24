<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
       Glpos Login
    </title>
    <!--Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>assets2/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets2/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>assets2/css/m-d-g-l.css?v=3.1.0" rel="stylesheet" />

    <link id="pagestyle" href="assets/css/glcu s.css" rel="stylesheet" />
</head>
<style>
    .form-check:not(.form-switch) .form-check-input[type=checkbox]:after {
        margin-left: -10px;
    }
    .form-control {
        text-transform: lowercase;
    }
</style>
<!-- styling the error alert box -->
<style>
        .custom-alert {
            color: #155724; /* Change this color to your desired color */
            background-color: #d4edda; /* Change this color to your desired background color */
            border-color: #c3e6cb; /* Change this color to your desired border color */
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
    </style>
<!-- styling the error alert box -->
<body class=" ">
<!-- Display error message -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="custom-alert" ><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/hotel/idukki/green-tea-bud-leaves-green-tea-plantations-morning.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="container d-flex">
                                <a class=" text-center " href="index">
                                    <img class="w-50 mx-auto" src="<?= base_url() ?>assets/img/hotel/logo/ITDS  LOGO1 primary.png" alt="">
                                </a>
                            </div>
                            <div class="card card-plain">
                                <div class="card-header text-center">
                                    <h4 class="font-weight-bolder  ">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body mt-2">
                                    <!-- <form role="form">-->
                                    <form action="<?php echo base_url(); ?>logincheck" method="post" enctype="multipart/form-data">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"> </label>
                                            <select class="form-control" name="usertype" id="usertype" required>
                                                <option value="" selected disabled>Select User Type</option>
                                                <!-- <option value="user">User</option> -->
                                            <option value="admin">Admin</option>
                                            <option value="staff">Staff</option>                                      
                                            </select>
                                        </div>
                                        <div class="text-center">                          
                                            <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                    <div class="row px-xl-5 px-sm-4 px-3 justify-content-center ">
                                        <div class="col-3   px-1">
                                            <a class="btn btn-outline-light w-100 p-3" href="javascript:;">
                                                <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                                                            <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                                                            <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                                                            <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                                                            <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <p class=" text-sm mx-auto">
                                        Don't have an account?
                                        <a href="" class="glcolor-primary  font-weight-bold">Sign
                                            up</a>
                                    </p>
                                    <p class="mb-4 text-sm mx-auto">
                                        <a href="javascript:;" class="text-info  font-weight-bold">Forgotten password?</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="<?= base_url() ?>assets2/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets2/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets2/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets2/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= base_url() ?>assets2/js/m-d-g-l.min.js?v=3.0.6"></script>
</body>
</html>