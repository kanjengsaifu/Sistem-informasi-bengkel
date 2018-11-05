<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['nama'])){
		header("location:masuk.php");
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Perbengkelan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>

		  $(document).ready(function() {
    		setInterval(function() {
	      $('#divjam').load('jam.php?acak='+ Math.random());
    	}, 1000);
  	});
</script>
</head>
<body>
	<header>
		<div id="container"> 
		<h1><center>Bengkel Urang Sunda</center></h1>
		<span><center>Jl.Jakarta Bandung</center></span>
	</header>
	<!--menu-->
	<nav>
		<ul>
			<li><a href="index.php">Beranda</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="jumlah.php">Jumlah Suku Cadang</a></li>
			<li><a href="#">Transaksi</a>
				<ul>
					<li><a href="data_transaksi.php">Data Transaksi</a></li>
					<li><a href="tambah_transaksi.php">Tambah Transaksi</a></li>
				</ul>
			</li>
			<li><a href="#">Laporan</a>
				<ul>
					<li><a href="laporan_persediaan.php">Laporan Persedian Barang</a></li>
					<li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
				</ul>
			<li><a href="tentang.php">Tentang Produk</a></li>
			<li><a href="keluar.php">Logout</a></li>	
		</ul>
	</nav>
	<tbody>
		<br><br>
		<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center>
		<br>
		<br>
		<center>
			<img src="gambar/bismillah.jpg" class="img-polaroid"><br><br>
			<P style="font-size: 20px;color:black;"><em>Selamat datang <?php echo $_SESSION['nama'] ?> dan Selamat Bekerja</em></p>
		</center>
	</tbody>
	<br>
	<div class="progress"></div>
</body>
</html>
<?php } ?>