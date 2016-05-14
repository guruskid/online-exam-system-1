<html>
<head>
<title>Add Questions</title>
</head>
<body bgcolor='lightgreen'>
<?php

include 'connect.php';
include 'functions.php';
include 'title_bar.php';

if(loggedin())
{
	if($user_level==3)
	{
?>
<h1> ADD QUESTIONS:</h1>
<form method='post'>
<?php
if(isset($_POST['submit']))
{
	$type=$_POST['exam'];
	$count=mysql_query("select count(`question`) as count from `questions` where `examname`='$type'");
	$c=mysql_fetch_object($count);
	$co=$c->count;
	$exam_id=mysql_query("select `id` as e_id from `tests` where `name`='$type'");
	$eid=mysql_fetch_object($exam_id);
	$e=$eid->e_id;
	if($co<10)
	{
	$id=$_POST['id'];
	$question=$_POST['question'];
	$one=$_POST['one'];
	$two=$_POST['two'];
	$three=$_POST['three'];
	$four=$_POST['four'];
	$correct=$_POST['correct'];
	if(empty($question) or empty($one) or empty($three) or empty($four) or empty($correct))
	{
		die("Fields Empty! <br> All the fields should be filled");
	}
	$check=mysql_fetch_array(mysql_query("select * from `questions` where `question`='$question'"));
	if($check!=0)
	{
		die("question already exists! enter another question.");
	}
	mysql_query("INSERT INTO `questions`(`ques_id`,`question`,`one`,`two`,`three`,`four`,`correct`,`examname`,`exam_id`) VALUES('$id','$question','$one','$two','$three','$four','$correct','$type','$e')") or die("cannot insert");
	echo "Question added successfully!";
	$count=mysql_query("select count(`question`) as count from `questions` where `examname`='$type'");
	$c=mysql_fetch_object($count);
	$co=$c->count;
	echo " $co questions available in this test";
	}
	else
	{
		echo "No. of Questions limit exceeded!";
	}
}
$exams=mysql_query("select * from `tests`");
?>
<div style='width:80%; padding:  20px 15px 20px; border: 1px solid #e3e3e3; background-color: #fff; color: #000;'>
<b>Select Exam Type:</b>
<select name='exam' autofocus >
<?php
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
<b>Question Id:</b><br>
<input type='text' name='id'  /><br><br>
<b>Enter the question here:</b><br>
<textarea rows='4' cols='50' name='question' >
</textarea><br><br>
<b>Add options and correct answer here:</b><br><br>
<table>
<tr><td>
First Option:</td><td><input type='text' name='one'/></td><td>
<input type='radio' name='correct' value='1'/>Correct answer</td></tr><tr><td>
Second Option:</td><td><input type='text' name='two'/></td><td>
<input type='radio' name='correct' value='2'/>Correct answer</td></tr><tr><td>
Third Option:</td><td><input type='text' name='three'/></td><td>
<input type='radio' name='correct' value='3'/>Correct answer</td></tr><tr><td>
Fourth Option:</td><td><input type='text' name='four'/></td><td>
<input type='radio' name='correct' value='4'/>Correct answer</td></tr>
</table>
<br>
<input type='submit' name='submit' value='Add Question'/>
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