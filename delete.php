<html>
<body>
  <h1>Data yang Terdaftar</h1>
<table>
<tr>
    <td>id</td>
    <td>firstname</td>
    <td>lastname</td>
    <td>email</td>
</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$id=$_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM MyGuests WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>" ;
    echo "<td>" . $row["id"]. " </td>" ;
    echo "<td>" . $row["firstname"]. " </td>" ;
    echo "<td>" . $row["lastname"]. " </td>" ;
    echo "<td>" . $row["email"]. " </td>" ;
    $id=$row["id"];
    echo "<td>" . "<a type='button'  href='/delete.php?id=$id' name='id'>Delete</a>". " </td>" ;
    echo "<td>" . "<a type='button'  href='/edit.php?id=$id' name='id'>Edit</a>". " </td>" ;
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
<a href='/daftar.php'><h3>Tambah Data</h3></a>

</form>
<br>

</body>
</html>