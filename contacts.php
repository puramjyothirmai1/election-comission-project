<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);
if (isset($_POST['form_submitted'])):
 $sql="INSERT INTO contacts( firstname, lastname, country, email, question) VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[country]','$_POST[email]','$_POST[question]')";
endif;
 if (!mysqli_query($conn,$sql))
 {
 die('Error: ' . mysql_error());
 }
 $message = "Your query has been accepted";
 header("Refresh:1; url=contacts.html");
 echo "<script type='text/javascript'>prompt('$message');</script>";
mysqli_close($conn);
?>
  
