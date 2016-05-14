<html>
<head>
<title>Exam</title>
</head>
<body bgcolor='lightblue'>
<?php
include 'connect.php';
include 'functions.php';
extract($_POST);
extract($_GET);
extract($_SESSION);
error_reporting(0);
include 'title_bar.php';

if(loggedin())
{
	if($user_level==2)
	{
		$pid=$_GET['id'];
		$ptest=$_GET['test'];
?>
<h1>QUIZ</h1>
<form method='post'>
<?php
	
	$list_query=mysql_query("select * from `questions` where `exam_id`='$pid'");
	if(!isset($_SESSION['qn']))
	{
	$_SESSION['qn']=0;
	$_SESSION['trueans']=0;
	
	}
	else
	{
		if($submit=='Next' && isset($correct))
		{
			mysql_data_seek($list_query,$_SESSION['qn']);
			$run_list=mysql_fetch_array($list_query);
			$id=$run_list['ques_id'];
			$ques=$run_list['question'];
			$c=$run_list['correct'];
			if($correct==$c)
			{
				$_SESSION['trueans']=$_SESSION['trueans']+1;
			}
			$_SESSION['qn']=$_SESSION['qn']+1;
		}
		else if($submit=='Submit' && isset($correct))
		{
			mysql_data_seek($list_query,$_SESSION['qn']);
			$run_list=mysql_fetch_array($list_query);
			$id=$run_list['ques_id'];
			$ques=$run_list['question'];
			$c=$run_list['correct'];
			if($correct==$c)
			{
				$_SESSION['trueans']=$_SESSION['trueans']+1;
			}
			$_SESSION['qn']=$_SESSION['qn']+1;
			$points=$_SESSION['trueans'];
			$w=$_SESSION['qn']-$_SESSION['trueans'];
			$per=(($_SESSION['trueans'])/($_SESSION['qn']))*100;
			$p=mysql_query("select `percentage` as perc from `tests` where `id`='$pid'");
			$pe=mysql_fetch_object($p);
			$pt=$pe->perc;
			date_default_timezone_set('Asia/India');
			$time=date("Y-m-d H:i:s");
			echo "<Table align=center><tr class=tot><td>Total Question<td>".$_SESSION['qn'];
			echo "<tr class=pass><td>Result<td>";
			if($per<$pt)
			{
				$result='fail';
				echo "fail";
			}
			else
			{
				$result='pass';
				echo "pass";
			}
			mysql_query("insert into `scores`(`username`,`points`,`percentage`,`date_time`,`examname`,`exam_id`,`result`) values('$username','$points','$per','$time','$ptest','$pid','$result')");
			echo "<tr class=tans><td>True Answer<td>".$_SESSION['trueans'];
			echo "<tr class=fans><td>Wrong Answer<td> ". $w;
			echo "<tr class=per><td>Percentage<td>".$per."%";
			echo "<tr class=time><td>Time<td>".$time;
			echo "<tr class=img><td><img src='example.php' width=100 height=100></img><td>";
			echo "</table>";
			?>
			<div align='center'>
			<b>Go back to <a href='index.php'>Main</a> page</b>
			</div>
			<?php
			unset($_SESSION['qn']);
			unset($_SESSION['trueans']);
			exit;
		}
	}
	$list_query=mysql_query("select * from `questions` where `exam_id`='$pid'");
	mysql_data_seek($list_query,$_SESSION['qn']);
	$run_list=mysql_fetch_array($list_query);
		?>
		
<div style='width:80%; padding:  20px 15px 20px; border: 1px solid #e3e3e3; background-color: #fff; color: #000;'>
<b>Exam Name:</b>
<?php echo $run_list[8]; ?>
<br><br>
<b>Question No.</b>
<?php echo $run_list[1]; ?>
<br><br>
<b>Question:</b>&nbsp;
<label>
<?php echo $run_list[2]; ?><br><br>
<b>Options:</b>
<br>
</label>
<input type='radio' name='correct' value=1 />
<label>
<?php echo $run_list[3]; ?>
</label><br>
<input type='radio' name='correct' value=2 />
<label>
<?php echo $run_list[4]; ?>
</label><br>
<input type='radio' name='correct' value=3 />
<label>
<?php echo $run_list[5]; ?>
</label><br>
<input type='radio' name='correct' value=4 />
<label>
<?php echo $run_list[6]; ?>
</label><br>

</div>
<?php
if($_SESSION['qn']<mysql_num_rows($list_query)-1)
{
?>
<input type='submit' name='submit' value='Next' />
<?php
}
else
{
?>
<input type='submit' name='submit' value='Submit'/>
<?php
}
?>
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
	echo "login neccessary";
}
?>
</body>
</html>