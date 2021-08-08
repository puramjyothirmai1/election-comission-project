<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);

if (isset($_POST['form_submitted'])):
$sql="INSERT INTO party( pno, pname, phead) VALUES ('$_POST[pno]','$_POST[pname]', '$_POST[phead]')";
endif;
if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysql_error());
}

//to display values
$sql="SELECT * FROM party order by pno";
$result= mysqli_query($conn,$sql);

if(!$result)
{
die('Error: ' . mysql_error());
}
echo "<br/>"."<br/>"."<br/>"."<br/>"; echo "<table align='center' border='2'>
<tr>
<th>Party Number</th>
<th>Party Name</th>
<th>Party Head</th>
</tr>";

while($row=mysqli_fetch_array($result)){ echo "<tr>";
echo "<td>".$row['pno']."</td>";
echo "<td>".$row['pname']."</td>";
echo "<td>".$row['phead']."</td>"; echo "</tr>";
}

echo "</table>";
header("Refresh:7; url=party.html"); mysqli_close($conn);
 

?>
