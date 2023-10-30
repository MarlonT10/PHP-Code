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
$Distances = array(
        "Berlin" => array("Berlin" => 0, "Moscow" => 1607.99, "Paris" => 876.96, "Prague" => 280.34, "Rome" => 1181.67 ),
    "Moscow" => array("Berlin" => 1607.99, "Moscow" => 0, "Paris" => 2484.92, "Prague" => 885.38, "Rome" => 1105.76 ),
    "Paris" => array("Berlin" => 876.96, "Moscow" => 641.31, "Paris" => 0, "Prague" => 885.38, "Rome" => 1105.76),
    "Prague" => array("Berlin" => 280.34, "Moscow" => 1664.04, "Paris" => 885.38, "Prague" => 0,"Rome" => 922),
    "Rome" => array("Berlin" => 1181.67, "Moscow" => 2374.26, "Paris" => 1105.76, "Prague" => 922, "Rome" => 0)
);
$KMtoMiles = 0.62;
$ValidateCity = array("Berlin", "Moscow","Paris","Prague","Rome");
if(isset($_POST['Submit'])){
   $start = $_POST['Start'];
    $end = $_POST['End'];
    if(in_array($start,$ValidateCity)&& in_array($end,$ValidateCity)){
        $Conversion = $Distances[$start][$end]*$KMtoMiles;
        echo "<p>The distance from " . $start." to ". $end ." is ". $Distances[$start][$end] . " km.</p><br/>";
        echo"<p>The distance from " . $start. " to ".$end. " in miles is ".$Conversion." miles.</p>";
    }
    else{
        echo"<p>Start and end cities can only be Berlin, Moscow,Paris, Prague, or Rome. Please enter start and end cities again.</p>";
    }

}

?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <p>Start City: <input type="text" name="Start" /></p>
    <p>End City: <input type="text" name="End" /></p>
    <p>
        <input type="submit" name="Submit" value="Enter" >
    </p>



</form>
</body>
</html>