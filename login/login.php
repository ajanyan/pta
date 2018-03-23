<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
<body>


<?php
		
	if(!isset($_POST["password"] ) && !isset($_POST["email"]))
	{
		header("location:index.php");
	}


	require("connect.php");
	

	$user=$_POST["email"];
	$pass=$_POST["pass"];

	$sql="SELECT admname,password,role FROM admin WHERE email='$user' AND password='$pass' ";
	$res=mysqli_query($db,$sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc( $res );
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['name']=$row['admname'];
		$_SESSION['role']=$row['role'];

		
		if( $row['role']=="admin" )
		{
			header('Location:adminprofile.php');
		}
		elseif ($row['role']=="hod") 
		{
			header('Location:hodprofile.php');
		}
		else
		{
			header('Location:tutorprofile.php');
		}

		
	}
	else
	{
		echo"<script>
		swal(
  			'Oops...',
  			'Usename and password does not match!',
  			'error'
			).then(function() {
			window.location.href ='index.php';
			});
		</script>";

	}

	?>



	</body>
</html>