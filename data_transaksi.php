<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['nama'])){
		header("location:masuk.php");
	}else{
?>
<html>
 <head>
  	<title>Data Transaksi</title>
  	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<script>
		  $(document).ready(function() {
    		setInterval(function() {
	      $('#divjam').load('jam.php?acak='+ Math.random());
    	}, 1000);
  	});
	</script>
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

		function PrintPreview(){
			var toPrint = document.getElementById('ata');
			var popupWin = window.open('');
			popupWin.document.open();
			popupWin.document.write('<html><title>::PrintPreview Data::</title><link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen"/></head><body">')
			popupWin.document.write(toPrint.outerHTML);
			popupWin.document.write('</html>');
			popupWin.document.close();
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

	<form name="form1" method="post" action="">
    <div class="form-actions" style="float:right;">
     Cari Produk: <input type="text" name="tcari" id="tcari" placeholder="Cari Berdasarkan Nama" />
     <input type="submit" name="button" id="button" value="cari" class="btn btn-warning"/>
 </form>
    </div>
   <br />
   		<table class="table table-bordered">
				<tr>
					<th colspan="8" scope="col" class="form-actions"><em><center><h3>Data Transaksi</h3></center></em></th>
				</tr>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Pelanggan</th>
					<th>Total Bayar</th>
					<th>Uang Bayar</th>
					<th>Kembali</th>
					<th>petugas</th>
					<th>Aksi</th>
				</tr>
  				<?php
					include "db/koneksi.php";

					if(isset($_POST['button'])){
					$search = mysqli_real_escape_string($conn, $_POST["tcari"]);
					$sql = "select * from transaksi where nama_pelanggan LIKE '%".$search."%'";
					}else{
					$sql = "select * from transaksi order by nama_pelanggan";
					}
					$hasil = $conn->query($sql);
					$no = 1;
					if($hasil->num_rows > 0){
						foreach ($hasil as $row) { ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['tanggal_transaksi']; ?></td>
							<td><?php echo $row['nama_pelanggan']; ?></td>
							<td><?php echo $row['harga']; ?></td>
							<td><?php echo $row['uang_bayar']; ?></td>
							<td><?php echo $row['uang_kembali']; ?></td>
							<td><?php echo $row['admin']; ?></td>
							<?php echo "<td><a href='#myModal' class='btn btn-primary btn-small' id='custId' data-toggle='modal' data-id=".$row['nonota'].">Detail</a></td>"; ?>
						</tr>
						<?php
						$no++;  
						}
					}else{
						echo "<td><script>alert('Data Tidak Ditemukan');exit;
      							window.location='data_transaksi.php'</script></td>";
					}

				?>
				</table>

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title">Detail Penjualan</h4>
						<div class="fetched-data" id="ata"></div>
					</div>
					<div class="modal-footer">
						<button type="button" onclick="PrintDoc();" class="btn btn-primary">Print</button>
						<button type="button" onclick="PrintPreview();" class="btn btn-warning">Preview</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#myModal').on('show.bs.modal', function(e){
					var rowid = $(e.relatedTarget).data('id');
					//menggunakan fungsi ajax untuk pengambilan data
					$.ajax({
						type:'post',
						url:'detail.php',
						data:'rowid='+rowid,
						success:function(data){
							$('.fetched-data').html(data); //menampilkan data kedalam modal
						}
					});
				});
			});
		</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
 </body>
</html>
<?php } ?>