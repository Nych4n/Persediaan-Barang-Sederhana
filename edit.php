<?php
session_start();
require_once('_koneksi.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

if(isset($_GET['edit'])){
    $id_brng = $_GET['edit'];
    $query = "SELECT*FROM barang where id_barang = '$id_brng'";
    $data_brng = mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Barang</title>
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
                                    <h2 class="text-center">Edit Data Barang </h2>
                                    <!-- Button trigger modal -->
                                    <hr>
                                    <?php foreach ($data_brng as $key) { ?>
                                    <form action="_crud.php" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-company">Kode Barang</label>
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="kode barang" name="kd_brng"
                                                value="<?php echo $key['kd_brng'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="id_barang"
                                                value="<?php echo $key['id_barang']; ?>">
                                            <label class="form-label" for="basic-default-fullname">Nama
                                                Barang</label>
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                                placeholder="nama barang " name="nama"
                                                value="<?php echo $key['nama'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-company">Stok</label>
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="stok" name="stok" value="<?php echo $key['stok'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-company">Harga</label>
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="harga" name="harga" value="<?php echo $key['harga'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-company">deskripsi</label>
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="masukan deskripsi" name="deskripsi"
                                                value="<?php echo $key['deskripsi'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="simpan_edit"
                                                class="btn btn-primary">Simpan</button>
                                    </form>
                                    <a href="b_data.php" class="btn btn-primary">kembali</a>
                                </div>
                                <?php }?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- End custom js for this page-->
</body>

</html>