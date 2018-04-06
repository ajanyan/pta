<?php 
	session_start();
	
	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) && !isset($_SESSION["role"]))
	{
		header("location:index.php");
	}
		$role=$_SESSION["role"];
		if( $role=="admin" )
		{
			header('Location:adminprofile.php');
		}
		elseif ($role=="hod") 
		{
			header('Location:hodprofile.php');
		}
		else
		{
			header('Location:tutorprofile.php');
		}
 ?>