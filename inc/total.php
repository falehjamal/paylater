  <?php 
  // include 'hakakses.php';
	include 'koneksi.php';

	$query3 = mysqli_query($koneksi,"SELECT * FROM `tb_hutang` WHERE id IN (SELECT MAX(id) FROM `tb_hutang`)");
	// $query2 = mysqli_query($koneksi,"SELECT SUM(jumlah) FROM `tb_hutang`");

	// $data2 = mysqli_fetch_array($query2);
	$data3 = mysqli_fetch_array($query3);


if (!empty($data3['saldo_akhir'])) {
	$data =  array(
		"status"=>200,
		"saldo"=>$data3['saldo_akhir'],
	);

	echo json_encode($data);
// echo "Sisa Hutang <b> Rp. ".number_format($data3['saldo_akhir'],0,",",".")."</b>";
}else{
echo json_encode([
	"status"=>404,
	"saldo"=>'Tidak ada hutang',
	"value"=>$data3['saldo_akhir'],
]);
}

	// $query2 = mysqli_query($koneksi,"SELECT * FROM `tb_login`");
	// $data2 = [];

	// while ($row = mysqli_fetch_array($query2)) {
	// 	$data2[] = $row;
	// }

	// echo json_encode($data2);
	// print_r($data2) ;
	// echo $data2[0]['password'];
	

?>
