<?php 
include 'hakakses.php';
include 'koneksi.php';

$query = mysqli_query($koneksi,"SELECT * FROM ( SELECT * FROM tb_hutang ORDER BY id DESC LIMIT 5 ) AS subquery ORDER BY id ASC");

?>


	<table class="table table-striped bg-white rounded" id="myTable">
		<thead>
			<tr>
				<th scope="col">IdTrx</th>
				<th scope="col">Tanggal</th>
				<th scope="col">Transaksi</th>
				<th scope="col">Saldo Akhir</th>
				<th scope="col">Ket</th>
				<th scope="col">Author</th>
			</tr>
		</thead>
		<tbody id="tbody">
			<?php 
			$no =1;
			while($data = mysqli_fetch_array($query)){

			$date=date_create($data['created_at']);
			 ?>
			<tr>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo date_format($date,"d/m/Y H:i:s");?></td>
				<td><?php echo  number_format($data['jumlah'],0,",",".");?></td>
				<td><?php echo number_format($data['saldo_akhir'],0,",","."); ?></td>
				<td><?php echo $data['keterangan'];
				if ($data['keterangan']=="") {
					echo "<i>tanpa keterangan</i>";
				}

				 ?>
				</td>
				<td><?php echo $data['author']; 
					if ($data['author']=="") {
						echo "<i>tanpa author</i>";
					}
					 ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	