<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post yang dihantar dari staff-login-borang.php
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan']))
{
	# memanggil fail connection.php
	include ('connection.php');
	
	# Arahan SQL (query) untuk membandingkan data yang dimasukkan
	# wujud di pangkalan data atau tidak 
	$query_login = "select * from staff
	where
	        nokp_staff          =  '".$_POST['nokp']."'
	and     katalaluan_staff    =  '".$_POST['katalaluan']."' ";
	
	# melaksanakan arahan membandingkan data
	$laksana_query = mysqli_query($condb,$query_login);
	
	# jika terdapat 1 data yang sepadan, login berjaya
	if(mysqli_num_rows($laksana_query)==1)
	{
		# mengambil data yang ditemui
		$m =  mysqli_fetch_array($laksana_query);
		
		# mengumpukkan kepada pembolehubah session
		$_SESSION['nokp']  =  $m['nokp_staff'];
		$_SESSION['tahap'] =  "staff";
		
		# membukan laman index.php
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
		# login gagal. kembali ke laman staff-login-borang.php
		die("<script>alert('login Gagal');
		window.location.href='staff-login-borang.php';</script>");
	}
}
else
{
	# data yang dihantar dari laman staff-login-borang.php kosong
	die("<script>alert('sila masukkan nokp dan katalaluan');
	window.location.href='staff-login-borang.php';</script>");
}
?>