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
<head><title>Add Question</title></head>
<body>
<table>
<tr>
<td rowspan='1' colspan='2'></td>
<td colspan='3'>
<a href='addquestions.php'>Add New Question</a>
</td>
</tr>
<tr>
<td>
<b>Question ID</b>
</td>
<td>
<b>Exam Name</b>
</td>
<td>
<b>Question</b>
</td>
<td colspan='2'>
</td>
</tr>
<?php
$exams=mysql_query("select * from `questions`");
while($line=mysql_fetch_array($exams))
		{
			$q_id=$line['id'];
			$id=$line['ques_id'];
			$examname=$line['examname'];
			$question=$line['question'];
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
echo "$question";
?>
</td>
<td><?php echo "<a href='qedit.php?id=$q_id'>Edit</a>"; ?></td>
<td><?php echo "<a href='qdelete.php?id=$q_id'>Delete</a>"; ?></td>
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