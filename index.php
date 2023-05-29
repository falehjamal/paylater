<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mutasi | Transaksi</title>

	<!-- CSS Assets -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
<link href="node_modules/toastr/build/toastr.min.css" rel="stylesheet"/>

<!-- Javascript Assets -->
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/toastr/build/toastr.min.js"></script>

	<style type="text/css">
		html,body{
			margin: 0;
			padding: 0;
			font-family: "Roboto";
		}
		.jumbotron{
			position:absolute;
			top:0px;
			right:0px;
			bottom:0px;
			left:0px;
			height: 100%;
		}
		@media only screen and (max-width: 550px) {
		  #isi {
		  	overflow: scroll;
		  }
		}
	</style>
</head>
<body>

<!-- ini perubahan  -->


	<div class="jumbotron">
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<span>MUTASI TRANSAKSI</span>

							<a href="" onclick="return false" class="btn btn-primary btn-sm ml-3" id="tambah" style="display:none;">Tambah</a> 
							<a href="" class="btn btn-danger btn-sm ml-3" id="logout" style="display:none;float:right" onclick="localStorage.clear();">Logout</a> 

							<div class="span" style="float:right">
								<div id="user">
									
								</div>
							</div>

							

						</div>
						<div class="card-body" id="card">

							     <div id="myDiv" class="mb-3">
							        <img id="loading-image" src="loading.gif" style="display:none;"/>
							      	<div class="total">
							      		
							      	</div>
							    </div>

							    <form onsubmit="return false" method="POST" id="form-tambah" class="form-user mb-3" style="display:none;">
								  <div class="mb-3">
								    <label for="jumlah" class="form-label">Jumlah</label>
								    <input type="number" class="form-control" name="jumlah" aria-describedby="emailHelp" id="jumlah">
								  </div>
								  <div class="mb-3">
								     <label for="keterangan" class="form-label">keterangan</label>
								    <input type="text" class="form-control" name="keterangan" id="keterangan">
								    <input type="hidden" name="author">
								  </div>
								  <input type="submit" class="btn btn-primary btn-sm" id="tombol-simpan" name="tombol-simpan" value="Simpan">
								</form>

								

								<div id="isi">
									<div id="login" style="display:block;">
									<form id="loginForm" method="POST">
										<label for="inputPassword5" class="form-label">Password</label>
										<input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" name="password" id="password">
										<!-- <button type="submit" class="btn btn-primary"  style="display:block;">Login</button> -->
									</form>
									<div id="passwordHelpBlock" class="form-text">
									    <i>* Untuk melihat dan menambahkan mutasi silahkan masukkan password </i> <br>
									    <i>* Untuk hanya akses melihat mutasi silahkan masukkan password </i>"<b>tamu</b>"<i> tanpa tanda kutip</i>
									</div>
								</div>
								</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>



	<script type="text/javascript">
		$(document).ready(function(){
			tampil();
			
			function ajaxku() {
				$.ajax({
				type: "GET",
				url: "inc/data.php",
				 success: function(result){
			    $("#isi").html(result);
			  }
			});
			$.ajax({
				type: "GET",
				url: "inc/total.php",
				 success: function(result){
			    $('.total').html(result);
			  }
			});

			}

			function logged() {
				toastr.success('Password terverifikasi');
				ajaxku();
				$('#login').slideUp();
				$('#tambah').slideDown();
				$('#logout').slideDown();

				var login = localStorage.getItem('login');
				$('#user').html('Hai, '+login);
				
				if (login === 'tamu') {
					$('#tambah').hide();
				}
			}

			function tampil() {

				 $("input[type='password']").keypress(function (e){
			    var isi = $(this).val();

			    if (e.which == '13'){
			    	e.preventDefault();
			    	if (isi!='') {
					     $.ajax({
					      url: 'inc/login.php', 
					      method: 'POST',
					      data: {
					        password: isi
					      },
					      success: function(response) {
							var json = JSON.parse(response); 
							var id = json.id; 

							if (id==1) {
								localStorage.setItem('login', 'admin');
								logged();
							 }else if(id==2){
						    	localStorage.setItem('login', 'tamu');
								logged();
						    }else if(id==0){
								toastr.error('Password salah');
						    }
					      },
					      error: function(xhr, status, error) {
					        console.log(xhr.responseText);
					      }
					    });			    		
					 }else{
					 	toastr.warning('Passwordnya diisi sayang :)');
					 }

			    }
			    
			  });

				var login = localStorage.getItem('login');
				if (login!=null) {
					logged();
				}else{
					toastr.info('Silahkan login');
				}
			}

			$('#tambah').click(function() {
				$("#form-tambah").slideToggle();
				var login = localStorage.getItem('login');
				if (login == 'admin') {
					login = 'faleh'
				}else if(login == 'tamu') {
					login = 'tamu'
				}
				$("input[type='hidden']").attr("value",login);;
			});

			$("#tombol-simpan").click(function(){
				var data = $('#form-tambah').serialize();
				var jumlah = $('#jumlah').val();
				var keterangan = $('#keterangan').val();

				if (jumlah=='') {
					toastr.warning('Jumlah wajib diisi ya sayang')
					return;			
				}else if (jumlah==0) {
					toastr.warning('jumlah tidak boleh 0')
					return;			
				}else if (jumlah>1000000000 && keterangan.length>100) {
					toastr.error('Jumlah dan Keterangan melebihi batas karakter')
					return;			
				}else if (jumlah>1000000000) {
					toastr.warning('Jumlah kelebihan')
					return;			
				}else if (keterangan.length>100) {
					toastr.warning('Keterangan jangan melebihi 100 karakter')
					return;	
				}
			
				$.ajax({
					type: 'POST',
					url: "inc/post.php",
					data: data,
					success: function() {
						$('#form-tambah').slideUp();
						$('#form-tambah')[0].reset();
						ajaxku();				
						toastr.success('<b>Hutang</b> baru kamu telah dibuat');
					}
				});
			});

			$('#logout').click(function() {
			    location.reload();
			});

			$(document).on("contextmenu", function(e) {
	            e.preventDefault();
	            toastr.error('<b>TIDAK BOLEH KLIK KANAN</b>');
	        });

		}); // penutup jquery



	</script>
</body>
</html>