<?php 

	$connection = mysqli_connect("localhost","root","","toko_db_online");

	if(!$connection){
		echo "Gagal konek ke server!";
	}
 ?>