<html>
<?php

include 'connect.php';
include 'functions.php';
include 'title_bar.php';

if(loggedin())
{
	if($user_level==3)
	{
?>
<head><title>Set Exam</title></head>
<body>
<table>
<tr>
<td rowspan='1' colspan='2'></td>
<td colspan='3'>
<a href='setexam1.php'>Add New Exam</a>
</td>
</tr>
<tr>
<td>
<b>ID</b>
</td>
<td>
<b>Exam Name</b>
</td>
<td>
<b>Description</b>
</td>
<td colspan='2'>
</td>
</tr>
<?php
$exams=mysql_query("select * from `tests`");
while($line=mysql_fetch_array($exams))
		{
			$id=$line['id'];
			$examname=$line['name'];
			$desc=$line['description'];
?>
<tr>
<td>
<?php
echo "$id";
?>
</td>
<td>
<?php
echo "$examname";
?>
</td>
<td>
<?php
echo "$desc";
?>
</td>
<td><?php echo "<a href='edit.php?name=$examname&id=$id'>Edit</a>"; ?></td>
<td><?php echo "<a href='delete.php?name=$examname&id=$id'>Delete</a>"; ?></td>
</tr>
		
<?php
		}
?>
</table>
</body>
<?php
	}
	else
	{
		echo "no access";
	}
}
else
{
	echo "login neccessary";
}
?>
</html>