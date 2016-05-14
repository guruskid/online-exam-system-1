<html>
<head>
<title>Edit Profile</title>
</head>
<body>
<?php include 'connect.php';  ?>
<?php include 'functions.php'; ?>
<?php include 'title_bar.php'; ?>
<?php
if(loggedin())
{
	$id=$_GET['id'];
?>
<h3>Edit Profile Here:</h3>
<style>
form{margin:0 auto;
width:250px;
}
</style>
<div style='border:solid 1px #000000;'>
<form method='post'>
<?php
$list=mysql_query("select * from `users` where `id`='$id'");
$arr=mysql_fetch_array($list);
$email=$arr['email'];
$user=$arr['username'];
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$email=$_POST['email'];
	if(empty($username) or empty($password) or empty($email))
	{
		die("Empty Fields");
	}
	if(!ctype_alnum($username))
	{
		die("Username contains special characters! Only numbers & letters are permitted! <a href='register.php'>&larr; Back</a>");
	}
	if(strlen($username)>20)
	{
		die("Username must not contain more than 20 characters! <a href='register.php'>&larr; Back</a>");
	}
	mysql_query("update `users` set `password`='$password' where `id`='$id'");
	mysql_query("update `users` set `username`='$username' where `id`='$id'");
	mysql_query("update `scores` set `username`='$username' where `u_id`='$id'");
	header('location:index.php');
}
?>
Email-id: <br>
<input type='text' name='email' readonly='readonly' value='<?php echo $email; ?>' />
<br><br>
User Name: <br>
<input type='text' name='username' readonly='readonly' value='<?php echo $user; ?>' />
<br><br>
Password: <br>
<input type='password' name='password'/>
<br><br>
<input type='submit' name='submit' value='Edit'/>
<input type='button' onClick='history.back()' value='Cancel' />
</form>
</div>
<?php
}
else
{
	echo "login necessary";
}
?>
</body>
</html>