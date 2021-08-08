<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);

if (isset($_POST['form_submitted'])):
$sql="INSERT INTO candidate( cno, cname, pno, ano) VALUES ('$_POST[cno]','$_POST[cname]','$_POST[pno]','$_POST[ano]')"; endif;
if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysql_error());
}

//to display values
$sql="SELECT * FROM candidate order by ano";
$result= mysqli_query($conn,$sql);

if(!$result)
{
die('Error: ' . mysql_error());
}
echo "<br/>"."<br/>"."<br/>"."<br/>"; echo "<table align='center' border='2'>
<tr>
 
<th>Candidate Number</th>
<th>Candidate Name</th>
<th>Party Number</th>
<th>Area Number</th>
</tr>";

while($row=mysqli_fetch_array($result)){
// output data of each row echo "<tr>";
echo "<td>".$row['cno']."</td>";
echo "<td>".$row['cname']."</td>";
echo "<td>".$row['pno']."</td>";
echo "<td>".$row['ano']."</td>"; echo "</tr>";
}

echo "</table>";
header("Refresh:7; url=candidate.html"); mysqli_close($conn);

?>
