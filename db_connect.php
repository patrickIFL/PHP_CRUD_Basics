<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_crud_training";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  $connected = false;
} else {
  $connected = true;
}
?>
