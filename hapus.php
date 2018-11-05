<?php
	include "db/koneksi.php";
	
	$id = $_REQUEST['id'];
	
	$sql = mysqli_query($conn,"DELETE FROM bengkel WHERE id='$id'");
	
	if($sql){
		header("location:jumlah.php");
	}else{
		echo "gagal meng-hapus";
	}

?>