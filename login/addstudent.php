<?php 
  session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["role"]))
  {
    header("location:index.php");
  }
  elseif ($_SESSION["role"]!="tutor")
  {
    header("location:logout.php");
  }


?>
<!DOCTYPE html>
<html>
<head>
	<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous">
  	</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" 
  	integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
  	crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 	integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
  	crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
  	 integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" 
  	 crossorigin="anonymous">
  </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>

	<title>Add Student</title>
</head>
<body background="image.jpg">

	<div class="container">
		<div class="row">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8"><br><br><br>
				<div class="jumbotron">
				<h1 align="center">Please Enter Student Details</h1><br>
				<br>
					<form action="addstudent.php" method="post">
						<div class="form-group">
					    	<label for="reg">Register Number</label>
					    	<input type="text" class="form-control" name="reg" id="reg" placeholder="Register Number" required="">
					  </div>
					  
					    <div class="form-group">
					      <label for="name">Name</label>
					      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
					    </div>
					    <div class="form-group">
					      <label for="dob">Date of Birth</label>
					      <input type="date" class="form-control" name="dob" id="dob" required="">
					    </div>
				
      
						
	
				
					  <button type="submit" class="btn btn-primary">Create</button>
					</form>


				</div>
			
			</div>
			<div class="col-lg-2">
			
			</div>
		</div>
	</div>


<?php 
    require("connect.php");

    if (isset($_POST['reg']) && isset($_POST['name']) && isset($_POST['dob'])) 
    {
        $reg=$_POST["reg"];

        $name=$_POST["name"];

        $dob=$_POST["dob"];

        $tutor=$_SESSION['name'];

        $sql="INSERT INTO student VALUES ('$reg','$name','$dob','$tutor')";
        if (mysqli_query($db,$sql)) 
        {
?>
        <script>
               swal(
                'Success',
                'Student created',
                'success'
                ).then(function() {
                window.location.href ='tutorprofile.php'; 
              });
        </script>
<?php
        }
        else
        {

echo mysqli_error($db);

            ?>

            <script>
                 swal(
                        'Oops...',
                        'User already exists!',
                        'error'
                     )
            </script>
            <?php
            
        }
    }


 ?>







 
</body>

</html>