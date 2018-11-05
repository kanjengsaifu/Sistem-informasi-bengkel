<?php

  include "db/koneksi.php";
  if($_POST['rowid']){
    $id = $_POST['rowid'];

    //mengambil data berdasarkan id
    
  $query=mysqli_query($conn, "select transaksi.nonota,detail_transaksi.id_produk,detail_transaksi.nama_produk,
    detail_transaksi.jenis,detail_transaksi.harga,detail_transaksi.jumlah,transaksi.admin
    from detail_transaksi,transaksi
    where transaksi.nonota=detail_transaksi.nonota and detail_transaksi.nonota='$id'");
    $nomor = mysqli_fetch_array(mysqli_query($conn, "select * from transaksi where nonota='$id'"));
    echo "<div class='navbar-form pull-right'>
          No.Nota : <input type='text' value='$nomor[nonota]' class='span1' disabled>
          <input type='text' value='$nomor[tanggal_transaksi]' class='span2' disabled>
          </div><br><br>";
    if(mysqli_num_rows($query) > 0)
{
$no = 1;

    echo  "<table class='table table-hover'>
        <thead>
        <tr>
          <td>No</td>
          <td>ID Produk</td>
          <td>Nama Produk</td>
          <td>Jenis</td>
          <td>Harga</td>
          <td>Jumlah</td>
          <td>Petugas</td>
        </tr>
      </thead>";

        while($r=mysqli_fetch_row($query)){

      echo "<tr>
              <td>$no</td>
              <td>$r[1]</td>
              <td>$r[2]</td>
              <td>$r[3]</td>
              <td>$r[4]</td>
              <td>$r[5]</td>
              <td>$r[6]</td>
            </tr>";
          $no++;
   }
      }
      echo "<tr>
             <td colspan='6'><h4 align='right'>Total</h4></td>
             <td colspan='7'><h4>$nomor[harga]</h4></td>
            </tr>
          </table>";
      
    }
?>