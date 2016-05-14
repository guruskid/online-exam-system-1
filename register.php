<html>
<head>
<title>Register</title>
</head>
<body>
<?php include 'connect.php';  ?>
<?php include 'functions.php'; ?>
<?php include 'title_bar.php'; ?>

<h3>Register Here:</h3>

<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$email=$_POST['email'];
	if(empty($username) or empty($password) or empty($email))
	{
		die("Empty Fields");
	}
	$check=mysql_fetch_array(mysql_query("select * from `users` where `username`='$username'"));
	if($check!='0')
	{
		die("That username already exists! Try <i>$username".rand(1,50)."</i>instead!<a href='register.php'>&larr; Back</a>");
	}
	$check=mysql_fetch_array(mysql_query("select * from `users` where `email`='$email'"));
	if($check!='0')
	{
		die("That email already exists!<a href='register.php'>&larr; Back</a>");
	}
	if(!ctype_alnum($username))
	{
		die("Username contains special characters! Only numbers & letters are permitted! <a href='register.php'>&larr; Back</a>");
	}
	if(strlen($username)>20)
	{
		die("Username must not contain more than 20 characters! <a href='register.php'>&larr; Back</a>");
	}
	mysql_query("INSERT INTO `users`(`id`,`username`,`password`,`email`,`user_level`,`type`) VALUES('','$username','$password','$email','2','a')") or die("cannat insert");
	echo "successfully registered!";
}
?>
Email-id: <br>
<input type='text' name='email' autofocus />
<br><br>
User Name: <br>
<input type='text' name='username' />
<br><br>
Password: <br>
<input type='password' name='password'/>
<br><br>
<input type='submit' name='submit' value='Register'/>
</form>
</body>
</html>