<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate Credit Card</title>
</head>
<body>
<h1>Validate Credit Card</h1><hr />
<?php
$CreditCard = array( "", "8910-1234-5678-6543", "OOOO-9123-4567-0123");
foreach ($CreditCard as $CardNumber) {

if (empty($CardNumber)) {

    echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";

}
else{
    $CardNumber = str_replace("-","",$CardNumber);
    $CardNumber = str_replace(" ","",$CardNumber);
    if((is_numeric($CardNumber)) && (!(empty($CardNumber)))){
        echo "<p>$CardNumber</p>";
    }
    else{
        echo"Card number is not numeric or an empty string.";
    }
}
}
?>
</body>
</html>

