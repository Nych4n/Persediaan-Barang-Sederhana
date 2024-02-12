<?php
session_start();
require_once('_koneksi.php');

if (isset($_GET['hapus'])) {
   $id_masuk = $_GET['hapus'];
   $query = "DELETE FROM barang_masuk where id_masuk='$id_masuk'";
   mysqli_query($conn, $query);
   header('Location: b_masuk.php');
}


if (isset($_POST['simpan_keluar'])) {
   $idbarang = $_POST['idbarang'];
   $tgl_keluar = $_POST['tgl_keluar'];
   $juml = $_POST['jumlah'];
   $penerima = $_POST['Keterangan'];
   
   $cek = mysqli_query($conn,"SELECT * FROM barang");
    
   $query = mysqli_query($conn,"INSERT INTO barang_keluar VALUES (NULL,'$idbarang',
    current_timestamp(),'$juml','$penerima')");
    //update stok 
    $update = mysqli_query($conn,"UPDATE barang SET stok = stok - $juml WHERE id_barang = '$idbarang'");
    
   echo "<script>alert('data berhasil di inputkan.');</script>";
   header('Location: b_keluar.php');
}

if (isset($_GET['delete'])) {
   $id_keluar = $_GET['delete'];
   $query = "DELETE FROM barang_keluar where id_keluar='$id_keluar'";
   mysqli_query($conn, $query);
   header('Location: b_keluar.php');
}

?>