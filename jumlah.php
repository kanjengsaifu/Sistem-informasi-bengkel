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
	<br><br>
	<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center>

	 <div class="form-actions" style="float:right;">
     Cari Produk: <input type="text" name="search_text" id="search_text" placeholder="Cari Berdasarkan Nama" />
     <span class="btn btn-warning">Search</span>
    </div>
   <br />
   <div id="result"></div>
  </div>
	
</body>
</html>

<script>

	$(document).ready(function(){

 		load_data();

 		function load_data(query)
 		{
 		 $.ajax({
   		 url:"liat.php",
   		 method:"POST",
   		 data:{query:query},
   		 success:function(data)
   		{
    	$('#result').html(data);
   		}
  	});
 }
 		$('#search_text').keyup(function(){
  		var search = $(this).val();
  			if(search != '')
  			{
   				load_data(search);
  			}else{
   				load_data();
  			}
 		});
	});
</script>

<?php } ?>