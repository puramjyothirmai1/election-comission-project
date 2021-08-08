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
    <title>VOTE NOW!!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="about.css">
    <link rel="stylesheet" type="text/css" href="contacts.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <style>
        body {
            background-image: url("vote6.jpg");
        }
    </style>
</head>

<body>
    <div class="header">
        <a class="logo">ELECTION COMMISSION</a>
        <div class="header-right">
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="contacts.css">Contact</a>
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
    <br /><br />
    <br /><br />

    <div class="container">
        <h1 align="center">THE RESULTS ARE...</h1>

        <?php
        $sql="SELECT * FROM results WHERE position=1";
        $result=mysqli_query($conn,$sql);
        
        if(!$result)
        {
        die('Error: ' . mysql_error());
        }
        
        echo "<br/>"."<br/>";
        echo "<table align='center' border='2'>
        <tr>
        <th>Candidate Number</th>
        <th>Candidate Name</th>
        <th>Party Name</th>
        <th>Area Name</th>
        </tr>";
        
        while($row=mysqli_fetch_array($result)){
        // output data of each row echo "<tr>";
        echo "<td>".$row['cno']."</td>";
        echo "<td>".$row['cname']."</td>";
        echo "<td>".$row['pname']."</td>";
        echo "<td>".$row['aname']."</td>";
        }
        echo "</table>";
        ?>
    </div>
</body>

</html>
<?php
 mysqli_close($conn);
  ?>