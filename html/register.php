<html>

<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Login/Register</title>
</head>

<h1>Register</h1>
<body>
<p>Please fill out this information in order to register and utilize the system.</p>
<form action="" method="post">
Name: <input type="text" name="name"><br>
User: <input type="text" name="user"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="submit" value="Submit">
</form>

<br>

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
  $name = $_POST['name'];
  $user = $_POST['user'];
  $pass = $_POST['password'];
  $sql = "INSERT INTO user (username, name, password) VALUES ('$user', '$name', '$pass')";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  //$rows = mysqli_num_rows($result);

  if($result) {
    echo "User creation completed!";
    //header("Location: index.html");
  } else {
    echo "Error";
  }
}

mysqli_close($conn);

?>

<p>If you wish to login, please click <a href="login.php">here</a></p>
</body>
</html>
