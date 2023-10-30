<?php
setcookie('Views',2,0);
?>
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
if(isset($_COOKIE['Views'])){

    if($_COOKIE['Views']< 20){
        if($_COOKIE['Views']%5 == 0){
            if($_COOKIE['Views'] == 5){
                echo "<p>Hurray you have reached 5 views.</p></br>";
            }
            if($_COOKIE['Views']==10){
                echo"<p>Hurray you have reached 10 views. </p></br>";
            }
            if($_COOKIE['Views']==15){
                echo"<p>Hurray you have reached 15 views \n</p></br>";
            }

        }

        echo "\nView Count: ". $_COOKIE['Views']."\n";
        $_COOKIE['Views']++;
        $count = $_COOKIE['Views'];
        setcookie('Views',$count);
    }
    else{
        echo"View Count: 20";
        setcookie('Views','',time()-3600);
        setcookie('Views',1,0);
    }




}
else
    echo"Views: 1";

?>
</body>
</html>