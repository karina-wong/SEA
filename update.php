<?php
    session_start();
    require_once("settings.php");
//delete below later only for trouble shooting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $invalid_email = false;
    
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
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$sql_db;charset=utf8mb4", $user, $pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $ids = is_array($delete_ids) ? $delete_ids : explode(',', $delete_ids);
            
                if (empty($ids)) {
                    echo "No IDs selected for deletion.";
                    exit;
                }
                //placeholders created
                $placeholders = implode(',', array_fill(0, count($ids), '?'));
            
                //creates the command w/ the ?'s
                //used pdo over mysqliquery since the array values made it far more complciated to parse into the command
                $stmt = $pdo->prepare("DELETE FROM eoi WHERE EOInumber IN ($placeholders)");
            
                //replaces the "?" with actual values
                if ($stmt->execute($ids)) {
                    echo '<div>✅ Deleted selected records.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                } else {
                    echo '<div>❌ Failed to delete selected records.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                }
                //catches any errors
            } catch (PDOException $e) {
                echo "Database error: " . htmlspecialchars($e->getMessage());
            }
                
            }
        else {
            echo '<div>Please login first</div> <div><a href="admin_login.php">Login Page</a></div>';
        }
    ?>

</body>
</html>