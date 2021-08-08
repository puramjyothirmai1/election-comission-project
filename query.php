<?php
$dbhost = "localhost";
 
$dbuser = "root";
$dbpass = "";
$db = "electiondb";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die(mysqli_error);
?>
<!DOCTYPE html>
<html>
<head>
<title>Party</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="index.css" >
<link rel="stylesheet" type="text/css" href="about.css" >
<link rel="stylesheet" type="text/css" href="contacts.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<style>
body { background-image: url("vote2.jpg");}
</style>
</head>
<body>
<div class="header">
<a class="logo">ELECTION COMMISSION</a>
<div class="header-right">
<a href="index.html">Home</a>
<a href="about.html">About</a>
<a href="contacts.html">Contact</a>
</div>
</div>
<div class="navbar">
<div class="subnav">
<button class="subnavbtn">Party</button>
<div class="subnav-content">
<a href="party.html">New</a>
<a href="party2.php">Display</a>
</div>
</div>
<div class="subnav">
<button class="subnavbtn">Constituencies</button>
<div class="subnav-content">
<a href="area.html">New</a>
<a href="area2.php">Display</a>
<a href="query.php">Query</a>
</div>
</div>
<div class="subnav">
<button class="subnavbtn">Candidates</button>
<div class="subnav-content">
<a href="candidate.html">New</a>
<a href="candidate2.php">Display</a>
</div>
</div>
<div class="subnav">
<a href="votenow.html">Vote Now</a>
 
</div>
<div class="subnav">
<button class="subnavbtn">Results</button>
<div class="subnav-content">
<a href="results.php">Show Results</a>
</div>
</div>
</div>
<br/><br/>
<br/><br/>

<div align="center">
<div class="container">
<h1 align="center">Enter the query is...</h1>
<?php
//to display values
$sql="SELECT * FROM party order by pno";
$result= mysqli_query($conn,$sql);

if(!$result)
{
die('Error: ' . mysql_error());
}

echo "The query is "."<b>".$sql."</b>"."<br/>";
echo "<br/>"."<br/>"."<br/>"."<br/>"; echo "<table align='center' border='2'>
<tr>
<th>Party Number</th>
<th>Party Name</th>
<th>Party Head</th>
</tr>";

while($row=mysqli_fetch_array($result)){
// output data of each row echo "<tr>";
echo "<td>".$row['pno']."</td>";
echo "<td>".$row['pname']."</td>";
echo "<td>".$row['phead']."</td>"; echo "</tr>";
}

echo "</table>"; mysqli_close($conn);
?>
</div>
</div>
</body>
</html>
