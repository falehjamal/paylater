<?php 
include 'hakakses.php';
include 'koneksi.php';

$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$author = $_POST['author'];

$query3 = mysqli_query($koneksi,"SELECT * FROM `tb_hutang` WHERE id IN (SELECT MAX(id) FROM `tb_hutang`)");
$data3 = mysqli_fetch_array($query3);
$row3 = mysqli_num_rows($query3);

if ($row3 < 1) {
	$saldo_akhir2 = 0+$jumlah;
}else{
	$saldo_akhir2 = $data3['saldo_akhir']+$jumlah;
}

$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$date = $dt->format('Y-m-d G:i:s');

mysqli_query($koneksi,"INSERT INTO tb_hutang VALUES (NULL, '$jumlah', '$saldo_akhir2','$keterangan', '$author' ,'$date')");

?>