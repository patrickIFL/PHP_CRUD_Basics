<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="w-full h-screen flex flex-col justify-center items-center">
    <div>
      <h1 class="text-3xl font-bold mb-5 text-center">Login</h1>

      <form action="login.php" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96 text-center">
          <input type="text" name="email" placeholder="Email" required class="block w-full mb-3 border p-2 rounded">
          <input type="password" name="password" placeholder="Password" required class="block w-full mb-3 border p-2 rounded">
          <button type="submit" name="login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Login</button>
      </form>

      <a href="index.php" class="text-blue-600 underline mt-5 inline-block">← Back to Users</a>
    </div>
  </div>

</body>
</html>

<?php
if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ✅ Use prepared statement (to prevent SQL injection)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found
        $row = $result->fetch_assoc();
        echo "<script>alert('Login successful! Welcome, {$row['name']}'); window.location='index.php';</script>";
    } else {
        // No user found
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>
