<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-staff.php
include('guard-staff.php');

# menyemak kewujudan data GET kod barang
if(!empty($_GET))
{
	# memanggil fail connection
	include('connection.php');
	
	# arahan untuk memadam data barang berdasarkan kod yang dihantar
	$arahan   =  "delete from barang where kod_barang='".$_GET['kod']."'";
	
	# melaksanakan arahan dan menguji proses padam rekod
	if(mysqli_query($condb,$arahan))
	{
		# jika data berjaya dipadam
		echo "<script>alert('Padam data Berjaya');
		window.location.href='senarai-barang.php';</script>";
	}
	else
	{
		# jika data gagal dipadam
		echo "<script>alert('Padam data gagal');
		window.location.href='senarai-barang.php';</script>";
	}
}
else
{
	# jika data GET tidak wujud (empty)
	die("<script>alert('Ralat akses secara terus');
	window.location.href='senarai-barang.php';</script>");
}
?>