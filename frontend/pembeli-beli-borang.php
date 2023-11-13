<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header
include('header.php');
include('connection.php');
include('guard-pembeli.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-barang
if(empty($_GET)) {
	die("<script>window.location.href='senarai-barang.php';</script>");
}
?>

<h3>Pembelian Jam</h3>
<!--
    Borang yang akan digunakan untuk transaksi pembelian.
	Pada setiap input pengguna akan diumpukkan kepada value
	yang akan diambil dari data GET yang telah dihantar dari
	fail pembeli-pilih.php
-->

<img src='img/<?= $_GET['gambar'] ?>' width='10%'> <br>
Jenama Barang   :   <?= $_GET['jenama_barang'] ?> <br>
Nama Barang     :   <?= $_GET['nama_barang'] ?> <br>
Ciri            :   <?= $_GET['ciri'] ?> <br>
Harga           :   <?= $_GET['harga'] ?> <br>
<hr>
<!-- borang pembayaran tipu-tipu -->
<h3>Pembayaran Menggunakan kad kredit (tipu2) </h3>
<form action='pembeli-beli-proses.php' method='POST'>


    Nama Pemilik kad   <input type='text' name='nama'><br>
    No Kad Kredit      <input type='text' name='nokad' ><br>
    Tarikh Luput Kad   <input type='date' name='tarikh' ><br>
    Kod Keselamatan    <input type='text' name='nokod' ><br>
	                   <!-- data kod barang ini penting -->
					   <input type='hidden' name='kod_barang' value='<?=
$_GET['kod_barang'] ?>' >
                         <input type='submit' value='Bayar'>
			
</form>
<?php include ('footer.php'); ?>