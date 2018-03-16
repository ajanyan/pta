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

	<title>Create</title>
</head>
<body background="image.jpg">

	<div class="container">
		<div class="row">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8"><br><br><br>
				<div class="jumbotron">
				<h1 align="center">Please Enter HOD Details</h1><br>
				<br>
					<form action="createhod.php" method="post">
						<div class="form-group">
					    	<label for="name">Name</label>
					    	<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
					  </div>
					  
					    <div class="form-group">
					      <label for="email">Email</label>
					      <input type="email" class="form-control" name=email id="email" placeholder="Email" required="">
					    </div>
					    <div class="form-group">
					      <label for="password">Password</label>
					      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
					    </div>
					     <div class="form-group">
                  <label for="dept">Department</label>
                  <select id="dept" class="form-control" name="dept">
                    <option selected>CSE</option>
                    <option>EEE</option>
                    <option>ME</option>
                    <option>EC</option>
                    <option>CE</option>
                    <option>IC</option>
                  </select>

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

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) 
    {
        $name=$_POST["name"];

        $password=$_POST["password"];
    
        $email=$_POST["email"];

        $dept=$_POST["dept"];

        $sql="INSERT INTO admin (admname,email,password,role,dept) VALUES ('$name','$email','$password','hod','$dept')";
        if (mysqli_query($db,$sql)) 
        {
?>
        <script>
               swal(
                'Success',
                'Reviewer created',
                'success'
                ).then(function() {
                window.location.href ='adminprofile.php'; 
              });
        </script>
<?php
        }
        else
        {

echo mysqli_error($db);

            ?>

         <!--    <script>
                 swal(
                        'Oops...',
                        'User already exists!',
                        'error'
                     )
            </script> -->
            <?php
            
        }
    }


 ?>







 
</body>

</html>