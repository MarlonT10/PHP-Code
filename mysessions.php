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

if(isset($_POST['Submit'])){
    $Amounts = array($_POST['Item1'],$_POST['Item2'],$_POST['Item3'],$_POST['Item4'],$_POST['Item5'],$_POST['Item6']);
    $_SESSION['Sales'] = $Amounts;
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Item 1: Bottled Water: <input type="text" name="Item1"><br />
    Item 2: Vegetables: <input type="text" name="Item2"><br />
    Item 3: Popsicles: <input type="text" name="Item3"><br />
    Item 4: Orange Juice: <input type="text" name="Item4"> <br />
    Item 5: Pumpkins: <input type="text" name="Item5"><br />
    Item 6: Cheese: <input type="text" name="Item6"><br />
    <p>
        <input type="submit" name="Submit" value="Enter">

    </p>
    <P>Enter amounts for each item and click enter to add to cart.</P>
    <p>To Continue to checkout <a href="OrderConfirmation.php">click here</a>  </p>
</form>
</body>
</html>