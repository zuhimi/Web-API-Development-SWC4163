<!DOCTYPE html>
<html
    <head>
	    <title>Sistem Pemilihan ImWatch Store</title>
		<style>
		    +{
				margin:0;
				padding:0;
			}

            body{
				background-color : #0EC7AE;
			}
			
			header{
				background-color:#0EC7AE;
				color : black;
				text-align:center;
			}
	        footer{
				background-color: 0EC7AE;
				color:blue;
				text-align:center;
				padding:30px;
				align-content:flex-end;
			}
			
			article{
				padding:15px;
				test-align:center;
			}
			
			h3{
				color:blue;
			}
			
			table{
			     background-color:lightblue;
				 width : 100%;
				 border-collaps:collaps;
				 border : 3px groove blue;
			}
			
			td{
				padding:7px
			}
			tr:hover{
				background-color:blue;
				color:white;
			}
			
			nav{
				background-color:lightblue;
				padding:5px;
			}
			
			a{
				background-color:blue;
				color:white;
			    padding:1px 1px;
				text-decoration:none;
				display:inline-block;
				border-radius: 8px;
			}
			a:hover{
				background-color:#0EC7AE;
			}
			
			input,
			select,
			button{
				padding : 6px;
				margin-top:8px;
				border-radidus: 8px;
			}
			
			input[type=submit]{
			background-color: blue;
			color:white;
			}
			
			input[type=submit]:hover{
			background-color: #0EC7AE;
			color:white;
			}
			
			.respon{
				width:100%;
				height:auto;
			}
		</style>    
    </head>
	<body>
		
		
		
		
		



<?PHP   date_default_timezone_set("Asia/Kuala_Lumpur");      ?>		
<header>		
<!-- tajuk sistem. Akan dipaparkan disebelah atas -->
<h1>Im watchStore</h1>
<p>Cari Jam Murah-Murah? Im Watchstore solusinya<p>

<img class='respon'src='img/jam2.png'>

</header>



<nav>
<!-- Bahagian Menu Asas.
     Menu terbahagi kepada 3 jenis iaitu
	 1. Menu staff dimana staff dapat akses semua perkara
	 2. Menu pembeli dimana pembeli hanya boleh memilih barangan dan membeli tetapi pembeli perlu login dahulu.
	 3. Menu di laman utama - bagi pelawat yang tidak login pelawat tidak dapat memilih barangan
-->
<?PHP
# Menu staff : dipaparkan sekiranya staff telah login
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "staff")
{
    echo "
	| <a href='index.php'>Laman Utama</a>
	| <a href='senarai-pembeli.php'>Senarai pembeli</a>
	| <a href='senarai-staff.php'>Senarai staff</a>
	| <a href='senarai-barang.php'>Senarai barang</a>
	| <a href='senarai-jualan.php'>Senarai jualan</a>
	| <a href='logout.php'>Logout</a>
	| <hr>";
}
# Menu pembeli : dipaparkan sekiranya pembeli telah login
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli")
{
	echo "
	| <a href='index.php'>Laman Utama</a>
	| <a href='pembeli-pilih.php'>Perbandingan barang</a>
	| <a href='pembeli-sejarah.php'>Pembelian Terdahulu</a>
	| <a href='logout.php'>Logout</a>
	| <hr> ";
	
} else {
	
	#menu Laman Utama : dipaparkan sekiranya staff atau pembeli tidak login
	echo "
	| <a href='index.php'>Laman Utama</a>
    | <a href='pembeli-signup-borang.php'>Pengguna Baru</a>
	| <a href='pembeli-login-borang.php'>Login Pengguna</a>
	| <a href='staff-login-borang.php'>Login Staff</a>
	<hr>";
}
?>

</nav>
<article>

