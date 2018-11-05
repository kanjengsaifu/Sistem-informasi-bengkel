<?php
	include "db/koneksi.php";
	$data=mysqli_query($conn, "select * from bengkel");
	$op=isset($_GET['op'])?$_GET['op']:null;

	if($op=='ambildata'){
		$nama_produk=$_GET['nama_produk'];
		$dt=mysqli_query($conn, "select * from bengkel where nama_produk='$nama_produk'");
		$d=mysqli_fetch_array($dt);
		echo $d['harga']."|".$d['stok']."|".$d['id_produk']."|".$d['jenis'];
	}else if($op=='ambiltotal'){

		$total=mysqli_fetch_array(mysqli_query($conn, "select sum(subtotal) as total from keranjang"));

		echo $total['total'];
	}
?>