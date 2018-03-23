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




 define ("filesplace","./studentdata");
 if (is_uploaded_file($_FILES['data']['tmp_name']))
 {
    if ($_FILES['data']['type'] != "application/vnd.ms-excel")
    {
        echo "<p>Data must be uploaded in CSV format</p>";
    } 
    else
    {
         $name = substr(md5(mt_rand()), 0, 7);

print_r($_SESSION);

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
                echo "Success<br>";
                echo mysqli_error($db);
            }
            $flag=$flag+1;
        }
        fclose($file);
        unlink("studentdata/".$name.".csv");
    }
} 

?>