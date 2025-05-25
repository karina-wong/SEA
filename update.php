<?php
    session_start();
    require_once("settings.php");

    $invalid_email = false;
    
    //Handling deletions on another page makes it more easy to read??
    $email = $_SESSION['email']; //so it can be used w/in the $query
    $password = $_SESSION['password']; //so it can be used to validate

    if (isset($email, $password)){
        $stmt = $conn->prepare("SELECT * FROM manager WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_result = $result->fetch_assoc(); //changed name since it was the same name used in the settings.php
    }

    if (!empty($_SESSION['delete_ids'])){
        $delete_ids = $_SESSION['delete_ids'];
    }

    if (!empty($_SESSION['change_ids'])){
        $change_ids = $_SESSION['change_ids'];
        $selected_status = $_SESSION['status_selected'];
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
    //checks if we are logged in
        if  ($user_result && password_verify($password, $user_result['password_hash'])) {
            //EOI numbers to delete will be in the array called delete_ids
            if ($_SESSION['update'] == "delete"){
                try {
                $pdo = new PDO("mysql:host=$host;dbname=$sql_db;charset=utf8mb4", $user, $pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                if (isset($delete_ids)){
                    $ids = is_array($delete_ids) ? $delete_ids : explode(',', $delete_ids);
                }
                if (empty($ids)) {
                    echo '<div>No IDs selected for deletion.</div> <div><a href="manage.php">Back to Managers Page</a></div>';
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
                
            if ($_SESSION['update']=="status"){
                try{
                $pdo = new PDO("mysql:host=$host;dbname=$sql_db;charset=utf8mb4", $user, $pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                if (isset($selected_status)){
                    $ids = is_array($change_ids) ? $change_ids : explode(',', $change_ids);
                }
                
                if (empty($selected_status)) {
                    echo '<div>No status selected to change. Please choose a status and try again.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                    exit;
                }

                if (empty($ids)) {
                    echo '<div>No IDs selected to change status. Please select ID/s and try again.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                    exit;
                }
                //placeholders created
            
                //creates the command w/ the ?'s
                //used pdo over mysqliquery since the array values made it far more complciated to parse into the command
                $placeholders = implode(',', array_fill(0, count($ids), '?'));

                $sql = "UPDATE eoi SET Status = ? WHERE EOInumber IN ($placeholders)";
                $change_stmt = $pdo->prepare($sql);

                // Merge values: first is status, rest are IDs
                $params = array_merge([$selected_status], $ids);

                //replaces the "?" with actual values
                if ($change_stmt->execute($params)) {
                    echo '<div>✅ Changed selected records.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                } else {
                    echo '<div>❌ Failed to change selected records.</div><div><a href="manage.php">Back to Managers Page</a></div>';
                }
                //catches any errors
                } catch (PDOException $e) {
                    echo "Database error: " . htmlspecialchars($e->getMessage());
                }
            }        
        }
        else {
            echo '<div>Please login first</div> <div><a href="admin_login.php">Login Page</a></div>';
        }
    ?>

</body>
</html>