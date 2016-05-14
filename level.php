<html>
<head>
<title>Level</title>
</head>
<body>
<?php
include 'connect.php';
include 'functions.php';

$u_id=$_GET['u_id'];
$u_level=$_GET['level'];


if($u_level==1)
{
	echo "Level cannot be changed! Because u are the admin!";
}
else if($u_level==2)
{
	?>
	<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$two=$_POST['two'];
	if(empty($two))
	{
		die("Empty Fields");
	}
	if($two==2 or $two==3)
	{
		mysql_query("update users set user_level=$two where id='$u_id'");
		echo "Level changed successfully!";
		header('location: admin.php?level=user_level');
	}
	die("Invalid levels: Levels[2,3]");
}
?>
	Level:
	<input type='text' name='two'/>
	<input type='submit' name='submit' value='Submit'/>
	</form>
	<?php
}
else if($u_level==3)
{
		?>
	<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$two=$_POST['two'];
	if(empty($two))
	{
		die("Empty Fields");
	}
	if($two==2 || $two==3)
	{
		mysql_query("update users set user_level=$two where id='$u_id'");
		echo "Level changed successfully!";
		header('location: admin.php?level=user_level');
	}
	die("Invalid levels: Levels[2,3]");
}
?>
	Level:
	<input type='text' name='two'/>
	<input type='submit' name='submit' value='Submit'/>
	</form>
	<?php
}

?>
</body>
</html>