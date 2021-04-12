<html>
		<head>
			<style type="text/css">
				form
				{
					border:1px solid gray;
					width: 18%;
					height: 200px;
					margin:5%;
					margin-left: 40%;
					border-radius: 0px 50px 0px 25px;
					border-left-width:3px;
					border-right-width:3px;
					background-color: #FCFCDC;
				}
				.input_group label
				{
					margin-left:30%;
				}
				.input_group input
				{
					margin:9px;
					margin-left: 15%;
					border-top:1px;
					background-color: lightgray;
					color:black;
					text-align:center;
				}
				.btn
				{
					margin:2px;
					margin-left: 5px;
					border-top:1px;
				}
			</style>
		</head>
	<body>
	<form method=post action=database_insertion_deletion.php>
	<div class="input_group">
		<label>Enter rollno</label>
		<input type=text name=x />
	</div>
	<div class="input_group">
		<label>Enter name</label>
		<input type=text name=y />
	</div>
	<div class="input_group">
		<label>Enter age</label>
		<input type=text name=z />
	</div>
		<input type="submit" value="submit" name="submit" class="btn" />
		<input type="submit"  value="delete" name="delete" class="btn" />
		<input type="submit" value="show" name="show" class="btn" />
		<input type="reset" value="clear" class="btn" />
		<br>
	</from>
	<br>
	<br>
	</body>
</html>
<?php

	$db=mysqli_connect("localhost","root","","bcahit");
	# insert data in database
	if(isset($_POST['submit']))
	{
		$rollno=$_POST['x'];
		$sname=$_POST['y'];
		$age=$_POST['z'];
		
		$insert="insert into student values($rollno,'$sname',$age)";
		$check_insert=mysqli_query($db,$insert);
		if($check_insert)
		{
			echo "record inserted<br>";
		}
		else
		{
			echo"record not inserted<br>";
		}
	}

	#delete data from database
	if(isset($_POST['delete']))
	{
		$rollno=$_POST['x'];
		$delete="delete from student where rollno=$rollno";
		$delete_query=mysqli_query($db,$delete);
		if($delete_query)
		{
			echo "record deleted<br>";
		}
		else
		{
			echo "record not deleted<br>";
		}
	}

	#show database
	if(isset($_POST['show']))
	{
		$show="select * from student";
		$show_query=mysqli_query($db,$show);
		echo "<center><h1 style=color:blue>DataBase</h1></center>";
		echo "<center><table border='5' cellpadding='10' cellspacing='10' bordercolor='black' bgcolor='#FCFCDC'>";
		echo "<tr><th>rollno</th><th>name</th><th>age</th></tr>";
		while($d=mysqli_fetch_array($show_query))
		{
			$_SESSION['name']='name';
			echo "<tr><td>$d[rollno]</td><td>$d[name]</td><td>$d[age]</td></tr>";
		}
	echo "</table></center>";
	}
?>