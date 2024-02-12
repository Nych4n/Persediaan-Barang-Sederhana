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
    <title>Barang</title>
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
                                    <h2 class="text-center">Data Barang </h2>
                                    <!-- Button trigger modal -->
                                    <?php if($_SESSION['level']=="admin"){?>
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        + data
                                    </button> -->
                                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="ti-upload btn-icon-prepend"></i>
                                        Tambah Data
                                    </button>
                                    <?php } ?>
                                    <a href="l_data.php" class="btn btn-info" target="blank"> <i
                                            class="ti-file btn-icon-prepend"></i> Laporan</a>
                                    <hr>
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Kode Barang</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Harga @</th>
                                                <th>Keterangan</th>
                                                <?php if ($_SESSION['level']=="admin") {?>
                                                <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php
                                        $ambilsemuadata = mysqli_query($conn,"select*from barang");
                                        
                                        $no = 1;
                                        while ($data=mysqli_fetch_array($ambilsemuadata)) {
                                            $tgl = $data['tanggal'];
                                            $nama_brng = $data['nama'];
                                            $kode = $data['kd_brng'];
                                            $stok = $data['stok'];
                                            $harga = $data['harga'];
                                            $deskripsi = $data['deskripsi'];
                                         ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $kode; ?></td>
                                                <td><?php echo $nama_brng; ?></td>
                                                <td><?php echo $stok; ?></td>
                                                <td>Rp.<?php echo $harga; ?></td>
                                                <td><?php echo $deskripsi; ?></td>
                                                <?php if ($_SESSION['level']=="admin") {?>
                                                <td>
                                                    <a href="_crud.php?hapus=<?php echo $data['id_barang'];?>"
                                                        class="btn btn-danger"
                                                        onClick="return confirm('Apakah anda yakin menghapus data ini?')">hapus
                                                    </a>
                                                    <a href="edit.php?edit=<?php echo $data['id_barang'];?>"
                                                        class="btn btn-warning ">edit
                                                    </a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Data
                    Barang</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="_crud.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Kode Barang</label>
                        <input type="text" class="form-control" id="basic-default-name"
                            placeholder="Masukkan Kode (A---)" name="kd_brng" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Nama</label>
                        <input type="text" class="form-control" id="basic-default-name"
                            placeholder="Masukkan Nama Barang" name="nama" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">stock</label>
                        <input type="number" class="form-control" id="basic-default-company" placeholder="stok"
                            name="stok" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Harga</label>
                        <input type="text" class="form-control" id="basic-default-company" placeholder="harga"
                            name="harga" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">keterangan</label>
                        <input type="text" id="basic-default-phone" class="form-control phone-mask"
                            placeholder="masukkan keterangan" name="keterangan" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

</html>