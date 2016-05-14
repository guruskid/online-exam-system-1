<h1 align='center'>ONLINE EXAMINATION SYSTEM</h1>
<marquee bgcolor="blue"><font color="white" size=5><b>Multiple Choice Questions on Programming Languages</b></font></marquee>
<?php
if(loggedin())
{
	?>
	<b><font size=4 color='red'>
	<?php
	echo "Welcome ".$username."[".$level_name."]!";
	$list=mysql_query("select `id` as ide from `users` where `username`='$username'");
	$li=mysql_fetch_object($list);
	$id=$li->ide;
	?>
	</font>
	</b>
	<div align='right'>
	<a href='index.php'><font size=5>Home</font></a>&nbsp;<font size=5>|</font>
	<a href='profile.php'><font size=5>My Profile</font></a>&nbsp;<font size=5>|</font>
	
	<?php
	if($user_level==3)
	{
		?>
		<a href='setexam.php'><font size=5>Set Exam</font></a>&nbsp;<font size=5>|</font>
		<a href='questions.php'><font size=5>Add Questions</font></a>&nbsp;<font size=5>|</font>
		<a href='results.php'><font size=5>Results</font></a>&nbsp;<font size=5>|</font>
		<?php
	}
	if($user_level==2)
	{
		?>
		<a href='startexam.php'><font size=5>Start Exam</font></a>&nbsp;<font size=5>|</font>
		<a href='myresult.php'><font size=5>My Result</font></a>&nbsp;<font size=5>|</font>
		
		<?php
	}
	?>
	<?php
		echo "<a href='pedit.php?id=$id'><font size=5>Edit Profile</font></a>&nbsp;<font size=5>|</font>";
	?>
	<a href='logout.php'><font size=5>Log Out</font></a>
	</div>
<?php
}
else
{
	?><div align='right'>
	<a href='index.php'><font size=5>Home</font></a>&nbsp;<font size=5>|</font>
	<a href='login.php'><font size=5>Log In</font></a>&nbsp;<font size=5>|</font>
	<a href='register.php'><font size=5>Register</font></a>
	
<?php	
}
?>
</div>