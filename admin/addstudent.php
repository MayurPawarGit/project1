<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		echo ""
			;
	}
	else
	{
			header ('location:../login.php');
	}
	
?>

<?php

include('header.php');
include('titlehead.php');
?>


<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="5" style="width:70%; margin-top:40px; border-color:black;">

	<tr border="5" border-color:black;>
		<th>Roll No</th>
		<td><input type="text" name="rollno" placeholder="Enter Rollno" required></td>
	</tr>

		<tr>
		<th>Full Name</th>
		<td><input type="text" name="name" placeholder="Enter Full name" required></td>
	</tr>

	<tr>
		<th>City</th>
		<td><input type="text" name="city" placeholder="Enter City" required></td>
	</tr>

	<tr>
		<th>Parent Contact No</th>
		<td><input type="text" name="pcon" placeholder="Enter the Contact Number of Parent" required></td>
	</tr>

	<tr>
		<th>Standard</th> 
		<td> <input type="number" name="std" placeholder="Enter Standard" required></td>
	</tr>


	<tr>
		<th>Image</th>
		<td><input type="file" name="simg" required></td>
	</tr>
	
		<tr>
			<td colspan="2" align="center">
			<input type="submit" name="submit" value="Submit">
			</td>
		</tr>

	</table>
</form>
</body>
</html>




<?php

  $msg = "";

 
  if (isset($_POST['submit'])) {

	  $target = "../dataimg/".basename($_FILES['simg']['name']);

  	$db = mysqli_connect("localhost", "root", "", "sms");
		$rolno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		$image = $_FILES['simg']['name'];

  
  	
  	$sql = "INSERT INTO student ( rollno, name, city, pcont, standard,image) VALUES ('$rolno','$name','$city','$pcon','$std', '$image')";
  	
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['simg']['tmp_name'], $target)) 
		{
  				?>
				<script>
					alert('Data inserted Successfully');
				</script>	

				<?php
  		}
		else
		{
  			?>
				<script>
					alert('Data Not Inserted..!!');
				</script>	

				<?php
  		}
  }
 
?>

































<!--

<?php
if(isset($_POST['submit']))
{

		include('../dbcon.php');
		$rolno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		$imagename=$_FILES["simg"]["name"];
		$tempname=$_FILES["simg"]["tmp_name"];

		move_uploaded_file($tempname,"../dataimg/$imagename");
		
		$qry="INSERT INTO `student`( `rollno`, `name`, `city`, `pcont`, `standard`,'image') VALUES ('$rolno','$name','$city','$pcon','$std','$imagename')";

		//$qry="INSERT INTO `student`( 'image') VALUES ('$imagename')";
		
		$run= mysqli_query($con,$qry);

		if($run==true)
	{
				?>
				<script>
					alert('Data inserted Successfully');
				</script>	

				<?php
	}
		

}

?>


-->

<!--

<?php
include('../dbcon.php');
$conn=mysqli_connect("localhost","root","","sms");

if($conn)
{
	echo "connected";
}

if(isset($_POST['submit']))
{
	$rolno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
	$filename=$_FILES["simg"]["name"];
	$filetmpname=$_FILES["simg"]["tmp_name"];
	print_r($_FILES["simg"]);
	$folder= "img/".$filename;
	move_uploaded_file($filetmpname,$folder);

	//$sql="INSERT INTO `student` VALUES ('$rolno','$name','$city','$pcon','$std','$folder')";
	$sql="INSERT INTO `student`( `rollno`, `name`, `city`, `pcont`, `standard`,'image') VALUES ('$rolno','$name','$city','$pcon','$std','$folder')";
	//$sql->execute();
	//echo $folder;
	$qry=mysqli_query($conn,$sql);
	if($qry)
	{
		echo "</br>image uploaded ";
	}
	else
	{
			echo "Data Not Inserted";
	}

}

?>
-->
