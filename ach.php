<?php
$email= $_POST['email'];
$comment = $_POST['comments'];
$name = $_POST['name'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$valid = true;
if (empty($_POST['email'] || $_POST['name'] || $_POST['comments']))
{
    echo 'Please enter all fields';
    $valid = false;
}

    if($valid){
    echo "The form has been submitted";
    }
    $date = date('h:i, j F Y');
    $outputstring = $date."\t"."email: \t".$email." name: \t".$name ." Message: \t".$comment."\n";
   // $outputstring = $date."\t".$tireqty."tires \t".$oilqty." oil\t"
   // .$sparkqty." spark plugs\t\$".$totalamount."\t".$Address."\n";



    @ $fp = fopen("$DOCUMENT_ROOT/texts/hub.txt", 'ab');// If the order is not being written on the order.txt dt i created, the order will not be processed.
    flock($fp, LOCK_EX); // lock file for writing

    if (!$fp) // If the order could not be written to the order.txt file at the time.
    {
        echo '<p><strong>Comment not submitted please try again.</strong></p></body></html>';
               exit;
    }


    fwrite($fp, $outputstring);// Grab the file stored in $fp and write to it using the format in $outputstring.
    flock($fp, LOCK_UN); //release write lock.
    fclose($fp);// when you are done writing close the file.

    echo '<p>Thanks.</p>';
    //With this code, customers details or orders are stored on the web.
   
   //The form below is for customers feedbac
?>