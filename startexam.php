<html>
<head><title>Select Exam</title></head>
<body>
<?php

include 'connect.php';
include 'functions.php';
include 'title_bar.php';
error_reporting(0);
if(loggedin())
{
	if($user_level==2)
	{
?>
<br><br>
<div align='center' style='border:solid 1px #000000;'>
<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$exam=$_POST['exam'];
	$exam_id=mysql_query("select `id` as id from `tests` where `name`='$exam'");
	$examid=mysql_fetch_object($exam_id);
	$eid=$examid->id;
	header("location:exam.php?test=".urlencode($exam)."&id=".urlencode($eid));
}
?>
<b>Select Exam Type:</b><br><br>
<select name='exam' autofocus >
<?php
		$exams=mysql_query("select * from `tests`");
		while($line=mysql_fetch_array($exams))
		{
			?>
			<option>
			
			<?php
			$examname=$line['name'];
			echo "$examname";
			?>
			
			</option>
			<?php
		}
?>
</select><br><br>
<input type='submit' name='submit' value='Start Exam' />
<input type='button' value='Cancel' onClick='history.back()' />
</div>
</form>
<?php
	}
	else
	{
		echo "no access!";
	}
}
else
{
	echo "login necessary";
}
?>
</body>
</html>