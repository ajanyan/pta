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



	<title>Demo</title>
</head>
<body>

	<form id="idform" >
		Email <br><br>
		<input type="email" name="email" required="">
		<input type="submit" value="submit" >
	</form>
	<br><br><br><br>

	<div id="dis"></div>

	<script type="text/javascript">
	$("#idform").submit(function(e){
	
		e.preventDefault();

		$.ajax({
			type : "POST" ,
			url : "fetchdata.php" ,
			data : $("#idform").serialize(),
			success : function(data)
			{	
				var resdata = $.parseJSON(data);
				if(resdata.status=='error')
				{
					if(!alert("Not found"))
					{
						location.reload();
					}
				}
				else
				{ 
				//$("#dis").show();
				$("#idform").hide();
				$("#dis").append("<h3>Name:"+resdata.name+"</h3>")





				$("#dis").append(
				$("<h3/>").text("Contact Form"),
				$("<p/>").text("This is my form. Please fill it out. It's awesome!"),
				$("<form/>", 
				{
					action: 'mail.php',
					method: 'post'
				}).append(

				$("<input/>", {
					type: 'text',
					name: 'name',
					placeholder: 'Your Name',
					required:'true'
				}), 
				$("<br/>"),
				$("<input/>", {
					type: 'email',
					name: 'email',
					placeholder: 'Your Email',
					required:'true'
				}),
				$("<br/>"),
				$("<input/>", {
					type: 'hidden',
					name: 'data',
					value: resdata.name
				}),
				$("<textarea/>", {
					rows: '5px',
					cols: '27px',
					type: 'text',
					name: 'msg',
					placeholder: 'Message',
					required:'true'
				}),
				$("<br/>"),
				$("<input/>", {
					type: 'submit',
					id: 'submit',
					value: 'Submit'
				})
				))



















				

				}
			}
		})
		

	});



</script>


</body>
</html>