<?PHP
if (isset($_POST['btn-upload']))
{
    # memanggil fail connection 
	include ('connection.php');

    # mengambil nama sementara fail 
	$namafailsementara=$_FILES["data_staff"]["tmp_name"];

    # mengambil nama fail 
	$namafail=$_FILES['data_staff']['name'];

    # mengambil jenis fail 
	$jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);
	
# menguji jenis fail dan sail fail
     if($_FILES["data_staff"]["size"]>0 AND $jenisfail=="txt")
	 {
		 # membuka fail yang diambil
		 $fail_data_staff=fopen($namafailsementara,"r");
		 
		 # mendapatkan data dari fail baris demi baris
		 while (!feof($fail_data_staff))
		 {
			 # mengambil data sebaris sahaja bg setiap pusingan
			 $ambilbarisdata = fgets($fail_data_staff);
			 
			 # memecahkan baris data mengikut tanda pipe
			 $pecahkanbaris = explode("|",$ambilbarisdata);
			 
			 # selepas pecahan tadi akan diumpukan kepada 3
			 list($nokp_staff,$nama_staff,$katalaluan_staff) = $pecahkanbaris;
			 
			 # arahan SQL untuk menyimpan data
			 $arahan_sql_simpan="insert into staff
			 (nokp_staff,nama_staff,katalaluan_staff) values
			 ('$nokp_staff','$nama_staff','$katalaluan_staff')";
			 
			 # memasukkan data kedalam jadual staff
			 $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);
			 echo"<script>alert('import fail Data Selesai');
			 window.location.href='senarai-staff.php';</script>";
		 }
	fclose($fail_data_staff);
        }
        else
        {
             echo "<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
        }
}
else
{
    die("<script>alert('Ralat! akses secara terus');
	window.location.href='staff-upload-borang.php';</script>");
}
?>