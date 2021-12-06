<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$id = $_GET["id"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname, email FROM MyGuests WHERE id=$id ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $fn=$row["firstname"];
    $ln=$row["lastname"];
    $email=$row["email"];

  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
<form action="update.php" method="post">
<?php 
echo "id: "."<input type='text' name='id' value='$id'>"."<br>" ;
echo "First Name: "."<input type='text' name='fistname' value='$fn'>"."<br>" ;
echo "Last Name: "."<input type='text' name='lastname' value='$ln'>"."<br>" ;
echo "E-mail: "."<input type='text' name='email' value='$email'>"."<br>" ?>
<input type="submit">
</form>

</body>
</html>