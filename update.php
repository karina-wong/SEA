<?php
session_start();
require_once("settings.php");

$invalid_email = false;
// database connection from ChatGPT

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_records'])) {
    if (isset($_SESSION['username']) && in_array($_SESSION['username'], ["Karina", "Cee", "Nathan"])) && !empty($_POST['ids_to_delete']) {
        $ids = explode(',', $_POST['ids_to_delete']);
        $ids = array_filter(array_map('trim', $ids), 'is_numeric');

        if (!empty($ids)) {
            // Create a dynamic list of placeholders
            $placeholders = implode(',', array_fill(0, count($ids), '?'));

            $stmt = $pdo->prepare("DELETE FROM records WHERE id IN ($placeholders)");
            $stmt->execute($ids);

            echo '<div>✅ Deleted selected records.</div> <div?><a href="profile.php">Back to Applictaions</a></div>';
        } else {
            echo "<div>⚠️ Invalid ID format.</div>";
        }
    }
    else {
        echo '<div>Please login first</div> <div><a href="admin_login.php">Login Page</a></div>';
    }
}

?>
