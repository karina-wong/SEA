<?php
    session_start();
    require_once("settings.php");

    $invalid_email = false;
    // database connection from ChatGPT
    //Handling deletions on another page makes it more easy to read??

    $email = $_SESSION['email']; //so it can be used w/in the $query
    $password = $_SESSION['password']; //so it can be used to validate

    if (isset($email, $password)){
        $stmt = $conn->prepare("SELECT * FROM manager WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }

    if (!empty($_SESSION['delete_ids'])){
        $delete_ids = $_SESSION['delete_ids'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Update Page</h1>
   
    <?php
        if  ($user && password_verify($password, $user['password_hash'])) {
            //EOI numbers to delete will be in the array called delete_ids
                $ids = is_array($delete_ids) ? $delete_ids : explode(',', $delete_ids);
                $ids = array_filter(array_map('trim', $ids), 'is_numeric');

                if (!empty($ids)) {
                    // Creates list of placeholders
                    $placeholders = implode(',', array_fill(0, count($ids), '?'));
                    //prepares SQL & prevents SQL injection
                    $stmt = $pdo->prepare("DELETE FROM eoi WHERE EOInumber IN ($placeholders)");
                    //binds actual value/s to placeholder/s
                    $stmt->execute($ids);

                    echo '<div>✅ Deleted selected records.</div> <div><a href="manage.php">Back to Managers Page</a></div>';
                } else {
                    echo '<div>⚠️ No EOI selected, please try again!</div> <div><a href="manage.php">Back to Managers Page</a></div>';
                }
            }
        else {
            echo '<div>Please login first</div> <div><a href="admin_login.php">Login Page</a></div>';
        }
    ?>

</body>
</html>