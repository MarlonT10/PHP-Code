<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Guest Book</title>
</head>
<body>
<?php
if(empty($_POST['first_name']) || empty($_POST['last_name']))
    echo "<p>You must enter your first and last name. Click your browser's back button to return to the Guest Book.\n</p>";
else{
    $FirstName = addslashes($_POST['first_name']);
    $LastName = addslashes($_POST['last_name']);
    $GuestBook = fopen("guestbook.txt","ab");
    if(is_writable("guestbook.txt")){
        if(fwrite($GuestBook,$LastName.", ".$FirstName."\n"))
            echo"<p>Thank you for signing our guest book!</p>\n";
        else
            echo"<p>Cannot add your name to the guest.</p>";
    }
    else
        echo"<p>Cannot write to the file.</p>\n";
    fclose($GuestBook);
}
?>
</body>
</html>