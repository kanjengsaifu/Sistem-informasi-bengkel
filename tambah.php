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
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>

		  $(document).ready(function() {
    		setInterval(function() {
	      $('#divjam').load('jam.php?acak='+ Math.random());
    	}, 1000);
  	});
</script>
	<script>
		function validasi(){

		var id = document.getElementById('id');

		if(harusDiisi(id, "ID harus diisi")){
			return true;
		};
		return false;
	}
	function harusDiisi(att, msg){
		if(att.value.length == 0){
			alert(msg);
			att.focus();
			return false;
		}	
		return true;
	}
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
					<li><a href="?page=data_transaksi">Data Transaksi</a></li>
					<li><a href="?page=tambah_transaksi">Tambah Transaksi</a></li>
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
	<br><br>
		<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center>
		<br>
	<br>
	<form method="post" onsubmit="return validasi();" action="simpan.php">
	<table align="center">
		<tr>
			<th colspan="5" scope="col">Data Penambahan Produk</th>
		</tr>
		<tr>
			<td>Id Produk</td>
			<td><input type="text" name="id_produk" id="id"/></td>
		</tr>
		<tr>
			<td>Nama Produk</td>
			<td><input type="text" name="nama_produk" id="nama"/></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><input type="radio" name="jenis" id="jenis" value="Barang"/>
			Barang
			<input type="radio" name="jenis" id="jenis" value="Jasa"/>
			Jasa</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="harga" id="harga"/></td>
		</tr>
		<tr>
			<td>jumlah</td>
			<td><input type="text" name="stok" id="stok"/></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td><textarea name="keterangan" id="ket"></textarea></td>
		</tr>
		</table>
			<center><input type="submit" name="simpan" id="simpan" class="btn" value="Simpan" >
			<a href="jumlah.php" class="btn">Kembali</a></center>
		<div class="progress"></div>	
</body>
</html>
<?php } ?>