<?php

include "db/koneksi.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM bengkel 
  WHERE id_produk LIKE '%".$search."%'
  OR nama_produk LIKE '%".$search."%' 
  OR jenis LIKE '%".$search."%' 
  OR harga LIKE '%".$search."%' 
  OR stok LIKE '%".$search."%'
  OR keterangan LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM bengkel ORDER BY nama_produk
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
$no = 1;
 $output .= '

<table border="1" cellspacing="0" id="table" class="table table-bordered" align="center">
	<tr>
		<th colspan="8" scope="col" class="form-actions"><marquee>Data jasa Service dan suku cadang</marquee></th>
	</tr>
	<tr>
		<th>No</th>
		<th>Id Produk</th>
		<th>Nama Produk</th>
		<th>Jenis</th>
		<th>Harga</th>
		<th>stock</th>
		<th>Keterangan</th>
		<th><a href="tambah.php" class="btn btn-primary">Tambah</a></th>
	</tr>
	';
	 while($row = mysqli_fetch_array($result))
 {
	$output .= '
			 <tr>
    			<td>'.$no.'</td>
				<td>'.$row["id_produk"].'</td>
				<td>'.$row["nama_produk"].'</td>
				<td>'.$row["jenis"].'</td>
				<td>'.$row["harga"].'</td>
				<td>'.$row["stok"].'</td>
				<td>'.$row["keterangan"].'</td>
				<td><a href="edit.php?id='.$row['id'].'" class="btn btn-warning">Update</a>
				<a href="hapus.php?id='.$row['id'].'" class="btn btn-warning">Delete</a></td>
			</tr>';
			$no++;
	 }
 echo $output;
}
else
{
 echo '<td><script>alert("Data Tidak Ditemukan");
      window.location="jumlah.php"</script>';
}
	
?>