<?php
# memulakan fungsi session
session_start();

# Memanggil fail header.php
include('header.php');

?>

<!-- Tajuk antaramuka-->
<h3> Pendaftaran pembeli Baru </h3>

<!-- Borang Pendaftaran pembeli Baru-->
<form action = 'pembeli-signup-proses.php' method = 'POST'>

    Nama pembeli   <input type ='text' name ='nama' required> <br>
	NoKp pembeli   <input type ='text' name ='nokp' required> <br>
	Katalaluan      <input type ='password' name ='katalaluan' required> <br>
				   <input type ='submit' value='Daftar'>
</form>
<?php include ('footer.php');?>