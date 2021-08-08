<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);
if (isset($_POST['form_submitted'])):
 $sql="INSERT INTO voter( vno, vname, age, relname, ano) VALUES ('$_POST[vno]','$_POST[vname]','$_POST[age]','$_POST[relname]','$_POST[ano]')";
 $val=$_POST['pname'];
 $sql4=mysqli_query($conn,"UPDATE count_table set no_of_votes=no_of_votes+1 where cno=$val ");
endif;
if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('inserted successfully');</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



 $sql="SELECT v.vno, v.vname, age, relname, v.ano, pname FROM voter v order by v.ano";
 $result= mysqli_query($conn,$sql);

 if(!$result)
 {
 die('Error: ' . mysql_error());
 }
 echo "<br/>"."<br/>"."<br/>"."<br/>";
 echo "<table align='center' border='2'>
 <tr>
 <th>Voter Number</th>
 <th>Voter Name</th>
 <th>Age</th>
 <th>Relation Name</th>
 <th>Area Number</th>
 <th>Party Voted For</th>
 </tr>";

 while($row=mysqli_fetch_array($result)){

 echo "<tr>";
 echo "<td>".$row['vno']."</td>";
 echo "<td>".$row['vname']."</td>";
 echo "<td>".$row['age']."</td>";
 echo "<td>".$row['relname']."</td>";
 echo "<td>".$row['ano']."</td>";
 echo "<td>".$row['pname']."</td>";
 echo "</tr>";
 }
echo "</table>";
header("Refresh:7; url=votenow.html");
mysqli_close($conn);
?>