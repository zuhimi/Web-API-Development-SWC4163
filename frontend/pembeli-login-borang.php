<?php
# Memulakan fungsi session
session_start();

# memanggil fail header.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk pembeli -->
<h3>Login pembeli</h3>

<!-- borang daftar masuk (log in/sign in) pembeli-->
<form action='pembeli-login-proses.php' method='POST'>

    Nokp pembeli     <input type='text' name='nokp' required><br>
	Katalaluan       <input type='password' name='katalaluan' required><br>
	                 <input type='submit' value='Login'>
</form>

<?php include ('footer.php'); ?>