<?php


  	$db = mysqli_connect("localhost", "root", "", "sms");
		
		$id=$_REQUEST['sid'];
  
  	
  	$sql = "delete from student where id='$id';";
  	
  	$run=mysqli_query($db, $sql);

  	if ($run==true) 
		{
  				?>
				<script>
					alert('Data Deleted Successfully');
					window.open('deletestudent.php','_self');
				</script>	

				<?php
  		}
		else
		{
  			?>
				<script>
					alert('Data Not Deleted..!!');
				</script>	

				<?php
  		}
  

?>