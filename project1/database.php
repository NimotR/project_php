<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "studentDB";
$table = "students";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully and Database created";


// sql to create table
$sql = "CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "Table students created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    

// Check if input text exist
if(isset($_POST["submit"])) {
   $lastname = $_POST["lname"];
   $firstname = $_POST["fname"];
   $email = $_POST["email"];
   $password = $_POST["password"];

    


$sql = "INSERT INTO $table (firstname, lastname,  email, password)
VALUES ('$lastname', '$firstname', '$email','$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
mysqli_close($conn);
?> 