<?php
session_start();
if(isset($_SESSION['logined']))
{
header('location:view/view.php');
exit();
}
else
{
	if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username == "")
	{
		echo '<script>alert("please enter your personal information!!!");</script>';
	}
	else
	{
		if($username != "" and $password != "")
		{
			include('model/config.php');
			$sql = 'select * from users where username = ? AND password = ?';
			$query = $connect->prepare($sql);
			$query->bindValue(1,$username);
			$query->bindValue(2,$password);
			$query->execute();
			if($query->rowCount() == 1)
			{
			    
				$_SESSION['logined'] = $username;
				header('location:view/view.php');
				exit();
			}
			else
			{
				echo '<script>alert("Error in Signing");</script>';
			}
		}
		else
		{
			echo '<script>alert("Check Your Information!!");</script>';
		}
	}
}
}

?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="java/jquery.js" type="text/javascript"></script>
<title>laravel project</title>
</head>
<body>
	<div id="login">
		<form method="post" action="">
		<input type="text" name="username" placeholder="UserName" required>
		<input type="password" name="password" placeholder="Password" required>
		<div class="click">
			<input type="submit" name="submit" class='submit' value="Submit">
		</div>
			<div class="account"><a href="signup.php">SignUP</a></div>
		</form>
	</div>
</body>
</html>
