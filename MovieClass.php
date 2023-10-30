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
class MovieClass{
    private $Age;
    private $Price;
    public function CheckPrice(){
        $age = $this->getAge();
        if($age<5){
            $this->Price="Free";

        }
        elseif ($age>=5 && $age<=17){
            $this->Price=5;
        }
        elseif ($age>=18 && $age<=55){
            $this->Price=10;
        }
        else{
            $this->Price=8;
        }


    }
    public function SetPrice($price){
        $this->Price = $price;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function setAge($age){
        $this->Age=$age;
    }
    public function getAge(){
        return $this->Age;
    }
}
?>

<?php
$ChildOne = new MovieClass();
$ChildOne->setAge(21);
$ChildOne->CheckPrice();
$Price = $ChildOne->getPrice();
$Age = $ChildOne->getAge();
echo"Age: $Age\n";
echo"Price: $Price\n";

?>
</body>
</html>