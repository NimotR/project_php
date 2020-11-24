<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "studentDB";
$table = "students";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = "SELECT id,firstname,lastname,email,reg_date FROM $table";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
?>

<table border="2px">

    <td>ID</td>
    <td>Firstname</td>
    <td>Lastname</td>

    <td>Email</td>
    <td>Created Time</td>

<?php
  // while($row = mysqli_fetch_assoc($result)) {
 foreach ($result as $row) {
 
    $id= $row["id"];
    $firstname = $row["firstname"];
    $lastname= $row["lastname"];
        $email= $row["email"];
    $date= $row["reg_date"];


echo "<tr>";
echo "<td> $id</td>";
echo "<td> $firstname</td>";
echo "<td> $lastname </td>";
echo "<td> $email</td>";
echo "<td> $date</td>";
echo "</tr>";

}

echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);


?>