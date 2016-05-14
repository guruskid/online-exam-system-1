<html>
<head>
<title>Admin</title>
</head>
<body>
<?php include 'connect.php';  ?>
<?php include 'functions.php'; ?>
<?php include 'title_bar.php'; ?>
<h3>Admin</h3>
<?php
if($user_level!=1)
{
	header('location: profile.php');
}
?>
<p>
<a href='admin.php?type=user'>User Settings</a>
<a href='admin.php?level=user_level'>Level Settings</a>
</p>
<p>
<?php
if(isset($_GET['type']) && !empty($_GET['type']))
{
	?>
	<table>
	<tr><td width='150px'>Users</td><td>Options</td></tr>
	<?php
	$list_query=mysql_query("select id,username,type from users");
	while($run_list=mysql_fetch_array($list_query))
	{
		$u_id=$run_list['id'];
		$u_username=$run_list['username'];
		$u_type=$run_list['type'];
	
	?>
<tr><td><?php echo $u_username ?></td><td>
<?php
if($u_type=='a')
{
	echo "<a href='option.php?u_id=$u_id&type=$u_type'>Deactivate</a>";
}
else
{
	echo "<a href='option.php?u_id=$u_id&type=$u_type'>Activate</a>";
}
?>
</td></tr>
<?php
}
?>
</table>
<?php
}
else if(isset($_GET['level']) && !empty($_GET['level']))
{
	?>
	<table>
	<tr><td width='150px'><b>Users</b></td><td><b>User Level</b></td></tr>
	<?php
	$list_query=mysql_query("select id,username,user_level from users");
	while($run_list=mysql_fetch_array($list_query))
	{
		$u_id=$run_list['id'];
		$u_username=$run_list['username'];
		$u_level=$run_list['user_level'];
		?>
<tr><td><?php echo $u_username ?></td><td>
<?php echo $u_level;  echo "<a href='level.php?u_id=$u_id&level=$u_level'>Edit Level</a>"; ?></td></tr>
<?php
	}
?>
</table>
<?php
}
else
{
	echo "select option above!";
}
?>
</p>
</body>
</html>