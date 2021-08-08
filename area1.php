<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);

if (isset($_POST['form_submitted'])):
$sql="INSERT INTO constituency( ano, aname, district, state) VALUES ('$_POST[ano]'
,'$_POST[aname]','$_POST[district]','$_POST[state]')"; endif;
if (!mysqli_query($conn,$sql))
{
 
die('Error: ' . mysql_error());
}

//to display values
$sql="SELECT * FROM constituency order by ano";
$result= mysqli_query($conn,$sql);

if(!$result)
{
die('Error: ' . mysql_error());
}
echo "<br/>"."<br/>"."<br/>"."<br/>"; echo "<table align='center' border='2'>
<tr>
<th>Area Number</th>
<th>Area Name</th>
<th>District</th>
<th>State</th>
</tr>";

while($row=mysqli_fetch_array($result)){
// output data of each row echo "<tr>";
echo "<td>".$row['ano']."</td>";
echo "<td>".$row['aname']."</td>";
echo "<td>".$row['district']."</td>";
echo "<td>".$row['state']."</td>"; echo "</tr>";
}

echo "</table>";
header("Refresh:7; url=area.html" ); mysqli_close($conn);

?>

