<?php
session_start();
require_once('_koneksi.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan</title>
    <!-- plugins:css -->
    <?= require_once('layout/_css.php');?>

    <link rel="stylesheet" type="text/css" href="skydash/js/select.dataTables.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php require_once('layout/_nav.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <?php require_once('layout/tema.php');?>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('layout/menu.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h2>Laporan Data Barang</h2>
                                        <br>
                                        <hr>
                                        <a href="l_data.php" class="btn btn-danger" target="blank">
                                            Laporan Data Barang <i class="ti-printer btn-icon-append"></i></a>
                                        <a href="l_masuk.php" class="btn btn-warning" target="blank">
                                            Laporan Data Masuk <i class="ti-printer btn-icon-append"></i></a>
                                        <a href="l_keluar.php" class="btn btn-success" target="blank">
                                            Laporan Data keluar <i class="ti-printer btn-icon-append"></i></a>
                                    </center><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php require_once('layout/footer.php');?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="skydash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="skydash/vendors/chart.js/Chart.min.js"></script>
    <script src="skydash/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="skydash/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="skydash/js/off-canvas.js"></script>
    <script src="skydash/js/hoverable-collapse.js"></script>
    <script src="skydash/js/template.js"></script>
    <script src="skydash/js/settings.js"></script>
    <script src="skydash/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="skydash/js/dashboard.js"></script>
    <script src="skydash/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>