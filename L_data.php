<?php
 session_start();
 if (!isset($_SESSION['username'])) {
     header('location: login.php');
 }
 
// ambil library dan koneksi
require_once '_koneksi.php';
require_once 'fpdf186/fpdf.php';
 
function rupiah($angka){
    $hasil_rupiah = "RP" . number_format($angka,2,',','.');
    return $hasil_rupiah;
}
// Setting awal
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
 
// untuk header
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,' LAPORAN DATA BARANG',0,0,'C');
 
// table head
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(10,9,'No',1,0,'C');
$pdf->Cell(40,9,'Tanggal',1,0,'C');
$pdf->Cell(30,9,'Kode barang',1,0,'C');
$pdf->Cell(30,9,"Nama",1,0,'C');
$pdf->Cell(30,9,"Harga",1,0,'C');
$pdf->Cell(30,9,"stok",1,0,'C');
 
// setting data dalam table
$pdf->Cell(10,9,'',0,1);
$pdf->SetFont('Times', '', 11);
 
// Ambil Data
$query = "SELECT * FROM barang";
$dataproduk = mysqli_query($conn, $query);
$no = 1;
 
// Mulai Looping Data
foreach($dataproduk as $data){
    $pdf->Cell(10,8,$no++,1,0,'C');
    $pdf->Cell(40,8,$data['tanggal'],1,0);
    $pdf->Cell(30,8,$data['kd_brng'],1,0);
    $pdf->Cell(30,8,$data['nama'],1,0);
    $pdf->Cell(30,8,rupiah($data['harga']),1,0);
    $pdf->Cell(30,8,$data['stok'],1,1);
 
}
 
// Hasil convert ke pdf
$pdf->Output();