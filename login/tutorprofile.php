<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  </style>
  <title>PTA</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php 
  session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
  {
    header("location:index.php");
  }
  elseif ($_SESSION["role"]!="tutor")
  {
    header("location:logout.php");
  }
require("connect.php");
$tutorname=$_SESSION['name'];
$sql="SELECT * FROM student WHERE tutor ='$tutorname' ";
$res=mysqli_query($db,$sql);

?>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item active">
        <a class="nav-link" href="tutorprofile.php">Manage Students</a>
      </li>
      <li class="nav-item">
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

<div class="container-float"> 
<table class="table table-striped">
  <thead>
    <tr>
      <th>Register Number</th>
      <th>Name</th>
      <th></th>
         
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $res )==0 ){
        echo '<tr><td colspan="4">No Students Found</td></tr>';
          echo "<tr>
       <td><a href='createhod.php'><button class='btn btn-primary'>Create Reviewer</button></a></td>
       <td><a href='../php/changeadminmail.php'><button class='btn btn-primary'>Change Admin Mail</button></a></td>
       <td></td>
       <td></td>
       </tr>";

      }else{
        while($row=mysqli_fetch_assoc($res)){
        $id=$row["reg"];
       echo "<tr>
       <td>{$row['reg']}</td>
       <td>{$row['name']}</td>
       <td><form action=tutorprofile.php method='post'>
          <input type='hidden' name ='studid' value='$id'>
          <input type='submit' class='btn btn-default' value ='Delete' ></form></td>
       </tr>";
        }
       echo "<tr>
       <td><a href='addstudent.php'><button class='btn btn-primary'>Add Student</button></a></td>
       <td></td>
       <td></td>
       </tr>";

      }



    if(isset($_POST["studid"]))
    {
  
      
      $sql3="DELETE FROM student WHERE reg='$_POST[studid]'";

          if (mysqli_query($db,$sql3))
          {
            echo "<script>
                  swal(
                  'Deleted',
                  'Data Deleted',
                  'warning'
                    ).then(function() {
                window.location.href ='tutorprofile.php'; 
              });
                </script>";
          }

     
      
    
    }

    ?>

  </tbody>
</table>

</div>

<br>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
