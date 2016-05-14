<html>
<head><title>Set Exam</title></head>
<body>
<?php
include 'connect.php';
include 'functions.php';
include 'title_bar.php';

?>
<h2>Edit Exam</h2>
<?php
if(loggedin())
{
	if($user_level==3)
	{
		$id=$_GET['id'];
		$name=$_GET['name'];
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
	$exams=mysql_query("select * from `questions` where `exam_id`='$id'");
	while($line=mysql_fetch_array($exams))
	{
		mysql_query("update `questions` set `examname`='$name' where `exam_id`='$id'");
	}
	mysql_query("update `tests` set `name`='$name' where `id`='$id'");
	mysql_query("update `tests` set `description`='$desc' where `id`='$id'");
	mysql_query("update `tests` set `number`='$num' where `id`='$id'");
	mysql_query("update `tests` set `percentage`='$per' where `id`='$id'");
	echo "Exam Updated Successfully!";
}
$examname=mysql_query("select * from `tests` where `id`='$id'");
$exam=mysql_fetch_array($examname);
$name=$exam['name'];
$d=$exam['description'];
$n=$exam['number'];
$p=$exam['pass'];
?>
<br><br>
Examination Id:<br>
<input type='text' name='id' value='<?php echo $id ?>' readonly='readonly' /><br><br>
Examination Name:<br>
<input type='text' name='exname' value='<?php echo $name ?>' /><br><br>
Examination Description:<br>
<textarea rows='4' cols='50' name='desc' ><?php echo $d ?>
</textarea><br><br>
No. of Questions:<br>
<input type='text' name='number' value='<?php echo $n ?>' /><br><br>
Pass Percentage: [eg: 30]<br>
<input type='text' name='percentage'value='<?php echo $p ?>'  /><br><br>
<input type='submit' name='submit' value='Edit'/>
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