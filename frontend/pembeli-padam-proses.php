<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data GET nokp pembeli
if(!empty($_GET))
{
   # memanggil fail connection.php
   include('connection.php');

   # arahan untuk memadam data pembeli berdasarkan nokp yang dihantar(GET)
   $arahan   =   "delete from pembeli where nokp_pembeli='".$_GET['nokp']."'";

   # melaksanakan arahan dan menguji proses padam rekod
   if(mysqli_query($condb,$arahan))
   {
       # jika data berjaya dipadam. papar popup dan buka fail senarai-pembeli.php
	   echo "<script>alert('Padam data Berjaya');
       window.location.href='senarai-pembeli.php';</script>";
   }
   else
   {
       # jika data gagal dipadam.papar popup dan buka fail senarai-pembeli.php 
	   echo "<script>alert('Padam data gagal');
	   window.location.href='senarai-pembeli.php';</script>";
   }
}
else
{
	# jika data GET tidak wujud (empty). papar popup dan buka fail senarai-pembeli.php 
	die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-pembeli.php';</script>");
}
?>