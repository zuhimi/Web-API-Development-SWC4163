<?php
#memulakan fungsi SESSION
session_start();

#menyemak kewujudan data post
if(!empty($_POST))
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$tarikh_beli = date("y-m-d");
	include ('connection.php');
	
	#arahan query untuk menyimpan data jualan.
	$sql_simpan = "insert into jualan
	(nokp_pembeli, kod_barang, tarikh_beli)
	values
	('".$_SESSION['nokp']."', '".$_POST['kod_barang']."', '$tarikh_beli') ";
	
	# melaksanakan arahan untuk menyimpan data jualan
	$laksana_query = mysqli_query($condb,$sql_simpan);
	
	# menyemak samada proses menyimpan data jualan berjaya atau tidak
	if($laksana_query)
	{
		# jika berjaya
		die("<script>alert('Pembelian Berjaya.');
		window.location.href='pembeli-sejarah.php'; </script>");
	}
	else
	{
		# jika gagal
		echo mysqli_error($condb); die();
		die("<script>alert('Pendaftaran Gagal');
		window.location.href='pembeli-signup-borang.php'; </script>");
	}
}
else
{
	die("<script>alert('Sila lengkapkan maklumat');
	window.location.href='pembeli-signup-borang.php'; </script>");
}
?>