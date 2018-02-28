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
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
  		integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
		crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
  	 	integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" 
  	 	crossorigin="anonymous">
  </script>

	<title>Login</title>
</head>
<body>
	<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-6  jumbotron">
			<form class="form-group" method="post" action="auth.php">
				<label for="email">Email</label><br>
				<input type="email" name="email" id="email"><br>
				<label for="password">Password</label><br>
				<input type="password" name="password" id="password"><br><br>
				<input type="submit" class="btn btn-primary" value="submit">

			</form>
			
		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
	
</div>











</body>
</html>