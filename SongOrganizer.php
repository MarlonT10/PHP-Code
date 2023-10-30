<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Sorted</title>
</head>
<body>
<h1>Song Organizer</h1>
<?php
//This if statement checks if an action url has been clicked on. If an action url has been clicked on, the next if statement will check if the text file SongOrganizer exists and has a file size greater than 0. If this is true the contents of the text file will be placed in an array.
if(isset($_GET['action'])){
    if((file_exists("SongOrganizer.txt"))&&(filesize("SongOrganizer.txt")!= 0)){
        $SongArray = file("SongOrganizer.txt");

// The switch statement functions like an if statement that checks the value of the $_GET['action'] global that comes from one of the 'A' link tags in the form. Depending on which option/action was clicked, the code for one case will execute. The cases represent the options that the user ca click on the form input.
        switch($_GET['action']){
            case 'Remove Duplicates':
                $SongArray  = array_unique($SongArray);
                $SongArray = array_values($SongArray);
                break;
            case 'Sort Ascending' :
                sort($SongArray);
                break;
            case 'Shuffle':
                shuffle($SongArray);
                break;
            case 'View Songs' :
                //If statement checks if text file doesn't exist or if the text file size is equal to 0. If either is true an error message is produced. Otherwise, the song names are displayed as an html table. Table will be displayed if user clicks view table.
                if((!file_exists("SongOrganizer.txt"))||(filesize("SongOrganizer.txt")==0))
                    echo "<p>There are no songs in the list.</p>\n";
                else{
                    $SongArray = file("SongOrganizer.txt");
                    echo"<table border = \"1\" width = \"100%\" style = \"background-color:lightgray\">\n";
                    foreach($SongArray as $Song) {
                        echo "<tr>\n";
                        echo "<td>" . htmlentities($Song) . "</td>";
                        echo "</tr>\n";
                    }
                    echo"</table>\n";
                }

        }
        //Once the contents of the text file have been placed into an array, this if statement checks if the array size/amount of elements is greater than 0. If so it will convert the array to a string, erase the contents of the text file and write the new string to the text file. All the while, error checking is done for the fopen command. If the file size is zero, the file will be deleted.
        if(count($SongArray)>0){
            $NewSongs = implode($SongArray);
            $SongStore  = fopen("SongOrganizer.txt","wb");
            if(!$SongStore)
                echo "There was an error updating the song file\n";
            else{
                fwrite($SongStore,$NewSongs);
                fclose($SongStore);
            }
        }else unlink("SongOrganizer.txt");
    }
}
//Line 47 checks whether the submit button has been clicked after form input in the song text box.
if(isset($_POST['Submit'])){
    $SongToAdd = stripslashes($_POST['SongName']) . "\n";
    $ExistingSongs = array();
//An if statement checks if the text file exists and has a file size greater than 0. If so, an array of existing data in the text file is created. The submitted song is compared to the elements in the array. If the song is unique, fopen will attempt to open the text file and write the song to it. Otherwise, the user will receive an error message.
    if(file_exists("SongOrganizer.txt")&& filesize("SongOrganizer.txt")>0){
        $ExistingSongs = file("SongOrganizer.txt");
        if(in_array($SongToAdd,$ExistingSongs)){
            echo"<p>The songs you entered already exists!<br />\n";
            echo"Your song was not added to the list.</p>";
        }else{
            $SongFile = fopen("SongOrganizer.txt","ab");
            if(!$SongFile)
                echo"There was an error saving your message!\n";
            else{
                fwrite($SongFile,$SongToAdd);
                fclose($SongFile);
                echo"Your song has been added to the list.\n";
            }
            
        }
    }
    else{
        if (file_exists("SongOrganizer.txt")){
            $handle = fopen("SongOrganizer.txt","ab");
            if(!$handle){
                echo"Cannot save song.";
            }
            else{
                fwrite($handle,$SongToAdd);
                fclose($handle);
                echo"Song saved.";
            }

        }
        else{
            $handle = fopen("SongOrganizer.txt","xb");
            if(!$handle){
                echo"Error, song not saved." . "\n";
            }
            else{
                fwrite($handle,$SongToAdd);
                fclose($handle);
                echo"Song saved.";
            }

        }



    }
}


?>
<p>
    <a href="SongOrganizer.php?action=Sort%20Ascending">Sort Song List</a><br/>
    <a href="SongOrganizer.php?action=Remove%20Duplicates">Remove Duplicate Songs</a><br />
    <a href="SongOrganizer.php?action=Shuffle">Randomize Song List</a><br />
    <a href="SongOrganizer.php?action=View%20Songs">View Songs</a><br />
</p>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
    <p>Add a New Song</p>
    <p>Song Name: <input type="text" name="SongName" /></p>
    <p>
        <input type="submit" name="Submit" value="Add Song to List" />
        <input type="reset" name="reset" value="Reset Song Name" />
    </p>
</form>
</body>
</html>