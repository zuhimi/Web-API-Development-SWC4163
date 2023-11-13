<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-staff.php
include('guard-staff.php');

# menyemak kewujudan data GET nokp staff
if(!empty($_GET))
{
	# memanggil fail connection
	include('connection.php');
	
	# arahan SQL untuk memadam data staff berdasarkan nokp yang dihantar
	$arahan   =   "delete from staff where nokp_staff='".$_GET['nokp']."'";
	
	# melaksanakan arahan SQL padam data dan menguji proses padam data
	if(mysqli_query($condb,$arahan))
	{
		# jika data berjaya dipadam
		echo "<script>alert('Padam data Berjaya');
		window.location.href='senarai-staff.php';</script>";
	}
	else
	{
		# jika data gagal dipadam
		echo "<script>alert('Padam data gagal');
        window.location.href='senarai-staff.php';</script>";
	}
}
else
{
	# jika data GET tidak wujud (empty)
	die("<script>alert('Ralat! akses secara terus');
	window.location.href='senarai-staff.php';</script>");
}
?>