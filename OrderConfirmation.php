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
session_start();
$NewArray = $_SESSION['Sales'];
echo"<h1>Order Confirmation</h1></br>";
echo"<table border = \"1\" width = \"100%\" style = \"background-color:lightgray\">\n";
echo "<tr>\n";
echo "<td>" . "Bottled Water" . "</td>";
echo "<td>" . "Vegetables" . "</td>";
echo "<td>" . "Popsicles" . "</td>";
echo "<td>" . "Orange Juice" . "</td>";
echo "<td>" . "Pumpkins" . "</td>";
echo "<td>" . "Cheese" . "</td>";

echo "</tr>\n";

echo "<tr>\n";
foreach($NewArray as $ItemNum) {
    echo "<td>" . htmlentities($ItemNum) . "</td>";
}
echo "</tr>\n";

echo"</table>\n";

if(isset($_GET['action'])){
    unset($_SESSION['Sales']);
session_destroy();

echo"<h2>Your checkout was successful. Thank you for shopping<h2/><br/>";
echo"<h2>To shop again please click <a href='mysessions.php'>Here</a><h2/></br>";

foreach ($_SESSION['Sales'] as $Item){
    echo $Item ."\n";
}
}


?>
<a href="OrderConfirmation.php?action=Clear">Check Out</a></br>
</body>
</html>