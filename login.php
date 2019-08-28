<?php 
	require_once("config/db.php");
	session_start();

	if(isset($_SESSION['user_id'])){
		header("location:index.php");
	}



	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = mysqli_query($connection, "SELECT * FROM users where email = '$email' and password ='$password'");
		$user = mysqli_fetch_assoc($user);

		if($user){
			$_SESSION['user_id'] = $user['id'];
			header("location:index.php");
		}else{
			echo "LOGIN GAGAL";
		}



	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>
	<hr />

	<form method="post" action="#">
		<p>
			<label>Email</label><br>
			<input type="text" name="email">
		</p>

		<p>
			<label>Password</label><br>
			<input type="password" name="password">
		</p>

		<p>
			<input type="submit" value="Login">
		</p>

	</form>

</body>
</html>