<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['action'])){
    $DBConnect = mysqli_connect("localhost","root","","Interviews");
    $SQL = "SELECT * FROM interview_track";
    $Result = mysqli_query($DBConnect,$SQL);
    if($Result && mysqli_num_rows($Result)>0){

        while($Row = mysqli_fetch_assoc($Result)){
            echo"Interviewer: ".$Row["Interviewer"]." - Position: ".$Row["Position"]." - Date: ".$Row["InDate"]." - Candidate: ".$Row["Candidate"]." - Communication: ".$Row["Communication"]." - Computer: ".$Row["Computer"]." - Business: ".$Row["Business"]." - Comments: ".$Row["Comments"] . "<br/>";
        }



    }
    else{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}
?>
<a href="ViewInterviews.php?action=View">See Interviews</a><br/>
<a href="interviews.php">Return To Interview Sign</a>
</body>
</html>