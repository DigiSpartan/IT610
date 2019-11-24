<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Patient Registry</title>
</head>

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="class.php">Active Registry</a></li>
  <li><a href="report.php">Insert Patient</a></li>

</ul>
<h1>Active Patient Registry</h1>
<body>
<h2>All Active Patients</h2>
<p>Here is a list of all active patients. Please feel free to go to the insert page if you want to add a new patient. For modifying patient info, please visit the admin.</p>
<?php
$servername = "192.168.1.169";
$username = "mainuser";
$password = "LabProject19!";
$dbname = "project";
/*
  <li><a href="search.php">Search Incident</a></li>
  <li><a href="list.php">Show Incidents</a></li>
*/
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT testtype, fname, lname, doctor, pnumber, insurance FROM report;";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
   echo "<table><tr><th>Test Type</th><th>First Name</th><th>Last Name</th><th>Doctor</th><th>Phone Number</th><th>Insurance</th></tr>";
   while ($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["testtype"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["doctor"]."</td><td>".$row["pnumber"]."</td><td>".$row["insurance"]."</td></tr>";
   }
   echo "</table>";
}

mysqli_close($conn);


?>

</body>


</html>
