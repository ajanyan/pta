<?php 

	require("connect.php");
	$email=$_POST["email"];
	$sql="SELECT Name FROM user WHERE Email='$email'" ;
	$res=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)>=1)
	{  

 
	}
	else
	{
		
	}



 ?>
