<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Karmel - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo text-center">
                                <?php

                                if (isset($_GET['false']) && $_GET['false'] === 'true') {
                                    echo "<h3><span style=\"color: red;\">Password Salah!!!</span></h3>";
                                }
                                ?>
                                <img src="../img/logo/12.png">
                            </div>
                            <h4>Selamat Datang!!!</h4>
                            <h6 class="font-weight-light">Silahkan Sign In untuk melanjutkan!</h6>
                            <form method="POST" action="auth/plogin" class="pt-3">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                                </div>
                                <?php if (isset($error)) echo '<div class="text-danger">' . $error . '</div>'; ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient-primary btn-md font-weight-medium text-center">SIGN
                                        IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center"></div>
                                <!-- <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a> -->
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>