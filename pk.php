<?php
	include "db/koneksi.php";
	$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='ambilbarang'){
	$data=mysqli_query($conn, "SELECT * from bengkel");
	echo "<option>Nama Barang</option>";
	while($r=mysqli_fetch_array($data)){
		echo "<option value='$r[nama_produk]'>$r[nama_produk]</option>";
	}
}else if($op=='ambildata'){
	$nama_produk=$_GET['nama_produk'];
	$dt=mysqli_query($conn, "select * from bengkel where nama_produk='$nama_produk'");
	$d=mysqli_fetch_array($dt);
	echo $d['harga']."|".$d['stok']."|".$d['id_produk']."|".$d['jenis'];
}else if($op=='barang'){
	$brg=mysqli_query($conn, "select * from keranjang");
	echo "<thead>
			<th colspan='7'><center><p>Keranjang Belanja</p></center></th>
			<tr>
				<td>No</td>
				<td>ID Produk</td>
				<td>Nama Produk</td>
				<td>Jenis</td>
				<td>Harga</td>
				<td>jumlah</td>
				<td>Subtotal</td>
				<td>Tools</td>
			</tr>
		</thead>";
		if(mysqli_num_rows($brg) > 0){
			$no = 1;	
		while($r=mysqli_fetch_array($brg)){
			echo "<tr>
					<td>$no</td>
					<td>$r[id_produk]</td>
					<td>$r[nama_produk]</td>
					<td>$r[jenis]</td>
					<td>$r[harga]</td>
					<td>$r[jumlah]</td>
					<td>$r[subtotal]</td>
					<td><a href='pk.php?op=hapus&nama_produk=$r[nama_produk]' id='hapus' class='btn'>X</a>
					</td>
				</tr>";
				$no++;
			}
		}

	}else if($op=='tambah'){

		$id_produk=$_GET['id_produk'];
		$nama_produk=$_GET['nama_produk'];
		$jenis=$_GET['jenis'];
		$harga=$_GET['harga']; 
		$jumlah=$_GET['jumlah'];
		$subtotal=$_GET['subtotal'];

		$tambah = mysqli_query($conn, "insert into keranjang (nama_produk,id_produk,jenis,harga,jumlah,subtotal) values ('$nama_produk','$id_produk','$jenis','$harga','$jumlah','$subtotal')");

		if($tambah){
			echo "sukses";
		}else{
			echo "gagal";
		}

	}else if($op=='hapus'){
			 $nama_produk=$_GET['nama_produk'];
			$del=mysqli_query($conn, "delete from keranjang where nama_produk='$nama_produk'");
			if($del){
				echo "<script>alert('hapus data berhasil');
					window.location='tambah_transaksi.php';</script>";
			}else{
				echo "<script>alert('gagal hapus data');
				window.location='tambah_transaksi.php';</script>";
			}

	}else if($op=='proses'){

		$tanggal=date('Y-m-d');
		$nota=$_GET['nota'];
		$pelanggan=$_GET['pelanggan'];
		$jumhar=$_GET['jumhar'];
		$pembayaran=$_GET['pembayaran'];
		$kembali=$_GET['kembali'];
		$petugas=$_GET['petugas'];

		$simpan=mysqli_query($conn, "insert into transaksi(nonota,tanggal_transaksi,nama_pelanggan,harga,uang_bayar,uang_kembali,admin) 
			values('$nota','$tanggal','$pelanggan','$jumhar','$pembayaran','$kembali','$petugas')");

		if($simpan){
			$query=mysqli_query($conn, "select * from keranjang");
			while($r=mysqli_fetch_row($query)){
			mysqli_query($conn, "insert into detail_transaksi(nonota,tanggal_transaksi,nama_produk,jenis,harga,jumlah,total,id_produk)
				values('$nota','$tanggal','$r[1]','$r[2]','$r[3]','$r[4]','$jumhar','$r[6]')");
			mysqli_query($conn, "update bengkel set stok=stok-'$r[4]' where nama_produk='$r[1]'");

			}
			mysqli_query($conn, "truncate table keranjang");
			echo "sukses";
		}else{
			echo "Error";
		}
}

?>