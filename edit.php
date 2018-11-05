<?php
	include "db/koneksi.php";
	
	$id = $_REQUEST['id'];
	$id_produk = $_REQUEST['id_produk'];
	$nama_produk = $_REQUEST['nama_produk'];
	$jenis = $_REQUEST['jenis'];
	$harga = $_REQUEST['harga'];
	$stok = $_REQUEST['stok'];
	$keterangan = $_REQUEST['keterangan'];
	
	$sql = mysqli_query($conn,"UPDATE bengkel SET
	id_produk='$id_produk',nama_produk='$nama_produk',jenis='$jenis',harga='$harga',stok='$stok',keterangan='$keterangan'WHERE id='$id'");
	
	if($sql){
		header("location:jumlah.php");
	}else{
		echo "gagal meng-Update";
	}
?>