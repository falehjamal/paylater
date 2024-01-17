<?php
include 'hakakses.php';
include 'koneksi.php';

@$password = $_POST['password'];

@$query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE password = MD5('$password')");
@$data = mysqli_fetch_array($query);
@$id = $data['id'];
@$nama = $data['nama'];

if ($id==1) {
  echo json_encode([
      'success' => true, 
      'message' => 'Login successful',
      'nama' => $nama,
      'id'=> 1,
  ]);
}elseif($id==2){
    echo json_encode([
      'success' => true, 
      'message' => 'Login successful',
      'nama' => $nama,
      'id'=> 2,
  ]);
}elseif($id>2){
  echo json_encode([
    'success' => true, 
    'message' => 'Login successful',
    'nama' => $nama,
    'id'=> 3,
]);
} else {
    echo json_encode([
      'success' => false, 
      'message' => 'user password salah',
      'role' => false,
      'id'=> 0,
    ]);
}




?>
