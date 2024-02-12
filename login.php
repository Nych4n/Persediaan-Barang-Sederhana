<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="skydash/vendors/feather/feather.css">
    <link rel="stylesheet" href="skydash/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="skydash/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="skydash/css/vertical-layout-light/style.css">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4 class="text-center">Persediaan Toko Handphone Vina</h4>
                            <h6 class="font-weight-light text-center">Silahkan Login Terlebih Dahulu Yaaa.
                            </h6>
                            <center>
                                <h6>Terima kasih<i class="ti-heart text-danger ml-1"></i></h6>
                            </center>
                            <form class="pt-3" action="_crud.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <select name="level" class="form-control">
                                        <option value="admin">admin</option>
                                        <option value="pemilik">pemilik</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button name="login" type="submit"
                                        class="btn btn-primary d-grid w-100">LOGIN</button>
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
    <script src="skydash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="skydash/js/off-canvas.js"></script>
    <script src="skydash/js/hoverable-collapse.js"></script>
    <script src="skydash/js/template.js"></script>
    <script src="skydash/js/settings.js"></script>
    <script src="skydash/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>