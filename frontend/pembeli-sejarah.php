<?php
# Memulakan fungsi SESSION
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');

?>
<hr>
<h3>Sejarah Pembelian </h3>
<?php
       # arahan untuk mencari senarai barangan yang pernah dibeli sebelum ini
	   $sql_pilihan = "
	   SELECT * FROM pembeli, barang, jenama, jualan
	   WHERE
	       pembeli.nokp_pembeli     =  jualan.nokp_pembeli
	    AND barang.kod_barang       =  jualan.kod_barang
		AND barang.kod_jenama       =  jenama.kod_jenama
		AND pembeli.nokp_pembeli     =  '".$_SESSION['nokp']."'
		ORDER BY jualan.tarikh_beli DESC
		";
		
		# melaksanakan arahan mencari
		$laksana_pilihan = mysqli_query($condb,$sql_pilihan);
		
		# jika bilangan data yang ditemui = 0
		if(mysqli_num_rows($laksana_pilihan)==0){
			echo "Tiada Sejarah Pembelian";
		}
		else{
			#sebaliknya jika terdapat data yang ditemui. papar senarai barangan
			echo"<hr>
			<button onclick=\"window.print()\">Cetak</button>
			<table border='1' id='saiz'>";
			while($n=mysqli_fetch_array($laksana_pilihan)){
				
				
				echo "  <tr>
				<td><img width='50%' src='img/".$n['gambar']."'></td>
				<td>
				
				<b> Jenama    :      ".$n['jenama_barang']." </b><br>
				Model Jam   :      ".$n['nama_barang']." <br>
				Ciri          :      ".$n['ciri']." <br>
				Harga         : RM   ".$n['harga']." <br>
		    Tarikh Beli    :     ".date("d-m-Y",strtotime($n['tarikh_beli']))."<br>
			   </td>
			   </tr>";
			}
			echo"</table>";
		}
?>
<?php include ('footer.php'); ?>