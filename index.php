<html>
<head>
<title>Online Exam</title>
</head>
<body  bgcolor='lavender'>
<?php include 'connect.php';  ?>
<?php include 'functions.php'; ?>
<?php include 'title_bar.php'; ?>
<?php
if(!loggedin())
{
?>

<div align='center'>



<div>

<?php
}
error_reporting(0);
if($user_level==1)
{
?>
<div align='center'>
<font size=5 color='blue'>
<p> Welcome <b><?php echo $username ?></b>[<?php echo $level_name; ?>]</p></font>
<h2> Welcome to Online Examination </h2>

<h2>Online Examination System</h2>
</div>
<?php
}

else if($user_level==2)
{
?>
<div align='center'>
<font size=5 color='blue'>
<p> Welcome <b><?php echo $username ?></b>[<?php echo $level_name; ?>]</p></font>
<h2> Welcome to Online Examination </h2>

<h2>Online Examination System</h2>
</div>
<?php
}
else if($user_level==3)
{
?>

<div align='center'>
<p> Welcome <b><?php echo $username ?></b>[<?php echo $level_name; ?>]</p>
<h2> Welcome to Online Examination </h2>

<h2>Online Examination System</h2>
</div>

<?php
}
?>

</body>
</html>