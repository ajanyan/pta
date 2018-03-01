<?php 

	require("connect.php");
	$regno=$_POST["regno"];
	$dob=$_POST["dob"];
	$sql1="SELECT * FROM student WHERE reg='$regno' AND dob='$dob'" ;
	$res=mysqli_query($db,$sql1);
	$row=mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)==1)
	{  
		//$sql2="SELECT Name FROM student WHERE regno='$regno'";
		echo json_encode(array('status'=>'success','name'=>$row["name"] ));
 
	}
	else
	{
		echo json_encode(array('status'=>'error'));
	}


 ?>
