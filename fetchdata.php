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

	<title>Contact</title>
</head>
<body background="image.jpg">
	<?php 
	require("connect.php");

	$regno=$_POST["regno"];
	$dob=$_POST["dob"];

	$sql1="SELECT * FROM student WHERE reg='$regno' AND dob='$dob'" ;
	$res1=mysqli_query($db,$sql1);
	$row1=mysqli_fetch_assoc($res1);
	if(mysqli_num_rows($res1)==1)
	{  
		$tutor=$row1["tutor"];
		$sql2="SELECT * FROM admin WHERE admname='$tutor'" ;
		$res2=mysqli_query($db,$sql2);
		$row2=mysqli_fetch_assoc($res2);

	 ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8"><br><br><br>
				<div class="jumbotron">
				<h1 align="center">Please Enter Details</h1><br>
				<h4>Name of student :<?php echo "$row1[name]"; ?></h4><br>
					<form action="mail.php" method="post">
						<div class="form-group">
					    	<label for="name">Name</label>
					    	<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="email">Email</label>
					      <input type="email" class="form-control" name=email id="email" placeholder="Email" required="">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="phone">Phone No</label>
					      <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone No" required="">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="inputAddress2">Message</label>
					    <textarea class="form-control" id="inputAddress2" rows="5" placeholder="Message" required=""></textarea>
					  </div>
						<input type="hidden" name="studname" value="<?php echo $row1['name']; ?>">
						<input type="hidden" name="regno" value="<?php echo $regno?>">

						<input type="hidden" name="tutoremail" value="<?php echo $row2['email']; ?>">

						<input type="hidden" name="tutorname" value="<?php echo $row2['admname']; ?>">
	
				
					  <button type="submit" class="btn btn-primary">Send</button>
					</form>


				</div>
			
			</div>
			<div class="col-lg-2">
			
			</div>
		</div>
	</div>





<?php 
		
	}
	else
	{
		        echo"<script>
		               swal(
		                'Warning',
		                'Details does not match',
		                'warning'
		                ).then(function() {
		                window.location.href ='index.php'; 
		              });
		        	</script>";
		
	}




 ?>
</body>

</html>