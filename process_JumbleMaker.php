<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jumble Maker</title>
</head>
<body>
<?php
function displayError($fieldName,$errorMsg){
echo $fieldName.$errorMsg."\n";
}
function validateWord($data,$fieldName){
    global $errorCount;
   if(!empty($data)){
       if(preg_match("/[^a-zA-Z]/",$data)){
           ++$errorCount;
           displayError($fieldName," can only contain letters.");
       }
       else{
           global $errorCount;
           if(strlen($data)>=4 && strlen($data)<=7){
               $data = str_shuffle(strtoupper($data));

           }
           else{
               global $errorCount;
               ++$errorCount;
               displayError($fieldName," must contain 4-7 letters. ");
           }
       }
   }
   else{
       global $errorCount;
       ++$errorCount;
       displayError($fieldName," can not be empty.");
   }
    /*

     if (empty($data)){
        displayError($fieldName," can not be empty");
        $errorCount++;
        }
        else{
            if((preg_match("/[a-zA-Z]/",$data)) )
            {
                if ((strlen($data)>=4 && strlen($data)<=7 )){
                $data = strtoupper($data);
                $data = str_shuffle($data);

                }
                else{
                displayError($fieldName," must be between 4 and 7 characters long.");
                $errorCount++;
                }
            }
            else{
            displayError($fieldName," must only contain letters.");
            $errorCount++;
            }
        }

    return $data;


     */
return $data;
}

$errorCount = 0;
$words = array();
if(isset($_POST['Submit'])) {

    $words[] = validateWord($_POST['Word1'], "Word 1");

    $words[] = validateWord($_POST['Word2'], "Word 2");

    $words[] = validateWord($_POST['Word3'], "Word 3");

    $words[] = validateWord($_POST['Word4'], "Word 4");
}

if ($errorCount>0)

    echo "Please use the \"Back\" button to re-enter the data.<br />\n";

else {

    $wordnum = 0;

    foreach ($words as $word)

        echo "Word ".++$wordnum.": $word<br />\n";

}
?>
</body>
</html>
