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
		function PrintDoc(){
			var toPrint = document.getElementById('ata');
			var popupWin = window.open('');
			popupWin.document.open();
			popupWin.document.write('<html><title>::Print Data::</title><link rel="stylesheet" type="text/css" href="css/bootstrap.css" /></head><body onload="window.print()">')
			popupWin.document.write(toPrint.outerHTML);
			popupWin.document.write('</html>');
			popupWin.document.close();

		}
	</script>
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
	<br>
	<center><div style="font-size:20px;background-color:red;color:#FFF;font-family:verdana;border:solid 1px #ccc;padding:10px;" id="divjam"></div></center>

		<?php
			include "db/koneksi.php";
		?>
		<form action="" method="post" name="postform">
			<h3 align="center">Laporan Penjualan Berdasarkan Tanggal</h3>
			<table align="center">
				<tr>
					<td width="125"><b>Dari Tanggal :</b></td>
				</tr>
				<tr>
					<td colspan="2" width="190">: <input type="text" name="tanggal_awal" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
				</tr>
				<tr>
					<td widt="125"><b>Sampai Tanggal :</b></td>
				</tr>
				<tr>
					<td colspan="2" width="190"> : <input type="text" name="tanggal_akhir" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
				</tr>
				<tr align="center">
					<td width="190"><input type="submit" class="btn btn-primary" value="Cari" name="pencarian" />
					<input type="reset" value="Reset" class="btn btn-warning"/></td> 
				</tr>
			</table>
		</form><br/>
		<p>
			<?php

	if(isset($_POST['pencarian'])){
		$tanggal_awal=$_POST['tanggal_awal'];
		$tanggal_akhir=$_POST['tanggal_akhir'];

		if(empty($tanggal_awal)|| empty($tanggal_akhir)){
?>

<script>
	alert('Harap Diisi Semua');document.location='laporan_penjualan.php';
</script>
	<?php
		}else{
		?><i><b>Informasi : </b> Data Transaksi Penjualan Berdasarkan Periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
		<button type="button" onclick="PrintDoc();" style="background-color: yellow;" class="navbar-form pull-right">Print</button><br>
	<?php
		$query=mysqli_query($conn, "select * from detail_transaksi where tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

		$no=1;
		$sub=0;
								}
	?>
</p>
		<table class="table table-hover" id="ata">
				<tr>
					<th colspan="8" scope="col" class="form-actions"><em><center>Total Pendapatan bengkel Per Periode Tanggal <?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></center></em></th>
				</tr>
				<tr>
					<td>No</td>
					<td>ID Produk</td>
					<td>Nama Produk</td>
					<td>Jumlah</td>
					<td>Harga Satuan</td>
					<td>Total</td>
				</tr>
					<?php
					while($row=mysqli_fetch_array($query)){

						$tot=$row['jumlah']*$row['harga'];

						$sub += $tot;
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $row['id_produk']; ?></td>
						<td><?php echo $row['nama_produk']; ?></td>
						<td><?php echo $row['jumlah']; ?></td>
						<td><?php echo $row['harga']; ?></td>
						<td><?php echo $tot ?></td>
					</tr>
					<?php
					$no++;
						}
					?>
					<tr>
                        <td colspan='5'><h4 align='right'>Total Pendapatan :</h4></td>
                       <td colspan='6'><h4><?php echo $sub ?></h4></td>
                    </tr>
					<tr>
						<td colspan="4" align="center">
							<?php
							if(mysqli_num_rows($query)==0){
								echo "echo <font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
							}
							?>
						</td>
					</tr>
				</table>
				<?php
					}else{
						unset($_POST['pencarian']);
					}
				?>

			<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
	</body>
</html>
<?php } ?>