<?php
//from Lab 10 Karina Wong

session_start();
require_once("settings.php");
$page = "adminloginPage";
include_once "nav.inc";


$is_invalid = false;

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
// Get user input
$email = trim($_POST['email']);
$password = trim($_POST['password']);


// Simple query to check credentials, gets all info based on email
$query = "SELECT * FROM manager WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

//Checks if it is posted first
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email && $password) {
        $stmt = $conn->prepare("SELECT * FROM manager WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $user['name'];

            header("Location: manage.php");
            exit();
        }
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
            <label for="username">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button>Login</button>
       
    </form>
    
</body>
</html>