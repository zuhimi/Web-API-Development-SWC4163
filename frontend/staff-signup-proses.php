<?php
# memulakan fungsi SESSION
session_start();

# menyemak kewujudan data post
if(!empty($_POST))
{
	include ('connection.php');
	
	# data validation : had atas had bawah
	# nokp yang dimasukkan hendaklah 12 digit dan tidak mempunyai huruf atau simbol
	if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
	{
		die ("<script>alert ('Ralat Pada No Kad Pengenalan');
		window.location.href='staff-signup-borang.php'; </script>");
	}

    # arahan SQL (query) untuk menyimpan data staff baru
    $sql_simpan = "insert into staff
    (nama_staff, nokp_staff, katalaluan_staff)
    values
    ('".$_POST['nama']."', '".$_POST['nokp']."', '".$_POST['katalaluan']."') ";
	
        # Melaksanakan arahan SQL menyimpan data staff baru
	$laksana_query = mysqli_query($condb,$sql_simpan);
	
	# menguji jika proses menyimpan data berjaya atau tidak
	if($laksana_query)
	{
		# jika data berjaya disimpan. papar popup dan buka fail senarai-staff
		echo"<script>alert('Pendaftaran Berjaya.');
		window.location.href='senarai-staff.php'; </script>";
	}
	else
	{
		# jika data tidak berjaya disimpan. papar popup dan buka fail signup-borang
		echo"<script>alert('Pendaftaran Gagal');
		window.location.href='staff-signup-borang.php'; </script>";
	}
}
else
{
	# jika pengguna buka fail ini tanpa mengisi data.
	# papar popup dan buka fail staff-signup-borang.php
	echo"<script>alert('Sila lengkapkan maklumat');
	window.location.href='staff-signup-borang.php'; </script>";
}
?>