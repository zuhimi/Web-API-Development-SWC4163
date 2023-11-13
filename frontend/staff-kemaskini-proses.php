<?php
# memulakan fungsi session
session_start();

# memanggil fail guard-staff.php
include('guard-staff.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
	# memanggil fail connection.php
	include('connection.php');
	
	# pengesahan data (validation) nokp staff
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
	{
		die("<script>alert('Ralat Nokp');
		window.history.back();</script>");
	}
	
	# arahan SQL (query) untuk kemaskini maklumat staff
	$arahan           =   "update staff set
    nama_staff        =  '".$_POST['nama']."',
	nokp_staff        =   '".$_POST['nokp']."',
	katalaluan_staff  = '".$_POST['katalaluan']."'
	where             
	nokp_staff        =  '".$_GET['nokp_lama']."' ";
	
	# melaksana dan menyemak proses kemaskini
	if(mysqli_query($condb,$arahan))
	{
		# kemaskini berjaya
		echo "<script>alert('Kemaskini Berjaya');
		window.location.href='senarai-staff.php';</script>";
	}
	else
	{
		# kemaskini gagal
		echo "<script>alert('kemaskini Gagal');
		window.history.back();</script>";
	}
}
else
{
	# jika data GET tidak wujud. kembali ke fail senarai-staff.php
	die("<script>alert('sila lengkapkan data');
	window.location.href='senarai-staff.php';</script>");
}
?>