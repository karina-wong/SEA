<?php
//from Lab 10 Karina Wong

session_start();
require_once("settings.php");

$is_invalid = false;

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
// Get user input
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Simple query to check credentials
$query = "SELECT * FROM admin_users WHERE username = '$username' AND passwords = '$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST"){
  if ($user) {
    $_SESSION['db_username'] = $username;
    $_SESSION['username'] = $user['username'];
    header("Location: manage.php");
    exit();
  } 
  $is_invalid = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Admin Login Page</h1>
    <h4>Admins only</h4>
    <?php if ($is_invalid): ?>
    <p>❌ Invalid Login</p>  
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button>Login</button>
       
    </form>
    
</body>
</html>