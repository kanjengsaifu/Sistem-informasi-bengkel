<?php
	include('db/koneksi.php');

	header("Content-type: aplication/force-download");
	header("Cache-control: no-cache, must-revalidate");
	header("Expires: sun, 04 mar 2017 12:00:00 GMT");
	header("content-disposition: attachment;filename=lapran_persediaan_barang.doc");
?>

<center><h2>Laporan Persediaan Barang</h2></center>
	<table border="1" align="center">
		<h3>
		<thead><tr>
			<td width="52" align="center">No</td>
			<td width="150" align="center">ID Produk</td>
			<td width="200" align="center">Nama Produk</td>
			<td width="180" align="center">Jumlah Tersedia</td>
			<td width="180" align="center">Keterangan</td>
		</tr></thead>
		<h3><tbody>

		<?php
			$n=0;
			$d=mysqli_query($conn, "select * from bengkel");
			while($r = mysqli_fetch_array($d)){
		?>
			<tr>
				<td align="center"><?php echo $n=$n+1;?></td>
				<td align="center"><?php echo $r['id_produk'];?></td>
				<td align="center"><?php echo $r['nama_produk'];?></td>
				<td align="center"><?php echo $r['stok'];?></td>
				<td align="center"><?php echo $r['keterangan'];?></td>
			</tr>
		<?php
			}

		?>
	</tbody></h3></table>
	<div>
		<p>Mengetahui :<br cellspacing="2"/>
			Pemilik Bengkel <br/><br/><br/><br/><br/>
			Aqkly Hermawan</p>
		<p style="padding: 5;text-align: right;">dibuat oleh :<br cellspacing="2"/>
			Admininistrator <br/><br/><br/><br/><br/>
				Resti Asfiani</p>
	</div>