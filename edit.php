<?php include 'db_connect.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- -------------------------------- -->
   <div class="w-full h-screen flex flex-col justify-center items-center">

<div>
    <h1 class="text-3xl font-bold mb-5 text-center">Edit User</h1>

    <form action="edit.php?id=<?php echo $id ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96 text-center">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required class="block w-full mb-3 border p-2 rounded">
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required class="block w-full mb-3 border p-2 rounded">
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required class="block w-full mb-3 border p-2 rounded">
        <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Update</button>
    </form>

    <a href="index.php" class="text-blue-600 underline mt-5 inline-block">← Back to Users</a>

</div>

</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];

  $sql = "UPDATE users SET name='$name', email='$email', age='$age' WHERE id=$id";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User updated!'); window.location='index.php';</script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
?>
