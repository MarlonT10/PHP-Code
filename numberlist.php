<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Even Numbers</title>
</head>
<body>
<?php
$currentNumber = 1;
while($currentNumber<=100){
    if($currentNumber%2 == 0){
        echo "<h2>$currentNumber</h2>";

    }
    $currentNumber++;


}
?>
</body>
</html>

