<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Database Connection</title>
</head>
<body>

<!-- decorator, database connected -->
    <div class="
      <?php echo $connected 
      ? 'bg-green-500' 
      : 'bg-red-500'; 
      ?> px-1 
       flex items-center justify-center text-white font-bold">
     
      <?php echo $connected ? 'Database Connected' : 'Failed'; ?>

      </div>
<!-- ------------------------------ -->

<div class="max-w-5xl h-screen mx-auto p-10">
    
    <h1 class="text-3xl font-bold mb-5 text-center">User List</h1>
    
    <div class="flex justify-center gap-3">
        <a href="create.php" 
        class="bg-blue-500 w-full text-center text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">
        + Add User
        </a>
        <a href="login.php" 
        class="bg-amber-700 w-full text-center text-white px-4 py-2 rounded hover:bg-amber-800 mb-4 inline-block">
        Login
        </a>
    </div>
    
    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
      <tr class="bg-gray-200 text-left">
        <th class="py-2 px-4">ID</th>
        <th class="py-2 px-4">Name</th>
        <th class="py-2 px-4">Email</th>
        <th class="py-2 px-4">Age</th>
        <th class="py-2 px-4">Password</th>
        <th class="py-2 px-4">Actions</th>
      </tr>
    
      <?php
      $result = $conn->query("SELECT * FROM users");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
            <td class='py-2 px-4'>{$row['id']}</td>
            <td class='py-2 px-4'>{$row['name']}</td>
            <td class='py-2 px-4'>{$row['email']}</td>
            <td class='py-2 px-4'>{$row['age']}</td>
            <td class='py-2 px-4'>{$row['password']}</td>
            
            <td class='py-2 px-4'>
              <a href='edit.php?id={$row['id']}' class='text-blue-600'>Edit</a> |
              <a href='delete.php?id={$row['id']}' class='text-red-600' 
                onclick='return confirm(\"Are you sure you want to delete this user? ({$row['name']})\")'>Delete</a>
            </td>

          </tr>
          ";
        }
      } else {
        echo "<tr><td colspan='5' class='text-center p-4'>No users found.</td></tr>";
      }
      ?>
    </table>
</div>



</body>
</html>



