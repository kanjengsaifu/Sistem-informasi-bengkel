<?php
	ob_start();
	session_start();
	if($_SESSION){
	header("location:index.php");
	}else{
?>
<html>
<head>
<title>Login</title>
 <link rel="stylesheet" href="css/login.css">
</head>
<body>
	 <div class="konten">
        <div class="kepala">
            <h2 class="judul">Silahkan Masuk</h2>
            </div>
            <div class="artikel">
				<form action="" method="post">
				<div class="grup">
					 <label for="email">Alamat E-mail</label>
					<input type="text" name="email" placeholder="masukan E-mail anda" /><br>
				</div>
				<div class="grup">
                    <label for="password">Password</label>
					<input type="password" name="pass" placeholder="masukan password anda" /><br>
				 </div>
				  <div class="grup">
					<input type="submit" name="masuk" class="btn" value="Login" /><br>
				
	<?php
		include "db/koneksi.php";

		if(isset($_POST['masuk'])){

		$emm=$_POST['email'];
		$passw=$_POST['pass'];
		$passs=md5($passw);

		$cek = mysqli_query($conn, "SELECT * FROM login WHERE email = '".$emm."' AND password = '".$passw."'");
		$hasil = mysqli_fetch_array($cek);
		$count = mysqli_num_rows ($cek);
		$nama_user = $hasil['nama'];
		if($count > 0){
			session_start();
			$_SESSION['nama'] = $nama_user;
			header("location:index.php");
		}else{
			echo "maaf username atau password salah";
		}
	}
		?>
  </div>
	</form>
  </div>
  </div>
	
</body>
</html>
<?php } ?>