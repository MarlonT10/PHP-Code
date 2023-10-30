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
$guessNum = 2;
if($guessNum>=1 && $guessNum <=5){
    echo"<p>Number is between 1 and 5</p>";
}
else {
    if ($guessNum >= 5 && $guessNum < 10) {
        echo "<p>Number is between 5 and 10</p>";
    } elseif ($guessNum >= 10 && $guessNum <= 25) {
        echo "<p>Number is between 10 and 25</p>";

    }
    else{
        echo"Number is greater than 25.";
    }
}
?>
</body>
</html>