<?php
include 'hakakses.php';
include 'koneksi.php';

@$password = $_POST['password'];

@$query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE password = MD5('$password')");
@$data = mysqli_fetch_array($query);
@$data = $data['id'];


if ($data==1) {

  $response = ['success' => true, 'message' => 'Login successful','role' => 'faleh','id'=>1];
  echo json_encode($response);

}elseif($data>1){

  $response = ['success' => true, 'message' => 'Login successful','role' => 'tamu','id'=>2];
  echo json_encode($response);

} else {
  $response = ['success' => false, 'message' => 'user password salah','role' => false,'id'=>0];
  echo json_encode($response);
}




?>