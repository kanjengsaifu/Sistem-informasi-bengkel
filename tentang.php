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
	<title>Jumlah Suku Cadang</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
	<br>
	<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center><br>

	<span class="text-info"><i><b><center style="font-size: 20px;">Tentang Produk Kami</center></b></i></span><br>

	<P class="text-info" style="font-size: 17px;">Kami perusahaan yang bergerak di bidang otomotif, menyediakan berbagai keperluan spearpart motor atau mobil dengan kualitas yang sangat baik dan harga yang sangat ekonomis dan ditunjang dengan pelayanan yang sangat ramah dari para karyawan kami.</P>
	<p class="text-info" style="font-size: 17px;">Produk yang kami jual bisa kami pastikan tidak akan mengecewakan konsumen selain harga yang sangat murah tetapi kualitas produk kami juga tidak kalah baik dari bengkel lainnya.</p>
	<p class="text-info" style="font-size:  17px;">ini beberapa contoh dari produk yang kami punya :</p>
	<p class="text-info" style="font-size: 17px;">1. Ban Mobil <img src="gambar/ban-mobil.jpeg" class="img"><br>
	Ban mobil dengan kualitas nomer 1 dan harga yang cukup miring</p><br>
	<p class="text-info" style="font-size: 17px;"">2. Ban Motor <img src="gambar/ban-luar-motor.jpeg" class="img"><br>
	Ban motor dengan kualitas nomer 1 dan harga yang cukup miring</p><br>
	<p class="text-info" style="font-size: 17px;">3. Ban Dalam Motor <img src="gambar/ban-dalam-motor.jpeg" class="img"><br>
	Ban dalam mobil dengan kualitas nomer 1 dan harga yang cukup miring</p><br>
	<p class="text-info" style="font-size: 17px;">4. Rante Motor <img src="gambar/rante.jpeg" class="img"><br>
	Rante Motor dengan kualitas nomer 1 dan harga yang cukup miring</p><br>
	<p class="text-info" style="font-size: 17px;">5. Ven Bel Motor <img src="gambar/venbel.jpeg" class="img"><br>
	Ven Bel Motor dengan kualitas nomer 1 dan harga yang cukup miring</p><br>
	</tbody>
	</body>
</html>
<?php } ?>