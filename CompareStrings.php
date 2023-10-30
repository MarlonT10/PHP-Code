<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compare Strings</title>
</head>
<body>
<h1>Compare Strings</h1><hr />
<?php
$firstString = "Geek2Geek";

$secondString = "Geezer2Geek";

function sameVar($var1,$var2){
echo " String ".$var1." does match string ".$var2;
}
function diffVar($var1,$var2){
echo"String ".$var1." does not match string".$var2;
}
if((!(empty($firstString))) && (!(empty($secondString)))){
    if(strcmp($firstString,$secondString) == 0){
        sameVar($firstString,$secondString);
    }
    else{
        diffVar($firstString,$secondString);

    }

}
else {

    echo "<p>Either the \$firstString variable or the \$secondString variable does not contain a value so the two strings cannot be compared. </p>";

}
?>
</body>
</html>
