<?php

	include "db/koneksi.php";
	
	if(isset($_REQUEST['simpan'])){

	$id_produk = $_REQUEST['id_produk'];
	$nama_produk = $_REQUEST['nama_produk'];
	$jenis = $_REQUEST['jenis'];
	$harga = $_REQUEST['harga'];
	$stok = $_REQUEST['stok'];
	$keterangan = $_REQUEST['keterangan'];

	$cekData = "select id_produk from bengkel where id_produk='$id_produk'";
			$ada = mysqli_query($conn, $cekData);
			if(mysqli_num_rows($ada) > 0)
			{
				echo "<script>alert('ID telah digunakan. Silahkan input ID yang lain');window.location='tambah.php'</script>";
			}
			else{

				$sql = mysqli_query($conn,"INSERT INTO bengkel VALUES('','$id_produk','$nama_produk','$jenis','$harga','$stok','$keterangan')");

					if($sql){
						echo "<script>alert('data berhasil disimpan');window.location='jumlah.php'</script>";
					}else{
						echo "gagal menyimpan";
			}
 		}
	
 }

?>