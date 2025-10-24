<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="w-full h-screen flex flex-col justify-center items-center">

<div>
    <h1 class="text-center text-3xl font-bold mb-5">Add New User</h1>

    <form action="create.php" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
        <input type="text" name="name" placeholder="Name" required class="block w-full mb-3 border p-2 rounded">
        <input type="email" name="email" placeholder="Email" required class="block w-full mb-3 border p-2 rounded">
        <input type="number" name="age" placeholder="Age" required class="block w-full mb-3 border p-2 rounded">
        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 w-full rounded hover:bg-blue-600">Add User</button>
    </form>

    <a href="index.php" class="text-blue-600 underline mt-5 inline-block">← Back to Users</a>

</div>

</div>
  </body>
</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];

  $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', '$age')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New user added!'); window.location='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
