<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Bowlers</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?> ">
Bowler's Name: <input type="text" name="Name"/><br/>
    Bowler's Age: <input type="text" name="Age"/><br/>
    Bowler's Average: <input type="text" name="Average"/><br/>
    <input type="reset" value="Clear Form"/>&nbsp; &nbsp;
    <input type="submit" name="Submit" value="Send Form"/>
</form>
<?php
if(isset($_POST['Submit'])){
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $average = $_POST['Average'];
    if((!(empty($_POST['Age'])))&&(!(empty($_POST['Name'])))&&(!(empty($_POST['Average'])))){
        if(preg_match("/[^a-zA-Z]/",$name)){
            echo"Name can only include letters.Please resubmit.";
        }
        else{
            if(preg_match("/\D/",$age)){
                echo"Age can only include numbers.Please resubmit.";
            }
            else{
                if(preg_match("/\D/",$average)){
                    echo"Average can only include numbers. Please resubmit.";
                }
                else{
                    $handle=fopen("registration.txt",a);
                    $Average = $_POST['Average'];
                    $Age = $_POST['Age'];
                    $Name = $_POST['Name'];

                    $data = $Name . ", ".$Age.", ".$Average."\n";
                    fwrite($handle,$data);
                    fclose($handle);
                    echo $Name ." has been successfully registered. Thank you.";
                }
            }
        }

    }
    else{
        echo"All fields must be complete. Please resubmit and complete All.";
    }




}

?>
</body>
</html>