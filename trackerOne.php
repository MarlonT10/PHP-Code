<?php

$num = 2;
setcookie('count',$num,0);





?>
<!DOCTYPE html>
<html>
<header>
    <title>Tracker</title>
</header>
<body>
<?php
$count = 0;
if(isset($_COOKIE['count'])){

    if($_COOKIE['count'] < 20){
        $count=$_COOKIE['count'];
        $count++;
        setcookie('count',$count);
        echo "number views: ".$_COOKIE['count'];
        if($_COOKIE['count']==5 || $_COOKIE['count']==10 || $_COOKIE['count'] == 15){
            echo "<p>Special Message: You have reached an amount of views that is a multiple of 5 </p>"." Number of views: ".$_COOKIE['count'];
        }


    }
    else{
        echo "view count: 20";
        $num = 1;
        setcookie('count',$num,0);

    }



}
else{
    echo "number of views: 1";

}
?>

</body>
</html>


