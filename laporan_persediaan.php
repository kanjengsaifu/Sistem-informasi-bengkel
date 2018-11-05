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
		<br>
		<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center><br>
		<div class="navbar-form pull-right">
		<a href='excel.php' class='btn btn-primary' align='right'>To excel</a>
		<a href='word.php' class='btn btn-primary' align='right'>To word</a>
	</div>

	<?php
		include "db/koneksi.php";

		$query = mysqli_query($conn, "select * from bengkel");
		if(mysqli_num_rows($query) > 0){
			$no=1;

		echo "<table id='table' class='table table-bordered'>
			<tr>
					<td colspan='8' scope='col' class='form-actions'><em><center><h3>Laporan Persediaan Barang</h3></center></em></td>
				</tr>
			<tr>
				<td>No</td>
				<td>Id Produk</td>
				<td>Nama Produk</td>
				<td>Jumlah Tersedia</td>
				<td>Keterangan</td>
			</tr>";
			while($r=mysqli_fetch_array($query)){
				echo '<tr>
						<td>'.$no.'</td>
						<td>'.$r["id_produk"].'</td>
						<td>'.$r["nama_produk"].'</td>
						<td>'.$r["stok"].'</td>
						<td>'.$r["keterangan"].'</td>
					</tr>';
					$no++;
			}
		}

	?>

	</tbody>
</body>
</html>
<?php } ?>