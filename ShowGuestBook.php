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
if(file_exists("guestbook.txt")){
    $data = readfile("guestbook.txt");
    echo"<pre>$data</pre>";
    $lines = file("guestbook.txt");
    foreach($lines as $Key => $line){
        echo"<br>$line";
    }
}
else{
    echo"File does not exist.";
}
?>
</body>
</html>
