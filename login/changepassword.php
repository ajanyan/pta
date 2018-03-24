<!DOCTYPE html>
<html>
<head>

  <title>Change Password</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="background: grey red">


  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
     
        <a class="nav-link" href="adminprofile.php">Manage HOD</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="changepassword.php">Change Password</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
     
    </ul>

  </nav>

<?php
  session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) )
  {
    header("location:index.php");
  }
  elseif ($_SESSION["role"]!="admin")
  {
    header("location:logout.php");
  }
?>
<div class="container">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <form action="" method="post">
        <div class="form-group"><br>
          Enter old password <br>
          <input type="password" name="oldpass" required="" class="form-control"><br>
          Enter new password <br>
          <input type="password" name="newpass" required="" class="form-control"><br>
          <input type="submit" value="Submit" class="btn-info form-control">
        </div>
      </form>
    </div>
    <div class="col-lg-4"></div>
  </div>
</div>

<?php
require("connect.php");
  if((isset($_POST["oldpass"])) && (isset($_POST["newpass"])))
  {
    $sql1="SELECT password FROM admin WHERE email='$_SESSION[user]'";
    $res1=mysqli_query($db,$sql1);
    print_r(mysqli_error($db));
    $row1=mysqli_fetch_assoc($res1);
    if($row1["password"]==$_POST["oldpass"])
    {
      $sql2="UPDATE admin SET password='$_POST[newpass]' WHERE email='$_SESSION[user]'";
      mysqli_query($db,$sql2);
      //echo "Sucess";
               echo"<script>
               swal(
                'Success',
                'Password changed',
                'success'
                ).then(function() {
                window.location.href ='logout.php'; 
              });
              </script>";
    
    }
    else
    {
      echo"<script>
          swal(
              'Oops...',
              'Password does not match!',
              'error'
            )
          </script>";
    }

  }


?>






<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>