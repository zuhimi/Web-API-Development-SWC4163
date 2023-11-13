<?php
# memulakan fungsi session
session_start();

#memanggil fail header, connection
include('header.php');
include('connection.php');
include('guard-staff.php');
?>
<h3 >Senarai pembeli</h3>
<!-- Borang carian nama pembeli -->
<form action='' method='POST'>
    Carian pembeli  <br>
	Nama pembeli    <input type='text' name='nama'>
	                <input type='submit' value='Cari'>
</form>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include('butang-saiz.php'); ?>
<!-- Header bagi jadual untuk memaparkan senarai pembeli -->
<table width='100%' border='1' id='saiz'>
   <tr>
       <td>Nama Pembeli</td>
	   <td>Nokp Pembeli</td>
	   <td>Model Kasut</td>
	   <td>Jenama</td>
	   <td>Harga</td>
	   <td>Tarikh Beli</td>
   </tr>
<?php
# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai pembeli
$tambahan="";
if(!empty($_POST['nama']))
{
	$tambahan= "and nama_pembeli like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama pembeli
$arahan_papar="SELECT * FROM
jualan,pembeli,barang,jenama
WHERE
         jualan.nokp_pembeli    =   pembeli.nokp_pembeli
AND		 jualan.kod_barang      =   barang.kod_barang
AND		 barang.kod_jenama      =   jenama.kod_jenama
$tambahan ";

# laksanakan arahan mencari data pembeli
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
	{
		# memaparkan senarai nama dalam jadual 
		echo"<tr>
		<td>".$m['nama_pembeli']."</td>
		<td>".$m['nokp_pembeli']."</td>
		<td>".$m['nama_barang']."</td>
		<td>".$m['jenama_barang']."</td>
		<td>".$m['harga']."</td>
		<td>".$m['tarikh_beli']."</td>
		</tr>";
	}
?>
</table>
<?php include ('footer.php'); ?>