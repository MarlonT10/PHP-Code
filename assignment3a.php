<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cost Per Square Foot Area Function</title>
</head>
<body>
<h2>Total Property Cost Calculator</h2>
<?php
$length = 20;

$width = 4;

$ftCost = 75;
function rArea($length, $width){
return $length*$width ;
}
echo "A room of length " . $length . "ft and width " . $width . "ft has an area of " . rArea($length ,$width ) ." ft squared.";

function totalCost($length, $width, $cost){
    $Area = rArea($length,$width);
    return $Area*$cost;
}
echo "The total cost of a room of length " .  $length . "ft and width " . $width . "ft area at $" . $ftCost  . "per square foot is $" . totalCost($length ,$width,$ftCost) .".";
?>
</body>
</html>
