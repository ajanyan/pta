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

	<title>Upload</title>
</head>
<body background="image.jpg">

 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
        <a class="nav-link" href="tutorprofile.php">Manage Students</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="uploaddetails.php">Upload Data</a>
      </li>

    
      <li class="nav-item">
        <a class="nav-link" href="changetutorpassword.php">Change Password</a>
      </li>

    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

     
    </ul>
  </nav>






	<div class="container">
		<div class="row">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8"><br><br><br>
				<div class="jumbotron">
				<h1 align="center">Please Upload Student Details</h1><br>
				<br>
					<form action="uploadfile.php" enctype="multipart/form-data" method="post">
						<div class="form-group">
					    	<label for="data">Upload file in CSV Format</label>
					    	<input type="file" class="form-control " name="data" id="data" accept=".csv" required="">
                <input type="hidden" name="key">
					  </div>
					  
					  
						
	
				
					  <button type="submit" class="btn btn-success">Upload File</button>
            <a href="download.php" class="btn btn-success">Download CSV Format</a>
					</form>


				</div>
			
			</div>
			<div class="col-lg-2">
			
			</div>
		</div>
	</div>






 
</body>

</html>