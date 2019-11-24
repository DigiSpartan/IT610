<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Classification Help</title>
</head>

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="class.php">Patient Registry</a></li>
  <li><a href="report.php">Report Patient</a></li>
</ul>
<h1>Report Incident</h1>

<body>
<p>Please submit your patient information.</p>
<p>Warning: Do not refresh page.</p>
<p>If you are looking to update a current entry, then please indicate as such in the description.</p>
<h2>Insert Your Entry</h2>

<form action="" method="post">
Test type: <input type="text" name="test"><br>
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
Doctor: <input type="text" name="doctor"><br>
Phone Number: <input type="text" name="pnum"><br>
Life Insurance: <input type="text" name="lifeinsurance"><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
$servername = "192.168.1.169";
$username = "mainuser";
$password = "LabProject19!";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
  $test = $_POST['test'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $doc = $_POST['doctor'];
  $phone = $_POST['pnum'];
  $insurance = $_POST['lifeinsurance'];
  $sql = "INSERT INTO report (testtype, fname, lname, doctor, pnumber, insurance) VALUES ('$test', '$fname', '$lname', '$doc', '$phone', '$insurance')";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  if($result) {
    echo "New Entry added";
  } else {
    echo "Error";
  }
/*
  if ($conn->query($sql) == TRUE) {
     echo "New entry added. Your Queue is shown down below.";
     $sql2 = "SELECT testtype, fname, lname, doctor, pnumber, insurance FROM Queue";
     $result = mysqli_query($conn, $sql2);
     if ($result->num_rows > 0) {
        echo "<table><tr><th>Test</th><th>First Name</th><th>Last Name</th><th>Doctor</th><th>Phone</th><th>Insurance</th></tr>";
        while ($row = $result->fetch_assoc()) {
          "<tr><td>".$row["testtype"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["doctor"]."</td><td>".$row["pnumber"]."</td><td>".$row["insurance"]."</td></tr>";
        }
     }
*/
}
/*

$sql = "SELECT ID, Name, Description FROM Classification";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
   echo "<table><tr><th>ID No.</th><th>Name</th><th>Description</th></tr>";
   while ($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Description"]."</td></tr>";
   }
   echo "</table>";
}
*/
mysqli_close($conn);


?>
</body>


</html>
