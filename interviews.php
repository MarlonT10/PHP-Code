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
<h1>Interview</h1>
<?php

if(isset($_POST['Submit'])){
    $DBConnect = mysqli_connect("localhost","root","","Interviews");
    $Interviewer = $_POST['Interviewer'];
    $Position = $_POST['Position'];
    $Date = $_POST['Date'];
    $Candidate = $_POST['Candidate'];
    $Communication = $_POST['Communication'];
    $Computer = $_POST['Computer'];
    $Business = $_POST['Business'];
    $Comments = $_POST['Comments'];
    $SQLquery = "INSERT INTO interview_track(Interviewer,Position,InDate,Candidate,Communication,Computer,Business,Comments) VALUES('$Interviewer','$Position','$Date','$Candidate','$Communication','$Computer','$Business','$Comments')";
    $Result = mysqli_query($DBConnect,$SQLquery);
    if($Result){
        echo"Interview Created Successfully.";
    }
    else{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}
?>
<form method="post" action="interviews.php">
    <p>Interviewer's Name: <input type="text" name="Interviewer"></p><br/>
    <p>Position: <input type="text" name="Position"></p><br/>
    <p>Date of Interview: <input type="text" name="Date"></p><br/>
    <p>Candidates Name: <input type="text" name="Candidate"></p><br/>
    <p>Communication Abilities: <input type="text" name="Communication"></p><br/>
    <p>Computer Skills: <input type="text" name="Computer"></p><br/>
    <p>Business Knowledge: <input type="text" name="Business"></p><br/>
    <p>Interviewer's Comments: <input type="text" name="Comments"></p><br/>
    <p>
        <input type="submit" name="Submit" value="Enter">
    </p>
    <a href="ViewInterviews.php">View Interviews</a>
</form>
</body>
</html>