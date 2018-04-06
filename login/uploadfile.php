<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
</head>
<body>
<?php



  session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) )
  {
    header("location:index.php");
  }
  elseif ($_SESSION["role"]!="tutor")
  {
    header("location:logout.php");
  }

if(!isset($_POST['key']))
{

    header("location:index.php");
}
$csvformat = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
);






 define ("filesplace","./studentdata");
 if (is_uploaded_file($_FILES['data']['tmp_name']))
 {
    if (!(in_array($_FILES['data']['type'],$csvformat)))
    {

        echo "<script>
                  swal(
                  'Error',
                  'Data must be in CSV Format',
                  'error'
                    ).then(function() {
                window.location.href ='uploaddetails.php'; 
              });
                </script>";
    } 
    else
    {
         $name = substr(md5(mt_rand()), 0, 7);


        $result = move_uploaded_file($_FILES['data']['tmp_name'], filesplace."/$name.csv");
        $file = fopen("studentdata/$name.csv","r");
        $flag=0;
        while(!feof($file))
        {
            $data=fgetcsv($file);
            if($flag!=0 && $data["2"]!="")
            { 
                $regno=$data["0"];
                $studname=$data["1"];
                $date = new DateTime($file["2"]);
                $timestamp = $date->getTimestamp(); 
                $dob = $date->format('Y-m-d');

                require("connect.php");
                $tutor=$_SESSION['name'];
                $sql="INSERT INTO student VALUES('$regno' ,'$studname','$dob','$tutor')";
                mysqli_query($db,$sql);

            }
            $flag=$flag+1;
        }
        fclose($file);
        unlink("studentdata/".$name.".csv");
              echo "<script>
                  swal(
                  'Success',
                  'Data Uploaded',
                  'success'
                    ).then(function() {
                window.location.href ='tutorprofile.php'; 
              });
                </script>";
    }
 

} 
else
{
    echo "Unauthorized access";
}

?>





</body>
</html>



