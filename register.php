<?php 
	
	require_once ("config/db.php");

	if(isset($_SESSION['user_id'])){
		header("location:index.php");
	}

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!$name | !$email | !$password){
			echo "Field harus diisi!";
		} else {

			$user = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
			$user = mysqli_fetch_assoc();

			if($user){
				echo "User sudah pernah daftar";
			}else {
				mysqli_query($connection,"INSERT INTO users (name,email,password) 
												VALUES ('$name','$email','$password')");
				header("location:index.php");
			}

		}


	}






 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
</head>
<body>

	<h1>Register</h1>
	<hr />
	<form method="POST" action="#">

		<p>
			<label> Nama </label><br>
			<input type="text" name="name">
		</p>

		<p>
			<label> Email </label><br>
			<input type="text" name="email">
		</p>

		<p>
			<label> Password </label><br>
			<input type="password" name="password">
		</p>
		 
		 <input type="submit" value="Register">
	</form>
</body>
</html>