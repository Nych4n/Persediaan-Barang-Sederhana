<?php
session_start();
require_once('_koneksi.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
// menampilkan nama barang di tabel barangmasuk dibagian option pilih barang
$tampilnama = $conn->query("SELECT * FROM barang ORDER BY id_barang") or die(mysqli_error($conn));

// fillter tanggal
if (isset($_POST['fillter_tgl'])) {
    $mulai = $_POST['tgl_awal'];
    $selesai = $_POST['tgl_akhir'];
    $ambilsemuadata = mysqli_query($conn,"SELECT * FROM  barang_keluar 
    INNER JOIN barang ON barang_keluar.id_barang = barang.id_barang WHERE tgl_keluar >= '$mulai' 
    AND tgl_keluar <= '$selesai'");                                            
}else {
    $ambilsemuadata = mysqli_query($conn,"SELECT * FROM barang_keluar 
    INNER JOIN barang ON barang_keluar.id_barang = barang.id_barang");
                                            
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barang Keluar</title>
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
                                    <h2 class="text-center">Data Barang Keluar</h2>
                                    <!-- Button trigger modal -->
                                    <?php if ($_SESSION['level']=="admin") {?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="ti-upload btn-icon-prepend"></i> data keluar
                                    </button>
                                    <?php } ?>
                                    <div class="row mt-4 align-items-center">
                                        <div class="col-auto">
                                            <form action="" method="post">
                                                <input name="tgl_awal" placeholder="Tanggal Awal"
                                                    onfocus="(this.type= 'date')" class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <input name="tgl_akhir" placeholder="Tanggal Akhir"
                                                onfocus="(this.type= 'date')" class="form-control ml-3">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class=" btn btn-info  "
                                                name="fillter_tgl">Tampil</button>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <form action="export-keluar.php" method="post">
                                                <input type="hidden" name="tgl_awal" class="form-control"
                                                    value="<?= $mulai?>">
                                                <input type="hidden" name="tgl_akhir" class="form-control"
                                                    value="<?= $selesai?>">
                                                <button type="submit" class="btn btn-primary"> <i
                                                        class="ti-file btn-icon-prepend"></i> Laporan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Jumlah Keluar</th>
                                                <th>Penerima</th>
                                                <?php if ($_SESSION['level']=="admin") {?>
                                                <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php $i = 1;
                                            while ($data=mysqli_fetch_array($ambilsemuadata)) {
                                                $nama_brng = $data['nama'];
                                                $tgl_keluar = $data['tgl_keluar'];
                                                $stok = $data['jumlah'];
                                                $penerima = $data['keterangan'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $tgl_keluar; ?></td>
                                                <td><?php echo $nama_brng; ?></td>
                                                <td><?php echo $stok; ?></td>
                                                <td><?php echo $penerima; ?></td>
                                                <?php if ($_SESSION['level']=="admin") {?>
                                                <td>
                                                    <a href="model.php?delete=<?php echo $data['id_keluar'];?>"
                                                        class="btn btn-danger"
                                                        onClick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                        hapus
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
                    Barang Keluar</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="model.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama
                            Barang</label>

                        <select name="idbarang" class="form-control">
                            <option value="">pilih nama barang</option>
                            <?php 
                                while ($tampil = $tampilnama->fetch_assoc()) {
                                echo "<option value='$tampil[id_barang].$tampil[nama]'>$tampil[nama]</option>";
                                }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Jumlah</label>
                        <input type="number" class="form-control" id="basic-default-company"
                            placeholder="Masukkan jumlah barang Keluar" name="jumlah" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Penerima</label>
                        <input type="text" class="form-control" id="basic-default-company"
                            placeholder="Masukkan Nama Penerima" name="Keterangan" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="simpan_keluar" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>