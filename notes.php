<?php 
include "db_connect.php";
// TODO CRUD FUNCTIONS
// ? CREATE ====================================
$sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', '$age')";

// ? READ ====================================
$result = $conn->query("SELECT * FROM users"); // ! Loop through the whole database
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "
        <script>
        console.log('names are is {$row['name']}');
        </script>
        ";
    }
}

// ? UPDATE ====================================
$sql = "UPDATE users SET name='$name', email='$email', age='$age' WHERE id=$id";

?>

