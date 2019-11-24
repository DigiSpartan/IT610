<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Show Incidents</title>
</head>

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="class.php">Classification Help</a></li>
  <li><a href="report.php">Report Incident</a></li>
  <li><a href="search.php">Search Incident</a></li>
  <li><a href="list.php">Show Incidents</a></li>
</ul>
<h1>Show Incidents</h1>

<body>
<p>This page is designed to show off the main database table, which would be the incidents that the administrator has approved to list. If your incident does not appear on this page, then that must mean that it is still in queue and has yet to reach approval.</p>
<h2>For Archived Incidents</h2>

<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Scenario";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
   echo "<table><tr><th>ID No.</th><th>Case Description</th><th>Malware ID</th><th>Preventive ID</th</tr>";
   while ($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["Case_ID"]."</td><td>".$row["Description"]."</td><td>".$row["CaseID"]."</td><td>".$row["RecommendationID"]."</td></tr>";
   }
   echo "</table>";
}

mysqli_close($conn);
?>

</html>
