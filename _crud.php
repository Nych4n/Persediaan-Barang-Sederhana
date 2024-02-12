<?php
session_start();
require_once('_koneksi.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    if ($level=="admin") {
        $query = "SELECT*FROM user where username = '$username'";
        $hasil = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($hasil);
        if ($data==NULL) {
            echo"<script> alert('Username Tidak Ditemukan'); </script>";
            echo"<script> window.location.href = 'login.php'; </script>";
        }else if ($password<>$data['password']) {
            echo"<script> alert('Password Salah'); </script>";
            echo"<script> window.location.href = 'login.php'; </script>";            
        }else {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = 'admin';
            header("Location: index.php");
        }
    }else {
        $query = mysqli_query($conn,"SELECT * FROM pemilik WHERE username = '$username'");
        $data = mysqli_fetch_array($query);
        if ($data==NULL) {
            echo"<script> alert('Username Tidak Ditemukan'); </script>";
            echo"<script> window.location.href = 'login.php'; </script>";
        }else if ($password<>$data['password']) {
            echo"<script> alert('Password Salah'); </script>";
            echo"<script> window.location.href = 'login.php'; </script>";            
        }else {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = 'pemilik';
            header("Location: index.php");
        }
    } 
}

if (isset($_POST['simpan'])) {
    $tgl = $_POST['tanggal'];
    $kdbrng = $_POST['kd_brng'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['keterangan'];
        //menambah data 
        $query = "INSERT INTO barang VALUES(NULL,'$kdbrng', current_timestamp(),'$nama','$harga','$stok','$deskripsi')";
        mysqli_query($conn, $query);
        echo "<script>alert('data berhasil di Tambah.');</script>";
        header("Location: b_data.php");
    
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE from barang where id_barang='$id'";
    mysqli_query($conn, $query);
    $query1 = mysqli_query($conn,"DELETE FROM barang_masuk WHERE id_barang='$id'");
    $query1 = mysqli_query($conn,"DELETE FROM barang_keluar WHERE id_barang='$id'");
    echo "<script>alert('data berhasil di Hapus.');</script>";
    header("Location: b_data.php");
}

if (isset($_POST['simpan_edit'])) {
    $id = $_POST['id_barang'];
    $kdbrng = $_POST['kd_brng'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $query = "UPDATE barang SET 
    kd_brng = '$kdbrng',
    nama = '$nama',
    stok = '$stok',
    harga = '$harga',
    deskripsi = '$deskripsi'
    where id_barang = '$id'
    ";
    mysqli_query($conn, $query);
    echo "<script>alert('data berhasil di edit.');</script>";
    header('Location: b_data.php');
}

if (isset($_POST['simpan_masuk'])) {
    $idbarangnya = $_POST['idbarang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['Keterangan'];
    
    $cek = mysqli_query($conn,"SELECT * FROM barang");
    
    $query = mysqli_query($conn,"INSERT INTO barang_masuk VALUES(
        NULL,
        '$idbarangnya',
         current_timestamp(),
         '$jumlah',
         '$keterangan'
         )");
         
    //update stok 
    $tambah = mysqli_query($conn,"UPDATE barang SET stok = stok + $jumlah WHERE id_barang = '$idbarangnya'");
    
    echo "<script>alert('data berhasil di inputkan.');</script>";
    header('Location: b_masuk.php');
}


?>