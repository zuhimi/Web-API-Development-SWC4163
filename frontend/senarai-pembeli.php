<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-staff.php
include('header.php');
include('connection.php'); 
include('guard-staff.php');
?>

<h3 >Senarai pembeli</h3>
<!-- Boarang carian nama pembeli -->
<form action='' method='POST'>
    Carian pembeli <br> 
	Nama pembeli <input type='text' name='nama'> 
	             <input type='submit' value='Cari'>
</form>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan --> 
<?php include('butang-saiz.php'); ?> 
<!-- Header bagi jadual untuk memaparkan senarai pembeli -->
<table width='100%' border='1' id='saiz'>
     <tr>
         <td>Nama</td> 
	     <td>NoKP</td>
         <td>Katalaluan</td>
         <td>Tindakan</td>
	</tr>

<?php

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai pembeli
 $tambahan=""; 
 if(!empty($_POST['nama']))
{
      $tambahan= "where nama_pembeli like '%".$_POST['nama']."%'";
}

#  arahan query untuk mencari senarai nama pembeli
$arahan_papar="select* from pembeli $tambahan ";

# laksanakan arahan mencari data pembeli
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
	{
		# memaparkan senarai nama dalam jadual 
		echo"<tr>
	    <td>".$m['nama_pembeli']."</td>
		<td>".$m['nokp_pembeli']."</td>
		<td>".$m['katalaluan_pembeli']."</td> ";
		
		# memaparkan navigasi untuk hapus data pembeli
		echo"<td>
		
		|<a href='pembeli-padam-proses.php?nokp=".$m['nokp_pembeli']."'
		 onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
		 Hapus</a>|
		 
		 </td>
		 </tr>";
	}
?>
</table>
<?php include ('footer.php'); ?>