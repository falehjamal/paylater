  <?php 
  include 'hakakses.php';
	include 'koneksi.php';

	$query3 = mysqli_query($koneksi,"SELECT * FROM `tb_hutang` WHERE id IN (SELECT MAX(id) FROM `tb_hutang`)");
	$query2 = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM `tb_hutang`");

	$data2 = mysqli_fetch_array($query2);
	$data3 = mysqli_fetch_array($query3);

if (!empty($data3['saldo_akhir'])) {
	// code...
echo "Sisa Hutang <b> Rp. ".number_format($data3['saldo_akhir'],0,",",".")."</b>";
}else{

echo "Tidak ada hutang";
}

?>