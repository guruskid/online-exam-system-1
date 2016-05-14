<html>
<head>
<title>Edit Questions</title>
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
		$q_id=$_GET['id'];
?>
<h1> EDIT QUESTIONS:</h1>
<form method='post'>
<?php
if(isset($_POST['submit']))
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
	mysql_query("update `questions` set `question`='$question' where `id`='$q_id'");
	mysql_query("update `questions` set `one`='$one' where `id`='$q_id'");
	mysql_query("update `questions` set `two`='$two' where `id`='$q_id'");
	mysql_query("update `questions` set `three`='$three' where `id`='$q_id'");
	mysql_query("update `questions` set `four`='$four' where `id`='$q_id'");
	mysql_query("update `questions` set `correct`='$correct' where `id`='$q_id'");
	echo "Question edited successfully!";
	header('location:questions.php');
}

$questions=mysql_query("select * from `questions` where `id`='$q_id'");
$question=mysql_fetch_array($questions);
$qid=$question['ques_id'];
$name=$question['question'];
$on=$question['one'];
$tw=$question['two'];
$thre=$question['three'];
$fou=$question['four'];
$correc=$question['correct'];
?>
<div style='width:80%; padding:  20px 15px 20px; border: 1px solid #e3e3e3; background-color: #fff; color: #000;'>
<b>Question Id:</b><br>
<input type='text' name='id' readonly='readonly' value='<?php echo $qid; ?>' /><br><br>
<b>Enter the question here:</b><br>
<textarea rows='4' cols='50' name='question' ><?php echo $name ?>
</textarea><br><br>
<b>Add options and correct answer here:</b><br><br>
<table>
<tr><td>
First Option:</td><td><input type='text' name='one' value='<?php echo $on; ?>' /></td><td>
<input type='radio' name='correct' value='1' <?php if($correc=1){echo "checked";}?> />Correct answer</td></tr><tr><td>
Second Option:</td><td><input type='text' name='two' value='<?php echo $tw; ?>' /></td><td>
<input type='radio' name='correct' value='2' <?php if($correc=2){echo "checked";}?> />Correct answer</td></tr><tr><td>
Third Option:</td><td><input type='text' name='three' value='<?php echo $thre; ?>' /></td><td>
<input type='radio' name='correct' value='3' <?php if($correc=3){echo "checked";}?> />Correct answer</td></tr><tr><td>
Fourth Option:</td><td><input type='text' name='four' value='<?php echo $fou; ?>' /></td><td>
<input type='radio' name='correct' value='4' <?php if($correc=4){echo "checked";}?> />Correct answer</td></tr>
</table>
<br>
<input type='submit' name='submit' value='Edit Question'/>
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