<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "
  <script>
    alert('User deleted!');
    window.location='index.php';
</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}
?>
