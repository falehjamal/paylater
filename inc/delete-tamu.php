
<?php 
include 'hakakses.php';
include 'koneksi.php';

$query = mysqli_query($koneksi,"SELECT SUM(jumlah) AS jumlah FROM `tb_hutang` WHERE author='tamu' AND id < (SELECT MAX(id) FROM `tb_hutang` WHERE author='tamu')");
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($koneksi,"SELECT * FROM `tb_hutang` WHERE id IN (SELECT MAX(id) FROM `tb_hutang` WHERE author='faleh')");
$data2 = mysqli_fetch_array($query2);


$jumlah = $data['jumlah'];
$saldo_akhir = $data2['saldo_akhir'];
$hasil = $saldo_akhir - $jumlah;

// echo $saldo_akhir.' - ';
// echo $jumlah.' = ';
// echo $hasil;

// if (!empty($jumlah)) {	
mysqli_query($koneksi,"UPDATE `tb_hutang` SET `saldo_akhir`='$hasil' WHERE id IN (SELECT MAX(id) FROM `tb_hutang` WHERE author='faleh')");
// }

mysqli_query($koneksi,"DELETE FROM `tb_hutang` WHERE author='tamu'");


header("location:../");





?>