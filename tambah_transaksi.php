<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['nama'])){
        header("location:masuk.php");
    }else{
?>
<html>
<head>
<title>Form Penambahan data produk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.ui.datepicker.js"></script>
<script>
    var id;
    var nota;
    var id_produk;
    var nama_produk;
    var jenis;
    var harga;
    var jumlah;
    var subtotal;
    var stok;
    var pelanggan;
    var total;
    var jumhar;
    var pembayaran;
    var kembali;
    var admin;
    var tanggal;
    var petugas;

    $(function(){
        $("#nama_produk").load("pk.php","op=ambilbarang");

        $("#barang").load("pk.php", "op=barang");

        $("#id_produk").val("");
        $("#jenis").val("");
        $("#harga").val("");
        $("#jumlah").val("");
        $("#subtotal").val("");
        $("#stok").val("");

        $("#nama_produk").change(function(){
            nama_produk=$("#nama_produk").val();

            $("status").html("Loading. . .");

            $.ajax({
                url:"proses.php",
                data:"op=ambildata&nama_produk="+nama_produk,
                cache:false,
                success:function(msg){
                    data=msg.split("|");

                    $("#id_produk").val(data[2]);
                    $("#harga").val(data[0]);
                    $("#jenis").val(data[3]);
                    $("#stok").val(data[1]);
                    $("#jumlah").focus();

                    $("#status").html("");
                }
            });
        });


        //jika tombol tambah diklik

        $("#tambah").click(function(){

            nama_produk=$("#nama_produk").val();
            jumlah=$("#jumlah").val();
            stok=$("#stok").val();

            if(nama_produk=='Nama Barang'){
                alert("Pilih Barang Dulu");
                return false;

            }else if(jumlah < 1){
                alert("Jumlah Tidak Boleh 0");
                $("#jumlah").focus();
                return false;
            }else if(jumlah > stok){
                alert("stok tidak terpenuhi");
                $("#jumlah").focus();
                return false;
            }

            id_produk=$("#id_produk").val();
            jenis=$("#jenis").val();
            harga=$("#harga").val();
            subtotal=$("#subtotal").val();

            $("#status").html("sedang proses. . ");

            $.ajax({
                url:"pk.php",
                data:"op=tambah&nama_produk="+nama_produk+"&jenis="+jenis+"&harga="+harga+"&jumlah="+jumlah+"&subtotal="+subtotal+"&id_produk="+id_produk,
                cache:false,
                success:function(msg){
                    if(msg=="sukses"){
                        $("#status").html("Berhasil disimpan. .");
                    }else{
                        $("#status").html("EROOR. .");
                    }
                    $("#id_produk").val("");
                    $("#jenis").val("");
                    $("#harga").val("");
                    $("#jumlah").val("");
                    $("#subtotal").val("");
                    $("#nama_produk").load("pk.php", "op=ambilbarang");
                    $("#barang").load("pk.php", "op=barang");

                }
            });
        });

        //jika tombol selesai diklik
        $("#selesai").click(function(){

                $("#cc").fadeIn();

                $.ajax({
                    url:"proses.php",
                    data:"op=ambiltotal",
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");

                        $("#jumhar").val(data[0]);
                }
            });
        });

        //jika tombol bayar diklik
        $("#proses").click(function(){

            nota=$("#nota").val();
            pelanggan=$("#pelanggan").val();
            jumhar=$("#jumhar").val();
            pembayaran=$("#pembayaran").val();
            kembali=$("#kembali").val();
            petugas=$("#petugas").val();

            $.ajax({
                url:"pk.php",
                data:"op=proses&nota="+nota+"&pelanggan="+pelanggan+"&jumhar="+jumhar+"&pembayaran="+pembayaran+"&kembali="+kembali+"&petugas="+petugas,
                cache:false,
                success:function(msg){
                    if(msg=='sukses'){
                        $("#status").html('transaksi Berhasil');
                        alert('Transaksi Berhasil');
                        window.location='data_transaksi.php';
                    }else{
                        $("#status").html('Gagal');
                        alert('Gagal');
                        return false;
                    }
                    $("#nama_produk").load("pk.php", "op=ambilbarang");
                    $("#barang").load("pk.php", "op=barang");
                    $("#id_produk").val("");
                    $("#jenis").val("");
                    $("#harga").val("");
                    $("#jumlah").val("");
                    $("#subtotal").val("");
                }
            });
        });
});
</script>
<script>
        function hitung(){
            var a = $("#pembayaran").val();
            var b = $("#jumhar").val();
            c = a - b;
            $("#kembali").val(c);
        }
</script>
<script>
    function startCalc(){
    interval=setInterval("Calc()",1);}
    function Calc(){
    one = document.form1.harga.value;
    two = document.form1.jumlah.value;
    document.form1.subtotal.value=(one * 1) * (two * 1); }
    function stopCalc(){
    clearInterval(interval);}
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
        <br>
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
    <br>
        <div class="container">
                <?php
                include "db/koneksi.php";
                $p=isset($_GET['act'])?$_GET['act']:null;
                switch($p){
                        default:   
                    
                        $auto=mysqli_query($conn, "select * from transaksi order by nonota desc limit 1");
                        $no=mysqli_fetch_array($auto);
                        $angka=$no['nonota']+1;

                        echo '<legend align="center" class="form-actions"><h2><em>Transaksi Penjualan</em></h2></legend>';
                        echo "<div>
                                No.Nota : <input type='text' class='span1' id='nota' value='$angka' readonly>
                                </div>";
                        echo' <form name="form1" method="get" action="tambah_transaksi.php">
                            <select id="nama_produk"></select>
                            <input type="text" id="jenis" class="span2" placeholder="Jenis Barang" readonly>
                            <input type="text" id="harga" class="span2" placeholder="Harga barang" readonly>
                            <input type="text" id="jumlah" onfocus="startCalc();" onblur="stopCalc();" placeholder="jumlah" class="span2">
                            <input type="text" id="subtotal" class="span2" onchange="TryNumberFormat(this.form.thirdbox);" placeholder="Total Harga" readonly>
                            <input type="text" id="stok" class="span2" style="display:none" readonly>
                            <input type="text" id="id_produk" class="span2" style="display:none" readonly>
                            <button id="tambah" class="btn btn-primary" onclick="return false;">Tambah</button>
                            
                            <span id="status"></span>
                            <br>

                            <table id="barang" class="table table-bordered" align="center">

                            </table>
                <button type="button" id="selesai" class="btn btn-warning">Selesai</button>

                 <table id="cc" class="table table-bordered" style="display:none;">
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><input type="text" id="pelanggan" class="span2"></td>
                        <td>Nama Mekanik</td>
                        <td><input type="text" id="mekanik" class="span2"></td>
                    </tr>
                    <tr>
                        <td>Merk/type</td>
                        <td><input type="text" id="merk" class="span2"></td>
                        <td>Jumlah Harga</td>
                        <td><input type="text" id="jumhar" onchange="hitung();" class="span2" readonly></td>
                    </tr>
                    <tr>
                        <td>No Polisi</td>
                        <td><input type="text" id="nopol" class="span2"></td>
                        <td>Pembayaran</td>
                        <td><input type="text" id="pembayaran" onchange="hitung();" class="span2"></td>
                    </tr>
                    <tr>
                        <td>No Rangka</td>
                        <td><input type="text" id="norang" class="span2"></td>
                        <td>Kembali</td>
                        <td><input type="text" id="kembali" class="span2" readonly></td>
                    </tr>
                    <tr>
                        <td>No Mesin</td>
                        <td><input type="text" id="nomes" class="span2"></td>
                        <td>Petugas</td>
                        <td><input type="text" id="petugas" class="span2"</td>
                    </tr>
             </table>

                            <div class="form-actions">
                                <center><button id="proses" class="btn btn-primary" onclick="return false;">Bayar</button>
                                <button id="batal" class="btn btn-warning">Batal</button></center>
                            </div>';
                        break;
            }
            ?>
</body>
</html>
<?php } ?>