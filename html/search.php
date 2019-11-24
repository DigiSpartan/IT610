<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Search Incident</title>
</head>

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="class.php">Classification Help</a></li>
  <li><a href="report.php">Report Incident</a></li>
  <li><a href="search.php">Search Incident</a></li>
  <li><a href="list.php">Show Incidents</a></li>
</ul>
<h1>Search Incident</h1>

<body>
<p>If there is any particular incident that you would like to review, please feel free to utilize this page. Utilize the Malware ID filter to find any cases that best suit your situation and if the Preventive ID alongside with it helps. Or use the Preventive ID filter to determine what methods should be used in a particular situation.</p>
<h2>For Search Queries</h2>
<form action="" method="post">
Search By Malware ID (Enter a number): <input type="number" name="mid"><br>
<input type="submit" name="submit" value="Submit">
<br>
Search By Preventive ID (Enter a number): <input type="number" name="pid"><br>
<input type="submit" name="submit" value="Submit">
</form>
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
if(isset($_POST['submit'])) {
  $mid = $_POST['mid'];
  $pid = $_POST['pid'];
  $sql = "SELECT * FROM Scenario WHERE CaseID='$mid'OR RecommendationID='$pid'";
  if ($conn->query($sql) == TRUE) {
     echo "Filter results:";
     $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
        echo "<table><tr><th>Case ID</th><th>Description</th><th>Malware ID</th><th>Preventive ID</th></tr>";
        while ($row = $result->fetch_assoc()) {
           echo "<tr><td>".$row["Case_ID"]."</td><td>".$row["Description"]."</td><td>".$row["CaseID"]."</td><td>".$row["RecommendationID"]."</td></tr>";
        }
     }
  } else {
     echo "Error";
  }
}

mysqli_close($conn);
?>
</html>
