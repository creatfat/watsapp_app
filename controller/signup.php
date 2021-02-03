<?php
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	if($username == "")
	{
		echo '<script>alert("please enter your personal information!!!");</script>';
	}
	else
	{
		if($password == $confirm)
		{
			include('model/config.php');
			$sql = 'INSERT INTO `users`(`id`, `username`, `password`) VALUES (null,?,?)';
			$query = $connect->prepare($sql);
			$query->bindValue(1,$username);
			$query->bindValue(2,$password);
			if($query->execute())
			{
				echo '<script>alert("Your Account Successfuly Registred");</script>';
				header('location:login.php');
				exit();
			}
			else
			{
				echo '<script>alert("Error in Signuping");</script>';
			}
		}
		else
		{
			echo '<script>alert("check your password!!!");</script>';
		}
	}
}
?>
<style>
	#signup{
	width: 35%;
	height: 450px;
	background-color: #737373;
	border-radius: 10px;
	margin: 10% auto;
	text-align: center;
}
	#signup input{
		margin-top: 50px;
	}
	#signup input[type=text]
{
	width: 70%;
	height: 40px;
	border-radius: 10px;
	border: none;
	text-align: center;
	font-family: 'tahoma';
	font-size: 18px;
}
	#signup input[type=password]
{
	width: 70%;
	height: 40px;
	border-radius: 10px;
	border: none;
	text-align: center;
	font-family: 'tahoma';
	font-size: 18px;
}
	#signup .click{
	width: 100%;
	height: 50px;
	margin-top: 50px;
}
	#signup .click input[type=submit]
{
	width: 40%;
	height: 100%;
	border-radius: 10px;
	border: none;
	border: 2px solid #4d194d;
	cursor: pointer;

}
	#signup .account{
	width: 100px;
	float: right;
	position: relative;
	right: 5px;
	top: 60px;
}
#signup .account a{
	text-decoration: none;
	color: #0052cc;
	
}
</style>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="java/jquery.js" type="text/javascript"></script>
<title>laravel project</title>
</head>
<body>
	<div id="signup">
		<form method="post" action="">
		<input type="text" name="username" placeholder="UserName" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="password" name="confirm" placeholder="Confirm Password" required>
		<div class="click">
			<input type="submit" name="submit" class='submit' value="Submit">
		</div>
			<div class="account"><a href="login.php">Login</a></div>
		</form>
	</div>
</body>
</html>