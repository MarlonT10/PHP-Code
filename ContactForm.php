<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Me</title>
</head>
<body>
<?php
/*
 validateInput takes a value from the POST superglobal array and checks whether the value is empty, if it is not empty it removes blank spaces and slashes from the value and returns the new edited value.
Otherwise, if the data field is empty it increments the global error count variable and returns an empty value.
 */

function validateInput($data, $fieldName){
    global $errorCount;
    if (empty($data)){
        echo "\"$fieldName\" is a required field.<br/>\n";
        ++$errorCount;
        $retval = "";
    }
    else{
        $retval = trim($data);
        $retval = stripslashes($retval);
    }

    return($retval);
}
/*
 validateEmail takes a value from the POST superglobal array and checks if the data field is not empty, if it is empty it increments the error count, displays a message and returns nothing.
If the variable is not empty, the string in the variable is assigned to the return value and filtered by the filter_var function to remove invalid characters and ensure the string is a valid email address.
If the string is not found to be a valid email address, an error message is displayed. Otherwise, the email string is returned.
  */
function validateEmail($data,$fieldName){
    global $errorCount;
    if (empty($data)){
        echo"\"$fieldName\" is a required field.<br />\n";
        ++$errorCount;$retval = "";

    }
    else{
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL);
        if(!filter_var($retval,FILTER_VALIDATE_EMAIL)){
            echo "\"$fieldName\" is not a valid e-mail address. <br />\n";
            ++$errorCount;$retval="";
        }
    }
    return($retval);
}
//The displayForm function contains the HTML code to display a form including three input boxes and an additional text input area. This function also displays a submit and a clear button.
function displayForm($Sender,$Email,$Subject,$Message){
    ?> <h2 style="text-align: center">Contact Me</h2>
    <form name="contact" action="ContactForm.php" method="post">
        <p>Your Name:
            <input type="text" name="Sender" value="<?php echo $Sender;?>"/></p>
        <p>Your E-mail:
            <input type="text" name="Email" value="<?php echo $Email;?>"/></p>
        <p>Subject:
            <input type="text" name="Subject" value="<?php echo $Subject; ?>"/></p>
        <p>Message: <br/>
            <textarea name="Message" ><?php echo $Message; ?></textarea></p>
        <p><input type="reset" value="Clear Form"/>&nbsp; &nbsp;
            <input type="submit" name="Submit" value="send form"/></p>
    </form>

<?php }

$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Email = "";
$Subject = "";
$Message = "";
//Display form is called to display form for the first submission
displayForm($Sender,$Email,$Subject,$Message);
//Checks if submit button has been clicked
//If submit has been clicked, each of the data fields of the superglobal POST array is checked using either validateInput or validateEmail. The return values are assigned to member variables.
if (isset($_POST['Submit'])){
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your E-Mail");
    $Subject = validateInput($_POST['Subject'],"Subject");
    $Message = validateInput($_POST['Message'],"Message");

    //ShowForm controls if form will be displayed again, if the amount of errors is 0, the form will not be displayed again.Otherwise, showForm will be true. If showForm is true, the form will be redisplayed by calling displayForm. Otherwise,the email message sent will be displayed unless the message fails to send.
    if($errorCount == 0)
        $ShowForm = FALSE;
    else
        $ShowForm = TRUE;
    if ($ShowForm == TRUE){

            echo"<p>Please re-enter the form information below.</p>\n";
            displayForm($Sender,$Email,$Subject,$Message);



    }
    else{
        $SenderAddress = "$Sender <$Email>";
        $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

        $result = mail("recipient@example.com",$Subject,$Message,$Headers);

        if($result)
            echo"<p>Your message has been sent. Thank you,".$Sender.".</p>\n";
        else
            echo"<p>There was an error sending your message, ".$Sender . ".</p>\n";
    }
}
?>
</body>
</html>