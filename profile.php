<html>
<head>
<title>Profile</title>
</head>
<body>
<?php include 'connect.php';  ?>
<?php include 'functions.php'; ?>
<?php include 'title_bar.php'; ?>
<?php
if(loggedin())
{
?>
<h3>Profile</h3>
<p>You are logged in as <b><?php echo $username ?></b>[<?php echo $level_name; ?>]</p>
<?php
if($user_level==1)
{
	echo "<a href='admin.php'> admin panel</a>";
}
?>
<?php
}
else
{
	echo "login necessary";
}
?>


</body>
</html>