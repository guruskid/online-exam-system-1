<html>
<head><title>Set Exam</title></head>
<body>
<?php
include 'connect.php';
include 'functions.php';
include 'title_bar.php';
?>
<h2>Add New Exam</h2>
<?php
if(loggedin())
{
	if($user_level==3)
	{	
?>
<style>
form{margin:0 auto;
width:250px;
}
</style>
<div style='border:solid 1px #000000;'>
<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['exname'];
	$desc=$_POST['desc'];
	$num=$_POST['number'];
	$per=$_POST['percentage'];
	if(empty($name) or empty($desc) or empty($num) or empty($per))
	{
		die("Fields Empty! <br> All the fields should be filled");
	}
	$check=mysql_fetch_array(mysql_query("select * from `tests` where `name`='$name'"));
	$check1=mysql_fetch_array(mysql_query("select * from `tests` where `id`='$id'"));
	if($check!=0 and $check1!=0)
	{
		die("test already exists! enter another test name.");
	}
	mysql_query("INSERT INTO `tests`(`id`,`name`,`description`,`number`,`pass`) VALUES('$id','$name','$desc','$num','$per')") or die("cannot insert");
	echo "Exam sucessfully Added!";
}
?>
<br><br>
Examination Id:<br>
<input type='text' name='id' autofocus /><br><br>
Examination Name:<br>
<input type='text' name='exname' /><br><br>
Examination Description:<br>
<textarea rows='4' cols='50' name='desc' >
</textarea><br><br>
No. of Questions:<br>
<input type='text' name='number'/><br><br>
Pass Percentage: [eg: 30]<br>
<input type='text' name='percentage'/><br><br>
<input type='submit' name='submit' value='Submit'/>
<input type='reset' value='Reset'/>
<input type='button' name='cancel' onClick='history.back()' value='Cancel'/>
</form>
</div>
<?php
	}
	else
	{
		echo "no access";
	}
}
else
{
	echo "login necessary";
}
?>
</body>
</html>