<html>
<head><title>Results</title></head>
<body>
<?php
include 'connect.php';
include 'functions.php';
include 'title_bar.php';
if(loggedin())
{
	if($user_level==3)
	{
?>
<h2>Results:</h2>
<table>
<tr>
<td><b>Examination-Name</b>
</td>
<td><b>Examination-Date</b>
</td>
<td><b>Student-Name</b>
</td>
<td><b>Percentage</b>
</td>
<td><b>Result</b>
</td>
<?php
		$list=mysql_query("select * from `scores`");
		while($line=mysql_fetch_array($list))
		{
			$result=$line['result'];
			$per=$line['percentage'];
			$dt=$line['date_time'];
			$examname=$line['examname'];
			$user=$line['username'];

?>
<tr>
<td>
<?php
echo "$examname";
?>
</td>
<td>
<?php
echo "$dt";
?>
</td>
<td>
<?php
echo "$user";
?>
</td>
<td>
<?php
echo "$per";
?>
</td>
<td>
<?php
echo "$result";
?>
</td>
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